@extends('layouts.main')

@section('title')
    @parent | Главная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h1>Новости</h1><br>
    @forelse ($News as $singleNews)
        <a href="{{ route('News.show', $singleNews['id'])}}">{{ $singleNews['title']}}</a><br>
    @empty
        Новости отсутствуют!
    @endforelse
@endsection
