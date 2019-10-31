<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bank;

use App\Http\Resources\Bank as BankResource;

use App\Transaction;
//for table join
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    //get all banks and income, expensex and rest as json
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

        $balance = $starting_balance + $income - $expenses;

        $profit = $income - $expenses;

        $data = [
        "income" => round($income, 2),
        "expenses" => round($expenses, 2),
        "starting_balance" => round($starting_balance, 2),
        "balance" => round($balance, 2),
        "profit" => round($profit, 2)
        ];

        return [
            "data" => BankResource::collection($banks),
            "stats" => $data
        ];
    }
    //show one bank as json
    public function show($id){
        return Bank::findOrFail($id);
    }
}
