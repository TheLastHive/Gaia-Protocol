@extends('layouts.template')
@section('general')
    <div class="overflow-x-auto">
        <h1 class="text-xl font-bold mb-4">Todos los Tokens</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID del Usuario
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Símbolo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Suministro
                        Total</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($tokens as $token)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $token->user_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $token->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $token->symbol }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $token->total_supply }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
