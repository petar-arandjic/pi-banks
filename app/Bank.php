<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Bank extends Model{

    protected $fillable = ['name', 'account', 'style_id', 'allowed_overdraft', 'starting_balance'];

    public function bankAccounts(){
        return $this->hasMany('App\BankAccount', 'bank_id');
    }
}
