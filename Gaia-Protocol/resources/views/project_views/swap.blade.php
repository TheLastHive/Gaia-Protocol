@extends('layouts.general')

@section('swap')
<div class="container cont-god col-11">
    <div class="container cont-main rounded-5">

        <div class="row d-flex">
            <div
                class="container cont-1 col-6 border ps-3 border-warning rounded-pill d-flex align-items-center justify-content-evenly">
                <div class="container cont-photo rounded-circle">
                </div>

                <div class="container cont-data justify-content-start">
                    <span class="cont-wallet text-black fw-bold">APOLLO</span>
                    <span class="cont-wallet">0.05$</span>
                </div>


            </div>
            <div class="container cont-main2 col-6 d-flex align-items-center flex-column">
                <div class="container cont-2 border border-warning">
                    LO QUE SEA QUE VAYA AQUÍ
                </div>
                <div class="container cont-wallet pt-2 text-start ps-0 fw-bold">in wallet: <span class="text-secondary">0.05$</span></div>
            </div>
            
        </div>

        <div class="container border-5 cont-circle rounded-circle"> </div>

        <div class="row d-flex">
            <div
                class="container cont-1 col-6 border ps-3 border-warning rounded-pill d-flex align-items-center justify-content-center">
                <div class="container cont-photo rounded-circle">
                </div>
                <div class="container cont-data">
                    <label for="token" class="cont-wallet text-black fw-bold">Selecciona un Token:</label>
                    <select name="token" id="token" class="form-select">
                        @foreach($tokens as $token)
                            <option value="{{ $token }}">{{ $token }}</option>
                        @endforeach
                    </select>
                    <span class="cont-wallet">0.05$</span>
                </div>
            </div>
            <div class="container cont-main2 col-6 d-flex align-items-center flex-column">
                <div class="container cont-2 border border-warning">
                    LO QUE SEA QUE VAYA AQUÍ
                </div>
                <div class="container cont-wallet pt-2 text-start ps-0 fw-bold">in wallet: <span class="text-secondary">0.05$</span></div>
            </div>
        </div>
    </div>

</div>
@endsection