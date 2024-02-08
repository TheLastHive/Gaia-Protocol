{{--!!! falta el extend para que se vea perfe --}}
@extends('layouts.template')
@section('general')
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

                        <form method="POST" action="{{ route('createToken', ['userId' => $userId]) }}">
                            @csrf
                            @method('post')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required maxlength="50">
                            </div>

                            <div class="mb-3">
                                <label for="symbol" class="form-label">Symbol</label>
                                <input type="text" class="form-control" id="symbol" name="symbol" value="{{ old('symbol') }}" required maxlength="10">
                            </div>

                            <div class="mb-3">
                                <label for="totalSupply" class="form-label">Total Supply</label>
                                <input type="number" class="form-control" id="totalSupply" name="totalSupply" value="{{ old('totalSupply') }}" required min="1">
                            </div>

                            <button type="submit" class="btn btn-primary">Create Token</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection