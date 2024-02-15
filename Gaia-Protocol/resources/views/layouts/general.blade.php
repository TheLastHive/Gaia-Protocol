@extends('layouts.template')

@section('general')
    {{-- HEADER --}}

    {{-- Vista principal --}}
        {{-- @yield('') --}}
        {{-- @yield('') --}}
        {{-- @yield('') --}}
        @yield('showAllTokens')
        @yield('create_token')
        @yield('swap')

    {{-- FOOTER --}}
@endsection
