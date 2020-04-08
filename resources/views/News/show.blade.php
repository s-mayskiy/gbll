@extends('layouts.main')

@section('title', '| Новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1><a href="{{ route('Categories.show', $SingleNews['category']['categoryTxt']) }}">{{ $SingleNews['category']['name'] }}</a></h1><br>
                        <h2>{{ $SingleNews['singleNews']['title'] }}</h2>
                        <p>{{ $SingleNews['singleNews']['text'] }}</p>
                        <div class="card-img" style="background-image: url({{$SingleNews['singleNews']['image'] ?? asset('default.png')}})"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
