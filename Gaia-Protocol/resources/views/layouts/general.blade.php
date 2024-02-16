@extends('layouts.template')

@section('general')
    {{-- SIDEBAR --}}
    <div class="col-1 bg-warning rounded-5 ms-2 d-grid justify-content-center align-items-center">
        <div></div>
        <a><button class="btn rounded-5 btn-secondary mt-5">A</button></a>
        <a><button class="btn rounded-5 btn-secondary ">A</button></a>
        <a><button class="btn rounded-5 btn-secondary">A</button></a>
        <a><button class="btn rounded-5 btn-secondary">A</button></a>
        <a><button class="btn rounded-5 btn-secondary mb-5">A</button></a>
        <div></div>
    </div>

    {{-- Vistas principales --}}
    @yield('create_token')
    @yield('home')
    @yield('pools')
    @yield('showAllTokens')
    @yield('showMyTokens')
    @yield('showTransactions')
    @yield('swap')
@endsection
