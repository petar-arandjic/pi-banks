<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Bank;

class Transaction extends Model
{
    //
    public function bank(){
        return $this->belongsTo('Bank');
    }
}
