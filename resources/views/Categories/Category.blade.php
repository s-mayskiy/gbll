@extends('layouts.main')

@section('title')
    @parent | {{ $Category['name'] }}
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $Category['name'] }}</h1>
                        @foreach ($Category['news'] as $singleNews)
                            <a href="{{ route('News.show', $singleNews['id'])}}">{{ $singleNews['title']}}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
