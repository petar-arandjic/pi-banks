<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Transaction;

use App\Bank;

use App\Partner;

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
        $partners = Partner::all();
        return view('transaction.create', [
            "banks" => $banks,
            "partners" => $partners
        ]);
    }
    # Store new bank
    public function store(){
        //dd(request()->partner_id);
        $data = request()->validate([
            'partner_id' => ['required', 'exists:partners,id'],
            'bank_id' => ['required', 'exists:banks,id'],
            'type_of_transaction' => ['required', 'numeric', 'Between: 1, 2'],
            'amount' => ['required', 'numeric', 'Between: 0, 5000000']
        ]);

        Transaction::create($data);

        return redirect('/')->with(['response' => true]);
    }

    # Show edit page
    public function edit($id){

        $transaction = Transaction::find($id);
        $banks = Bank::all();
        $partners = Partner::all();

        return view('transaction.edit', [
            "transaction" => $transaction,
            "banks" => $banks,
            "partners" => $partners
        ]);
    }

    # Update
    public function update($id){

        $data = request()->validate([
            'partner_id' => ['required', 'exists:partners,id'],
            'bank_id' => ['required', 'exists:banks,id'],
            'type_of_transaction' => ['required', 'numeric', 'Between: 1, 2'],
            'amount' => ['required', 'numeric', 'Between: 0, 5000000']
        ]);
        //dd($data);
        $transaction = Transaction::find($id);

        $transaction->partner_id = $data["partner_id"];
        $transaction->bank_id = $data['bank_id'];
        $transaction->type_of_transaction = $data['type_of_transaction'];
        $transaction->amount = $data['amount'];

        $transaction->save();

        return redirect('/');
    }
}
