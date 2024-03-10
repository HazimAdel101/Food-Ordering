@extends('admin.admin_dashboard')
@section('orders')
    <div class="ms-5 mt-5 pt-5 h-100">
        <div class="d-flex align-items-center justify-content-between me-5 mb-3">
            <div>
                <h1 class="text-xl">All Orders</h1>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <td>ID</td>
                <td>Restaurant</td>
                <td>Dish</td>
                <td>user</td>
                <td>Supplier</td>
            </thead>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->food->name }}</td>
                    <td>{{ $order->restaurant->name }}</td>
                    @if ($order->supplier)
                        <td>{{ $order->supplier->name }}</td>
                    @else
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#suppliers">
                                Assign
                            </button>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>

        <!-- Modal -->
        <div class="modal fade" id="suppliers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/process-selected-supplier">
                            @csrf
                            <p>Select a supplier:</p>
                            @foreach($suppliers as $supplier)
                                <label>
                                    <input type="radio" name="supplier" value="{{ $supplier->id }}">
                                    {{ $supplier->name }}
                                </label><br>
                            @endforeach
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Select</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
