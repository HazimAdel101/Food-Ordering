@extends('admin.admin_dashboard')
@section('restaurants')
    <div class="h-100 mt-5 pt-5">
        <div class="container">
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach ($restaurants as $restaurant)
                    <div class="col">
                        <a href="{{ route('admin.restaurant.foods', ['restaurant' => $restaurant]) }}">
                            <div class="card " style="width: 18rem;">
                                <img src="{{ asset($restaurant->photo) }}" class="card-img-top" alt="restaurant image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $restaurant->name }}</h5>
                                    <p class="card-text">{{ $restaurant->address }}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $restaurant->address }}</li>
                                    <li class="list-group-item">Open({{ $restaurant->open }}-----{{ $restaurant->close }})
                                    </li>
                                    <li class="list-group-item">Phone: {{ $restaurant->phone }}</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
