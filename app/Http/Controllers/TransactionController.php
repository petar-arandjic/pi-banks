<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Transaction;

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
}
