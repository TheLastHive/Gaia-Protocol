{{--!!! falta el extend para que se vea perfe --}}

@section('content')
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

                        <form method="POST" action="{{ route('createToken') }}">
                            @csrf

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

                            <div class="mb-3">
                                <label for="ownerUserId" class="form-label">Owner User ID</label>
                                <input type="text" class="form-control" id="ownerUserId" name="ownerUserId" value="{{ old('ownerUserId') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Token</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection