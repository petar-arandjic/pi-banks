<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bank;

use App\Transaction;

class BankTransactionsController extends Controller
{
    //get all transactions of one bank
    public function index($id){
        return Transaction::where('bank_id', $id)->get();
    }
}
