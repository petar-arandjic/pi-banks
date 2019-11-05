<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Transaction;

use App\Bank;

//for table join
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    //
    public function index(){

        $transactions =  DB::table('transactions')
        ->join('banks', 'banks.id', '=', 'transactions.bank_id')
        ->select('transactions.id', 'transactions.type_of_transaction', 'transactions.amount', 'name', 'transactions.created_at')
        ->get();

        return $transactions;
    }

    public function get_sum($id){
        return Transaction::where('bank_id', $id)
                            ->where('type_of_transaction', 1)
                            ->sum('amount');
    }
    # Create new bank
    public function create(){
        // Get all bank styles
        $banks = Bank::all();
        return view('transaction.create', [
            "banks" => $banks
        ]);
    }
    # Store new bank
    public function store(){
        //dd(request()->all());
        $data = request()->validate([
            'bank_id' => ['required', 'exists:banks,id'],
            'type_of_transaction' => ['required', 'numeric', 'Between: 1, 2'],
            'amount' => ['required', 'numeric', 'Between: 0, 5000000']
        ]);

        Transaction::create($data);

        return redirect('/')->with(['response' => true]);
    }
}
