@extends('layouts.general')

@section('showMyTokens')
    <div class="container-fluid mx-auto mt-5">
        <div class="flex justify-center overflow-x-auto">
            <div class="max-w-screen-sm"> <!-- Añadido para limitar el ancho máximo de la tabla -->
                <h1 class="text-xl font-bold mb-4">Tus Tokens</h1>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-yellow-500">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nombre
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Símbolo
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Suministro Total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tokens as $token)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $token->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $token->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $token->symbol }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $token->total_supply }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
