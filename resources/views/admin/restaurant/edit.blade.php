@extends('admin.admin_dashboard')
@section('editRestaurant')
    <div class="h-100 p-5 m-5">
        <div class="container py-5">
            <h1 class="mb-4">Edit Restaurant</h1>
            <form method="POST" action="{{ route('admin.restaurant.update', ['restaurant'=> $restaurant]) }}"
            enctype="multipart/form-data">
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
                    <input value="{{$restaurant->name}}" type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input value="{{$restaurant->address}}" type="text" class="form-control" id="address" name="address">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input value="{{$restaurant->phone}}" type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="open" class="form-label">Open at</label>
                    <input value="{{$restaurant->open}}" type="time" class="form-control" id="open" name="open">
                </div>
                <div class="mb-3">
                    <label for="close" class="form-label">Close at</label>
                    <input value="{{$restaurant->close}}" type="time" class="form-control" id="close" name="close">
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input value="{{$restaurant->website}}" type="text" class="form-control" id="website" name="website">
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Image</label>
                    <input value="{{$restaurant->photo}}" type="file" class="form-control" id="photo" name="photo">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input value="{{$restaurant->description}}" type="text" class="form-control" id="description" name="description">
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
