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
                    <h2>Hotels</h2>
                </div>

                <form action="{{route('hotels-index')}}" method="get">
                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Rūšiuoti</label>
                                    <select class="form-select" name="sort">
                                        @foreach($sortSelect as $value => $text)
                                        <option value="{{$value}}" @if($value===$sort) selected @endif>{{$text}}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-text">Pasirinkite rūšiavimo nuostatas</div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Filtras</label>
                                    <select class="form-select" name="filter">
                                        @foreach($filterSelect as $value => $text)
                                        <option value="{{$value}}" @if($value===$filter) selected @endif>{{$text}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-text">Pasirinkite filtravimo nuostatas</div>
                            </div>

                            <div class="col-3">
                                <div class="sort-filter-buttons">
                                    <button type="submit" class="btn btn-outline-dark butn2 brown">Pateikti</button>
                                    <a href="{{route('hotels-index')}}" class="btn btn-outline-dark butn2 text-danger">Ištrinti</a>
                                </div>
                            </div>
                </form>


                <div class="card-body">
                    <ul class="list-group">
                        @forelse($hotels as $hotel)
                        <div class="hotel-line">

                            <div class="hotel-info">
                                <a href="{{route('front-show-hotel', $hotel)}}">
                                    <h2>{{$hotel->title}}</h2>
                                </a>
                                <h4><i>Duration: {{$hotel->duration}}<i></h4>
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

                                @include('front.stars')

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
                        @empty
                        <li class="list-group-item">
                            No hotels
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
