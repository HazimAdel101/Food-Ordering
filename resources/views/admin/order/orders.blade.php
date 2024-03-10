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
                        <td><a href="btn btn-primary">Assign</a></td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
@endsection
