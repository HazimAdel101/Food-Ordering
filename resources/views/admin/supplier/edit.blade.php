@extends('admin.admin_dashboard')
@section('newSupplier')
    <div class="h-100 p-5 m-5">
        <div class="container py-5">
            <h1 class="mb-4">Edit Supplier</h1>
            <form method="POST" action="{{route('admin.supplier.update', ['supplier'=> $supplier])}}">
                @csrf
                @method('put')
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{$supplier->name}}" type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{$supplier->username}}" type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{$supplier->email}}" type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input value="{{$supplier->password}}" type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Image (optional)</label>
                    <input value="{{$supplier->photo}}" type="file" class="form-control" name="photo" id="photo" name="image">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input value="{{$supplier->phone}}" type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input value="{{$supplier->address}}" type="text" class="form-control" id="address" name="address">
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
