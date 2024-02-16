@extends('layouts.general')

@section('showTransactions')
    <div class="overflow-x-auto">
        <h1 class="text-xl font-bold mb-4">Todas las Transacciones</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">id del Usuario
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($transactions as $transaction)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->status }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->amount }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->user->id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
