@extends('auth.template')

@section('content')
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Gestión de Pools</h2>

        <!-- Overview Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <!-- Total Liquidity -->
            <div class="bg-green-800 p-4 rounded-lg shadow-lg text-white text-center">
                <div class="text-lg">Total Liquidity</div>
                <div class="text-3xl font-bold">$330,338,833</div>
            </div>
            <!--  24h Volume -->
            <div class="bg-green-700 p-4 rounded-lg shadow-lg text-white text-center">
                <div class="text-lg">24h Volume</div>
                <div class="text-3xl font-bold">$4,336,033</div>
            </div>
            <!-- GAIA Price -->
            <div class="bg-green-600 p-4 rounded-lg shadow-lg text-white text-center">
                <div class="text-lg">GAIA Price</div>
                <div class="text-3xl font-bold">$0.33</div>
            </div>
        </div>


        <!-- My Pools Section -->
        <div class="bg-green-900 p-4 rounded-lg shadow-lg text-white mb-8">
            <div class="mb-4 flex justify-between items-center">
                <div class="text-lg">Mis Pools</div>
                <button class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                    data-bs-toggle="modal" data-bs-target="#createPoolModal">Crear Pool</button>
            </div>

            <!-- List of My Pools -->
            <div class="mt-8">
                <div class="divide-y divide-gray-700">
                    @foreach ($myPools as $pool)
                        <div class="py-4 grid grid-cols-4 gap-4">
                            <div>{{ $pool->name }}</div>
                            <div class="text-center">{{ $pool->description }}</div>
                            <div class="text-center">{{ $pool->total_liquidity }}</div>
                            <div class="text-right">
                                <form action="{{ route('deletePool', $pool->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-700 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- Other Pools Section -->
        <div class="bg-green-900 p-4 rounded-lg shadow-lg text-white mb-8">
            <div class="text-lg mb-4">Otras Pools</div>
            <div class="divide-y divide-gray-700">
                @foreach ($allPools as $pool)
                    @if (!$myPools || !$myPools->contains($pool))
                        <div class="py-4 grid grid-cols-4 gap-4">
                            <div>{{ $pool->name }}</div>
                            <div class="text-center">{{ $pool->description }}</div>
                            <div class="text-center">{{ $pool->total_liquidity }}</div>
                            <div class="text-right">
                                <button
                                    class="bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Unirse</button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>


    <!-- Create Pool Modal -->
    <div class="modal fade" id="createPoolModal" tabindex="-1" aria-labelledby="createPoolModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #0d7936; color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPoolModalLabel">Crear Pool</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('createPool') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del Pool</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit"
                            class="btn bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Crear
                            Pool</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('styles')
    <style>
        body {
            background-color: #0f172a;
        }

        .text-2xl,
        .text-3xl,
        .text-lg {
            color: #e2e8f0;
            /* A light grey color for text */
        }

        .bg-green-800 {
            background-color: #0d7936;
            /* A deep green color */
        }

        .bg-green-700 {
            background-color: #0d9a43;
            /* A slightly lighter green */
        }

        .bg-green-900 {
            background-color: #119443;
            /* An even deeper green color */
        }

        .hover\:bg-green-600:hover {
            background-color: #25eb3c;
            /* A hover state color */
        }

        .rounded-lg {
            border-radius: 0.5rem;
            /* Rounded corners */
        }

        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            /* Shadow for depth */
        }

        .font-bold {
            font-weight: 700;
            /* Bold font */
        }

        .py-2 {
            padding-top: 0.5rem;
            /* Y-axis padding */
            padding-bottom: 0.5rem;
        }

        .px-4 {
            padding-left: 1rem;
            /* X-axis padding */
            padding-right: 1rem;
        }

        .mb-3,
        .mb-4,
        .mb-6,
        .mb-8 {
            margin-bottom: 1rem;
            /* Bottom margin variations */
        }

        .mt-5,
        .mt-8 {
            margin-top: 1.25rem;
            /* Top margin variations */
        }

        .text-center {
            text-align: center;
            /* Center text alignment */
        }

        .text-right {
            text-align: right;
            /* Right text alignment */
        }

        .grid {
            display: grid;
            /* Grid layout */
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            /* Three columns grid */
        }

        .gap-4 {
            gap: 1rem;
            /* Spacing between grid items */
        }

        .divide-y> :not([hidden])~ :not([hidden]) {
            --tw-divide-y-reverse: 0;
            border-top-width: calc(1px * calc(1 - var(--tw-divide-y-reverse)));
            border-bottom-width: calc(1px * var(--tw-divide-y-reverse));
        }

        .divide-green-700> :not([hidden])~ :not([hidden]) {
            --tw-divide-opacity: 1;
            border-color: rgba(55, 65, 81, var(--tw-divide-opacity));
            /* Divider color */
        }

        .modal-content {
            background-color: #119443;
            /* Green background for the modal content */
            color: white;
            /* White text color */
        }

        .modal-header {
            border-bottom: 1px solid #0d7936;
            /* Border bottom for the header */
        }

        .modal-footer {
            border-top: 1px solid #0d7936;
            /* Border top for the footer */
        }

        .modal-title {
            color: white;
            /* White title text color */
        }

        .btn-close {
            color: white;
            /* White close button color */
        }

        /* Form styles */
        .form-control {
            background-color: #0f172a;
            /* Dark background for form inputs */
            color: white;
            /* White text color for form inputs */
            border: 1px solid #0d7936;
            /* Border color for form inputs */
        }

        .form-control:focus {
            border-color: #25eb3c;
            /* Border color on focus for form inputs */
            box-shadow: 0 0 0 0.2rem rgba(37, 226, 60, 0.25);
            /* Box shadow on focus for form inputs */
        }

        .btn {
            color: white;
            /* White text color for buttons */
            border: none;
            /* No border for buttons */
        }

        .btn:hover {
            background-color: #25eb3c;
            /* Hover background color for buttons */
        }

        .btn:active {
            background-color: #0d7936;
            /* Active background color for buttons */
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deletePoolButtons = document.querySelectorAll('.delete-pool-button');
            deletePoolButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var poolId = this.dataset.poolId;
                    var formAction = '/deletePool/' + poolId;
                    document.getElementById('deletePoolForm').action = formAction;
                });
            });
        });
    </script>
@endpush
