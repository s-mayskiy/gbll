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
                        <p>Корень админки.</p>
                        <p>Здесь должна быть какая-то информация о состоянии системы.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
