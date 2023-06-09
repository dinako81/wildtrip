@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            @include('front.countries')
        </div>
        <div class="col-9">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>{{$hotel->title}}</h2>
                </div>

                <div class="photo">
                    @if($hotel->photo)
                    <img src="{{asset('hotels-photo') .'/t_'. $hotel->photo}}">
                    @else
                    <img src="{{asset('hotels-photo') .'/no.png'}}">
                    @endif
                </div>

                <div class="gallery">
                    <div>
                        @foreach($hotel->gallery as $photo)
                        <img src="{{asset('hotels-photo') .'/'. $photo->photo}}">
                        @endforeach
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <div class="one-hotel">

                            @include('front.stars')

                            <div class="hotel-info">
                                <div class="buy">
                                    <span>{{$hotel->price}} eur</span>
                                    <section class="--add--to--cart" data-url="{{route('cart-add')}}">
                                        <button type="button" class="btn btn-primary">add to cart</button>
                                        <input type="hidden" name="id" value={{$hotel->id}}>
                                        <input type="number" value="1" min="1" name="count">
                                    </section>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
