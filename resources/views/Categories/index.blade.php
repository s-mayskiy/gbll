@extends('layouts.main')

@section('title', '| Категории')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Категории</h1><br>
                        @foreach ($Categories as $category)
                            <a href="{{ route('Categories.show', $category->categoryTxt) }}">{{ $category->name }}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


