@extends('layouts.main')

@section('title')
    @parent | {{ $Category->name }}
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="@if (!$Category->id){{ route('admin.categories.store') }}@else{{ route('admin.categories.update', $Category) }}@endif">
                            @csrf
                            @if ($Category->id)
                                <input type="hidden" name="_method" value="PUT">
                            @endif
                            <div class="form-group">
                                <label for="categoryTxt" class="col-md-6">Название категорией латиницей (для адресации)</label>
                                <input type="text" name="categoryTxt" id="newsTitle" class="form-control" value="{{ $Category->categoryTxt ?? old('categoryTxt') }}">
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-6">Название категории кириллицей</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $Category->name ?? old('name') }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" id="addNews" class="btn btn-primary">
                                    @if (!$Category->id)Добавить категорию@else Редактировать категорию@endif
                                </button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
