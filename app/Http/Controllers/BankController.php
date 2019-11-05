<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bank;

use App\BankStyle;

use App\Http\Resources\Bank as BankResource;

use App\Transaction;
//for table join
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    # Get all banks and sum of(income, expenses and rest as json)
    public function index(){

        $banks =  DB::table('banks')
        ->join('bank_styles', 'banks.style_id', '=', 'bank_styles.id')
        ->select('banks.id', 'name','font_color', 'bg_color', 'account', 'show', 'starting_balance', 'allowed_overdraft')
        ->get();

        //get sum of all income
        $income = Transaction::where('type_of_transaction', 1)
        ->sum('amount');
        //get sum of all expenses
        $expenses = Transaction::where('type_of_transaction', 2)
                        ->sum('amount');
        // get sum of all bank starting_balances
        $starting_balance = Bank::sum('starting_balance');

        //get sum of all bank allowed overdraft
        $allowed_overdraft = Bank::sum('allowed_overdraft');

        $balance = $starting_balance + $income - $expenses;

        $profit = $income - $expenses;

        $data = [
        "income" => round($income, 2),
        "expenses" => round($expenses, 2),
        "starting_balance" => round($starting_balance, 2),
        "allowed_overdraft" => round($allowed_overdraft, 2),
        "balance" => round($balance, 2),
        "profit" => round($profit, 2)
        ];

        return [
            "data" => BankResource::collection($banks),
            "stats" => $data
        ];
    }
    # Show one bank as json
    public function show($id){
        return Bank::findOrFail($id);
    }
    # Create new bank
    public function create(){
        // Get all bank styles
        $bankStyles = BankStyle::all();
        return view('bank.create', [
            "bankStyles" => $bankStyles
        ]);
    }
    # Store new bank
    public function store(){
        //dd(request()->all());
        $data = request()->validate([
            'name' => 'required',
            'account' => ['required', 'numeric', 'Between: 0, 1000000000000'],
            'allowed_overdraft' => ['required', 'numeric', 'Between: 0, 5000000'],
            'starting_balance' => ['required', 'numeric', 'Between: 0, 5000000'],
            'style_id' => ['required', 'exists:bank_styles,id'],
        ]);

        Bank::create($data);

        return redirect('/')->with(['response' => true]);
    }
}
