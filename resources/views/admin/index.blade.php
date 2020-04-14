@extends('layouts.main')

@section('title', '| Админ')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Корень админки</h1>
                        <a href="{{ route('admin.news.index')}}"><h2>Админка новостей</h2></a>
                        <a href="{{ route('admin.categories.index')}}"><h2>Админка категорий</h2></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
