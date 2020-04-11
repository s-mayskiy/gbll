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
                        <p>Здесь будет ссылка на категорию, когда в БД появятася связи</p>
                        <h2>{{ $SingleNews->title }}</h2>
                        <p>{{ $SingleNews->text }}</p>
                        @if (!$SingleNews->image)
                            <a href="{{ route('admin.addImage', $SingleNews->id)}}"><h2>Добавить изображение</h2></a><br>
                        @endif
                        <div class="card-img" style="background-image: url({{$SingleNews->image ?? asset('default.png')}})"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
