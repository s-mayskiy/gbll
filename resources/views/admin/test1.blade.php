@extends('layouts.main')

@section('title')
    @parent | Тест1
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
<p>Тест 1</p>
@endsection
