@extends('layouts.main')

@section('title', '| Ресурсы')

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
                        <a href="{{route('admin.resources.create')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Добавить источник</button></a>
                        <hr>
                        @foreach ($resources as $resource)
                            <h2 class="col">Описание: <br></h2>
                            <p>{{$resource->Description}}</p>
                            <h2 class="col">Ссылка: <br></h2>
                            <a href="{{$resource->URI}}">{{$resource->URI}}</a>
                            <hr>
                            <a href=" {{ route('admin.resources.edit', $resource) }}"><button type="button" class="btn btn-success">Редактировать</button></a>
                            <a href="{{ route('admin.resources.delete', $resource) }}"><button type="button" class="btn btn-danger">Удалить</button></a>
                            <hr/>
                            <hr>
                        @endforeach
                        {{ $resources->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


