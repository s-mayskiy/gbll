@extends('layouts.main')

@section('title')
    @parent | Категории
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<h1>Категории</h1><br>
@foreach ($Categories as $category)
    <a href="{{ route('Categories.show', $category["categoryTxt"]) }}">{{ $category["name"] }}</a><br>
@endforeach
@endsection


