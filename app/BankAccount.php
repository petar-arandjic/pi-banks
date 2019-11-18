<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    //
    protected $fillable = ['account', 'starting_balance', 'allowed_overdraft', 'currency_id', 'bank_id'];

    public function bank(){
        return $this->belongsTo('Bank');
    }
}
