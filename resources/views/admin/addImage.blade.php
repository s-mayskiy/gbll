@extends('layouts.main')

@section('title', '| Добавление изображения')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.addImage', $id) }}">
                            @csrf

                            <div class="form-group">
                                <input type="file" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <button type="submit" id="addNews" class="btn btn-primary">
                                    Добавить изображение
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
