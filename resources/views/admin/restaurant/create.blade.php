@extends('admin.admin_dashboard')
@section('newRestaurant')
    <div class="h-100 p-5 m-5">
        <div class="container py-5">
            <h1 class="mb-4">New Restaurant</h1>
            <form method="POST" action="{{ route('admin.restaurant.store') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="open" class="form-label">Open at</label>
                    <input type="time" class="form-control" id="open" name="open">
                </div>
                <div class="mb-3">
                    <label for="close" class="form-label">Close at</label>
                    <input type="time" class="form-control" id="close" name="close">
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" class="form-control" id="website" name="website">
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Image</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
