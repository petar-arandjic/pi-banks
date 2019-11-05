<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Bank;

class Transaction extends Model
{
    protected $fillable = ['bank_id', 'type_of_transaction', 'amount'];
    //
    public function bank(){
        return $this->belongsTo('Bank');
    }
}
