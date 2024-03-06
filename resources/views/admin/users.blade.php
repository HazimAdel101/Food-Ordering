@extends('admin.admin_dashboard')
@section('users')
    <div class="ms-5 mt-5 pt-5 h-100">
        <h1 class="text-xl">All users</h1>
        <table class="table table-striped table-hover">
            <thead>
                <td>ID</td>
                <td>Name</td>
                <td>Username</td>
                <td>Role</td>
                <td>Status</td>
                <td>Num of orders</td>
                <td>Actions</td>
            </thead>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->status }}</td>
                    <td>User orders</td>
                    <td>
                        <a class="" href="#">
                            <i data-feather="edit-2" class="icon-sm me-2 text-primary"></i>
                        </a>
                        <a class="" href="#">
                            <i data-feather="trash" class="icon-sm mx-2 text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
