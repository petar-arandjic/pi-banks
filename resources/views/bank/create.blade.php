@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="create" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row mt-5 border shadow-sm">
                <div class="col-10 offset-1 rounded mt-5 mb-5">
                    <div class="col-sm">
                        <div class="form-group row">
                            <h3>Dodaj novu banku</h3>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="name" class="col-md-4 col-form-label">Ime banke</label>

                                <input  id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}"
                                    required autocomplete="bank_name"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="account" class="col-md-4 col-form-label">Račun banke</label>

                                <input  id="account" type="number"
                                    class="form-control @error('account') is-invalid @enderror"
                                    name="account" value="{{ old('account') }}"
                                    required autocomplete="bank_account"
                                    autofocus>

                                @error('account')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="starting_balance" class="col-md-6 col-form-label">Početno stanje računa</label>

                                <input  id="starting_balance" type="number"
                                    class="form-control @error('starting_balance') is-invalid @enderror"
                                    name="starting_balance" value="{{ old('starting_balance') }}"
                                    required autocomplete="starting_balance"
                                    autofocus>

                                @error('starting_balance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="allowed_overdraft" class="col-md-6 col-form-label">Dozvoljeni minus</label>

                                <input  id="allowed_overdraft" type="number"
                                    class="form-control @error('allowed_overdraft') is-invalid @enderror"
                                    name="allowed_overdraft" value="{{ old('allowed_overdraft') }}"
                                    required autocomplete="allowed_overdraft"
                                    autofocus>

                                @error('allowed_overdraft')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-md-6 col-form-label">Izaberi boju</label>
                            <div class="col-md-4 p-0">
                                <select
                                    multiple
                                    class="form-control text-center"
                                    id="exampleFormControlSelect2"
                                    class="m-0 p-0"
                                    name="style_id"
                                    required>
                                    @foreach ($bankStyles as $style)
                                        <option value="{{$style->id}}" class="mt-2" style="background: #{{$style->bg_color}}; color: #{{$style->font_color}}">Dizajn {{$style->id}}</option>
                                    @endforeach
                                </select>
                                @error('style_id')
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
