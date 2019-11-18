<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\BankAccount;

class Transaction extends Model
{
    protected $fillable = ['partner_id', 'account_id', 'type_of_transaction', 'amount'];
    //
    public function bankAccount(){
        return $this->belongsTo('BankAccount');
    }
}
