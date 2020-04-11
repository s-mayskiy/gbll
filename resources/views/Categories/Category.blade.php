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
                        <p>Здесь будет перечень новостей по данной категории, когда в БД появятся связи.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
