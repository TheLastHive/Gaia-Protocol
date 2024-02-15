{{-- !!! falta el extend para que se vea perfe --}}
@extends('layouts.template')
@section('create_token')
<button onclick="openModal()" class="px-4 py-2 bg-blue-500 text-white rounded">Open Modal</button>

{{-- backdrop --}}
<div class="fixed inset-0 bg-black opacity-50 hidden" id="modal-backdrop"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Token') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('create.token', ['userId' => $userId]) }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    required maxlength="50">
                            </div>

                            <div class="mb-3">
                                <label for="symbol" class="form-label">Symbol</label>
                                <input type="text" class="form-control" id="symbol" name="symbol"
                                    value="{{ old('symbol') }}" required maxlength="10">
                            </div>

                            <div class="mb-3">
                                <label for="totalSupply" class="form-label">Total Supply</label>
                                <input type="number" class="form-control" id="totalSupply" name="totalSupply"
                                    required min="100">
                            </div>
                            <h1>{{$userId}}</h1>
                            <button type="submit" class="btn btn-primary">Create Token</button>
                        </form>
                        <a href="{{ route('showAll.tokens') }}" class="btn btn-primary">Ver todos los tokens</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal Container -->
        <div class="fixed inset-0 flex items-center justify-center hidden" id="modal-container">
            <!-- Actual Modal Content -->
            <div class="bg-white p-6 rounded shadow-lg">
                <!-- Your Form Goes Here -->
                <form method="post" action="{{ route('create.token', ['userId' => $userId]) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="50">
                    </div>
                    <div class="mb-3">
                        <label for="symbol" class="form-label">Symbol</label>
                        <input type="text" class="form-control" id="symbol" name="symbol" value="{{ old('symbol') }}" required maxlength="10">
                    </div>
                    <div class="mb-3">
                        <label for="totalSupply" class="form-label">Total Supply</label>
                        <input type="number" class="form-control" id="totalSupply" name="totalSupply" required min="100">
                    </div>
                    <h1>{{$userId}}</h1>
                    <button type="submit" class="mt-2 px-4 py-2 bg-green-500 text-white rounded">Create Token</button>
                    <button onclick="closeModal()" class="mt-2 px-4 py-2 bg-red-500 text-white rounded">Close</button>
                </form>
            </div>
        </div>
    
        <script defer>
            function openModal() {
                // Show the modal backdrop and content
                document.getElementById('modal-backdrop').classList.remove('hidden');
                document.getElementById('modal-container').classList.remove('hidden');
            }
    
            function closeModal() {
                // Hide the modal backdrop and content
                document.getElementById('modal-backdrop').classList.add('hidden');
                document.getElementById('modal-container').classList.add('hidden');
            }
        </script>
@endsection
