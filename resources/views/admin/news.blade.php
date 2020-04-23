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
                        <h1>Админка новостей</h1>

                        <a href="{{route('admin.news.create')}}"><button type="button" class="btn btn-primary btn-lg btn-block">Добавить новость</button></a>
                        <hr>
                        @forelse ($News as $singleNews)
                            <div class="row">
                                <a href="{{ route('News.show', $singleNews)}}" class="col"><h2>{{ $singleNews->title}}</h2></a>
                                <a href="{{$singleNews->externalLink ?? ''}}" class="col-3"><button type="button" class="btn btn-light" {{$singleNews->externalLink ? '': 'disabled'}}>Смотреть на внешнем сайте</button></a>
                            </div>
                            <a href=" {{ route('admin.news.edit', $singleNews) }}"><button type="button" class="btn btn-success">{{__('Изменить')}}</button></a>
                            <a href="{{ route('admin.news.destroy', $singleNews) }}"><button type="button" class="btn btn-danger">{{__('Удалить')}}</button></a>
                            <hr/>
                        @empty
                            Новости отсутствуют!
                        @endforelse
                        {{ $News->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
