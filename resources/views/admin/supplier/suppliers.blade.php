@extends('admin.admin_dashboard')
@section('suppliers')
    <div class="ms-5 mt-5 pt-5 h-100">
        <div class="d-flex align-items-center justify-content-between me-5 mb-3">
            <div>
                <h1 class="text-xl">All Suppliers</h1>
            </div>
            <div>
                <a href="{{ route('admin.supplier.create') }}" class="btn btn-primary btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    New Supplier</a>

            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <td>ID</td>
                <td>Name</td>
                <td>Username</td>
                <td>Status</td>
                <td>Num of Deliveries</td>
                <td>Actions</td>
            </thead>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->username }}</td>
                    <td>{{ $supplier->status }}</td>
                    <td>Supplier Deliveries</td>
                    <td>
                        <a class="" href="{{ route('admin.supplier.edit', ['supplier' => $supplier]) }}">
                            <i data-feather="edit-2" class="icon-sm me-2 text-primary"></i>
                        </a>

                        {{-- <form class="d-inline" method="POST"  action="{{ route('admin.supplier.delete', ['supplier'=>$supplier]) }}">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" onclick="confirm('Are you sure you want to delete??')"  class="btn btn-link">
                                <i data-feather="trash" class="icon-sm mx-2 text-danger"></i>
                            </button>
                        </form> --}}
                        <a href="{{ route('admin.supplier.delete', ['supplier' => $supplier]) }}"
                            onclick="event.preventDefault();
                                    if (confirm('Are you sure you want to delete?')) {
                                        document.getElementById('delete-form-{{ $supplier->id }}').submit();
                                    }"
                            class="btn btn-link">
                            <i data-feather="trash" class="icon-sm mx-2 text-danger"></i>
                        </a>

                        <form id="delete-form-{{ $supplier->id }}"
                            action="{{ route('admin.supplier.delete', ['supplier' => $supplier]) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
