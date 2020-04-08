@extends('layouts.main')

@section('title', '| Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Новости</h1><br>
                        @forelse ($News as $singleNews)
                            <a href="{{ route('News.show', $singleNews->id)}}"><h2>{{ $singleNews->title}}</h2></a><br>
                            <div class="card-img" style="background-image: url({{$singleNews->image ?? asset('default.png')}})"></div>
                            <hr/>
                        @empty
                            Новости отсутствуют!
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
