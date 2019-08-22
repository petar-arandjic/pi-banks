<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\BankStyle;

//protected $fillable = ['name', 'account', 'style_id'];

class Bank extends Model
{
    //
    public function bankStyle(){
        return $this->hasOne('BankStyle');
    }
    public function transaction(){
        $this->hasMany('Transaction');
    }
}
