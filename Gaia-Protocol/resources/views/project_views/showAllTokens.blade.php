@extends('layouts.template')
@section('general')
    <h1>Todos los Tokens</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Símbolo</th>
                <th>Suministro Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tokens as $token)
                <tr>
                  <td>{{ $token->owner_user_id }}</td>
                  <td>{{ $token->name }}</td>
                    <td>{{ $token->symbol }}</td>
                    <td>{{ $token->total_supply }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection