<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bank;

use App\Http\Resources\Bank as BankResource;

//for table join
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    //get all banks as json
    public function index(){

        $banks =  DB::table('banks')
        ->join('bank_styles', 'banks.style_id', '=', 'bank_styles.id')
        ->select('banks.id', 'name','font_color', 'bg_color', 'account', 'show')
        ->get();
        return BankResource::collection($banks);
        //return Bank::all();

    }
    //show one bank as json
    public function show($id){
        return Bank::findOrFail($id);
    }
}
