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
                        <a href="{{ route('Categories.show', $SingleNews->category()->categoryTxt) }}"><h2>{{ $SingleNews->category()->name }}</h2></a><br>
                        <div class="row">
                            <h2 class="col">{{ $SingleNews->title }}</h2>
                            <a href="{{$SingleNews->externalLink ?? ''}}" class="col-3"><button type="button" class="btn btn-light" {{$SingleNews->externalLink ? '': 'disabled'}}>Смотреть на внешнем сайте</button></a>
                        </div>
                        <hr>
                        <p>{{ $SingleNews->text }}</p>

                        <div class="card-img" style="background-image: url({{$SingleNews->image ?? asset('default.png')}})"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
