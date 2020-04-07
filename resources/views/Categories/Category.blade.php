@extends('layouts.main')

@section('title')
    @parent | {{ $Category['name'] }}
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<h1>{{ $Category['name'] }}</h1>
@foreach ($Category['news'] as $singleNews)
    <a href="{{ route('News.show', $singleNews['id'])}}">{{ $singleNews['title']}}</a><br>
@endforeach
@endsection
