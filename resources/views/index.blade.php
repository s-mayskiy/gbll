@extends('layouts.main')

@section('title', '| Главная')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p>Wellcome!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

