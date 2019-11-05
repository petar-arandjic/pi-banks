@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="create" enctype="multipart/form-data" method="POST">
            @csrf
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
                                    required
                                >
                                    @foreach ($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                                    @endforeach
                                </select>

                                @error('bank_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="bank_id" class="col-md-4 col-form-label">Partner</label>
                                <select
                                    class="custom-select"
                                    required
                                >
                                    @foreach ($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->id}}</option>
                                    @endforeach
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
                                    <option value="1">Priliv</option>
                                    <option value="2">Odliv</option>
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
                                    name="amount" value="{{ old('amount') }}"
                                    required autocomplete="amount"
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
@endsection
