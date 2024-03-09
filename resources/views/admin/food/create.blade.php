@extends('admin.admin_dashboard')
@section('newFood')
    <div class="h-100 p-5 m-5">
        <div class="container py-5">
            <h1 class="mb-4">New Food</h1>
            <form method="POST" action="{{ route('admin.restaurant.food.store', ['restaurant' => $restaurant]) }}" enctype="multipart/form-data">
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
                    <label for="photo" class="form-label">Image</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number"  class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="number"  class="form-control" id="discount" name="discount" >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" >
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
