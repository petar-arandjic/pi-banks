<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\BankAccount;

use App\Bank;

use Illuminate\Support\Facades\Validator;

class BankAccountController extends Controller
{
    //
    public function store(Request $request, $id){

        # Check if Bank exist
        if(Bank::find($id)){
            # Validate data
            $data = Validator::make($request->all(), [
                'account'               =>      ['required','digits:13'],
                'starting_balance'      =>      ['required', 'numeric', 'Between: 0, 50000000'],
                'allowed_overdraft'     =>      ['required', 'numeric', 'Between: 0, 50000000'],
                'currency'              =>      ['required', 'exists:currencies'],
            ]);

            if ($data->fails()) {
                $response = [
                    'errors' => $data->errors()
                ];
                return $response;
            }else{
                $data->create();
            }
        }
    }
}
