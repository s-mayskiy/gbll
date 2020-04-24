@extends('layouts.main')

@section('title', '| Ресурс')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="@if (!$resource->id){{ route('admin.resources.create') }}@else{{ route('admin.resources.edit', $resource) }}@endif">
                            @csrf
                            <div class="form-group">
                                <label for="Description" class="col-md-6">Название категорией латиницей (для адресации)</label>
                                <input type="text" name="Description" id="Description" class="form-control {{$errors->get('Description') ? 'is-invalid' : ''}}" value="{{ $resource->Description ?? old('Description') }}">
                                <small id="DescriptionHelp" class="invalid-feedback">
                                    @foreach($errors->get('Description') as $localError)
                                        {{ $localError }}
                                    @endforeach
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="URI" class="col-md-6">Название категории кириллицей</label>
                                <input type="text" name="URI" id="URI" class="form-control {{$errors->get('URI') ? 'is-invalid' : ''}}" value="{{ $resource->URI ?? old('URI') }}">
                                <small id="nameHelp" class="invalid-feedback">
                                    @foreach($errors->get('URI') as $localError)
                                        {{ $localError }}
                                    @endforeach
                                </small>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="addNews" class="btn btn-primary">
                                    @if (!$resource->id)Добавить@else Редактировать@endif
                                </button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
