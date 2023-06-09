@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Countries List</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($countries as $country)
                        <li class="list-group-item">
                            <div class="country-line mb-8 col-9">
                                <div class="country-info">
                                    <h2>Country: {{$country->title}}</h2>
                                    <h2>Season: {{$country->season}} </h2>
                                </div>
                            </div>
                            <div class="buttons btn mb-3 col-9">
                                <a href="{{route('countries-edit', $country)}}" class="btn btn-outline-success">Edit</a>
                                <form action="{{route('countries-delete', $country)}}" method="post">
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">
                            <div class="country-line">No countries</div>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
