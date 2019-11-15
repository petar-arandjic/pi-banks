<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    //
    public function store($id){
        //print_r(request()->all());
        $data = request()->validate([
            'account' => ['requred', 'numeric']
        ]);
    }
}
