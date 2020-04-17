@extends('layouts.main')

@section('title')
    @parent | {{ $Category->name }}
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
                        <h1>{{ $Category->name}}</h1>
                        @forelse($CategoryNews as $item)
                            <a href="{{ route('News.show', $item)}}"><h2>{{ $item->title}}</h2></a><br>
                            <div class="card-img" style="background-image: url({{$item->image ?? asset('default.png')}})"></div>
                            <hr/>
                        @empty
                            <p>Нет новостей по этой категории.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
