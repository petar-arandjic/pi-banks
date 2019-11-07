@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="edit" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="row mt-5 border shadow-sm">
                <div class="col-10 offset-1 rounded mt-5 mb-5">
                    <div class="col-sm">
                        <div class="form-group row">
                            <h3>Dodaj novu Transakciju</h3>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="bank_id" class="col-md-4 col-form-label">Banka</label>
                                <select
                                    class="custom-select"
                                    name="bank_id"
                                    value="asd"
                                    required
                                >
                                    @foreach ($banks as $bank)
                                        @if ($bank->id == $transaction->bank_id)
                                            <option value="{{$bank->id}}" selected>{{$bank->name}}</option>
                                        @else
                                            <option value="{{$bank->id}}">{{$bank->name}}</option>
                                        @endif
                                    @endforeach

                                    @error('bank_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </select>
                            </div>
                            <div class="col">
                                <label for="partner_id" class="col-md-4 col-form-label">Partner</label>
                                <select
                                    class="custom-select"
                                    name="partner_id"
                                    required
                                >
                                    <option value="none">Odaberi...</option>
                                    @foreach ($partners as $partner)
                                        @if ($bank->id == $transaction->bank_id)
                                            <option value="{{$partner->id}}" selected>{{$partner->name}}</option>
                                        @else
                                            <option value="{{$partner->id}}">{{$partner->name}}</option>
                                        @endif
                                    @endforeach

                                    @error('partner_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="type_of_transaction" class="col-md-4 col-form-label">Tip Transakcije</label>
                                <select
                                    class="custom-select"
                                    name="type_of_transaction"
                                    required
                                >
                                    @if ($transaction->type_of_transaction == 1)
                                        <option value="1" selected>Priliv</option>
                                        <option value="2">Odliv</option>
                                    @else
                                        <option value="1">Priliv</option>
                                        <option value="2" selected>Odliv</option>
                                    @endif
                                </select>

                                @error('type_of_transaction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="amount" class="col-md-6 col-form-label">Iznos</label>

                                <input  id="amount" type="number"
                                    class="form-control @error('amount') is-invalid @enderror"
                                    name="amount"
                                    required autocomplete="amount"
                                    value="{{ $transaction->amount }}"
                                    autofocus>

                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 offset-md-10 mt-3">
                                <button type="submit" class="btn btn-primary col-sm">Sačuvaj</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @if ($errors)
        <span>{{ $errors }}</span>
    @endif
@endsection
