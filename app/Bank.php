<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\BankStyle;

use App\Transaction;

//protected $fillable = ['name', 'account', 'style_id'];

class Bank extends Model
{
    //style for fron end bank cards
    public function bankStyle(){
        return $this->hasOne('BankStyle');
    }
    //Transactions for every bank
    public function transaction(){
        return $this->hasMany('Transaction');
    }
}
