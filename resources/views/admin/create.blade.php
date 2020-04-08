@extends('layouts.main')

@section('title', '| Добваление новости')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="newsTitle" class="col-md-6">Название новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-md-6">Категория новости</label>
                                <select name="category" class="form-control" id="newsCategory">
                                    @forelse($categories as $item)
                                        <option @if ($item['id'] == old('category')) selected @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @empty
                                        <h2>Нет категории</h2>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="newsText">Содержание новости</label>
                                <textarea name="text" class="form-control" rows="10" id="newsText">{{ old('text') }}</textarea>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input @if (old('premium') == 1) checked @endif name="premium" class="form-check-input" type="checkbox" value="1"
                                           id="premium">
                                    <label class="form-check-label" for="premium">
                                        Новость для премиум доступа?
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <button type="submit" id="addNews" class="btn btn-primary">
                                    Добавить новость
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
