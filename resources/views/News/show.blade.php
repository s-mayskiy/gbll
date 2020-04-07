@extends('layouts.main')

@section('title')
    @parent | Новость
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<h1><a href="{{ route('Categories.show', $SingleNews['category']['categoryTxt']) }}">{{ $SingleNews['category']['name'] }}</a></h1><br>
<h2>{{ $SingleNews['singleNews']['title'] }}</h2>
<p>{{ $SingleNews['singleNews']['text'] }}</p>
@endsection
