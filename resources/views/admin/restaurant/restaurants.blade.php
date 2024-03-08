@extends('admin.admin_dashboard')
@section('restaurants')
    <div class="h-100 mt-5 pt-5">
        @foreach ($restaurants as $restaurant)
            <div class="card " style="width: 18rem;">
                <img src="{{asset($restaurant->photo)}}" class="card-img-top" alt="restaurant image">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection
