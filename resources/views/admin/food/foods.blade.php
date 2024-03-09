@extends('admin.admin_dashboard')
@section('foods')
    <div class="h-100 mt-5 pt-5">
        <div class="d-flex align-items-center justify-content-between me-5 mb-3">
            <div>
                <h1 class="text-xl">{{$restaurant->name}} Foods</h1>
            </div>
            <div>
                <a href="{{ route('admin.restaurant.food.create', ['restaurant'=>$restaurant]) }}" class="btn btn-primary btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    New Food</a>

            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <td>ID</td>
                <td>Photo</td>
                <td>Price</td>
                <td>Discount</td>
                <td>description</td>
                <td>Actions</td>
            </thead>
            @foreach ($foods as $food)
                <tr>
                    <td>{{ $food->id }}</td>
                    <td><img src="{{ asset($food->photo)}}" alt=""></td>
                    <td>{{ $food->price }}</td>
                    <td>{{ $food->discount }}</td>
                    <td>{{ $food->description }}</td>
                    <td>
                        <a class="" href="{{ route('admin.restaurant.food.edit', ['food' => $food, 'restaurant'=> $restaurant]) }}">
                            <i data-feather="edit-2" class="icon-sm me-2 text-primary"></i>
                        </a>


                        <a href="{{ route('admin.restaurant.food.delete', ['food' => $food, 'restaurant' => $restaurant]) }}"
                            onclick="event.preventDefault();
                                    if (confirm('Are you sure you want to delete?')) {
                                        document.getElementById('delete-form-{{ $food->id }}').submit();
                                    }"
                            class="btn btn-link">
                            <i data-feather="trash" class="icon-sm mx-2 text-danger"></i>
                        </a>

                        <form id="delete-form-{{ $food->id }}"
                            action="{{ route('admin.restaurant.food.delete', ['restaurant' => $restaurant, 'food' => $food]) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
