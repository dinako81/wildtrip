@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <ul class="list-group">

                        <li class="list-group-item">
                            <div class="country">
                                <div class="country-info">
                                    <h2><i>{{$country->title}}</i></h2>
                                    ******
                                </div>
                                <div class="hotel-info">
                                    <h2><i>Hotels:</i></h2>
                                    @foreach($country->hotels as $hotel)
                                    <h3><a href="{{ route('hotels-show') }}">{{$country->hotel()->title}}</a></h3>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
