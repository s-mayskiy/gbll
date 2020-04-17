@extends('layouts.main')

@section('title', '| Категории')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Категории</h1><br>
                        <a href="{{route('admin.categories.create')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Добавить категорию</button></a>
                        <hr>
                        @foreach ($Categories as $category)
                            <a href="{{ route('Categories.show', $category->categoryTxt) }}"><h2>{{ $category->name }}</h2></a><br>
                            <a href=" {{ route('admin.categories.edit', $category) }}"><button type="button" class="btn btn-success">Редактировать</button></a>
                            <a href="{{ route('admin.categories.destroyOne', $category) }}"><button type="button" class="btn btn-danger">Удалить</button></a>
                            <hr/>
                            <hr>
                        @endforeach
                        {{ $Categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


