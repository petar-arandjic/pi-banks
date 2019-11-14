<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\BankStyle;

use App\Transaction;


class Bank extends Model{

    protected $fillable = ['name', 'account', 'style_id', 'allowed_overdraft', 'starting_balance'];

    //style for fron end bank cards
    public function bankStyle(){
        return $this->hasOne('BankStyle');
    }
    //Transactions for every bank
    public function transaction(){
        return $this->hasMany('Transaction');
    }
    public function bankAccount(){
        return $this->hasMany('BankAccaount');
    }
}
