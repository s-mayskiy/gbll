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
                        <a href="{{ route('Categories.show', $SingleNews->category()->categoryTxt) }}"><h2>{{ $SingleNews->category()->name }}</a></h2><br>
                        <h2>{{ $SingleNews->title }}</h2>
                        <p>{{ $SingleNews->text }}</p>

                        <div class="card-img" style="background-image: url({{$SingleNews->image ?? asset('default.png')}})"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
