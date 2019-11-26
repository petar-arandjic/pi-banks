<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\BankAccount;

use App\Bank;

use Illuminate\Support\Facades\Validator;

class BankAccountController extends Controller
{
    //Show all account for given bank
    public function index($id){
        return Bank::find($id)->bankAccounts;
    }
    //Store new Account
    public function store(Request $request, $id){

        #add bank_id to request
        $request->request->add(['bank_id' => $id]);

        # Validate data
        $data = Validator::make($request->all(), [
            'bank_id'               =>      ['required', 'exists:banks,id'],
            'account'               =>      ['required', 'digits:13'],
            'starting_balance'      =>      ['required', 'numeric', 'Between: 0, 50000000'],
            'allowed_overdraft'     =>      ['required', 'numeric', 'Between: 0, 50000000'],
            'currency_id'           =>      ['required', 'exists:currencies,id'],
        ]);

        if ($data->fails()) {
            $response = [
                'errors' => $data->errors()
            ];
            return $response;
        }else{
            if(BankAccount::create($request->all())){
                return [
                    'success' => [
                            'message'   =>  'account successfully created',
                            'code'      =>  '30.10'
                        ]
                ];
            }else{
                return 'server error 500';
            }
        }
    }
}
