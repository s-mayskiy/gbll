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
                        <form enctype="multipart/form-data" method="POST" action="@if (!$news->id){{ route('admin.news.create') }}@else{{ route('admin.news.update', $news) }}@endif">
                            @csrf
                            <div class="form-group">
                                <label for="newsTitle" class="col-md-6">Название новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control" value="{{ $news->title ?? old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="categoryId" class="col-md-6">Категория новости</label>
                                <select name="categoryId" class="form-control" id="newsCategory">
                                    @forelse($categories as $item)
                                        <option @if (($news->id && $news->categoryId == $item->id) || $item->id == old('category')) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <h2>Нет категории</h2>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="newsText">Содержание новости</label>
                                <textarea name="text" class="form-control" rows="10" id="newsText">{{ $news->text ?? old('text') }}</textarea>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input @if (($news->id && $news->premium) || (old('premium') == 1)) checked @endif name="premium" class="form-check-input" type="checkbox" value="1"
                                           id="premium">
                                    <label class="form-check-label" for="premium">
                                        Новость для премиум доступа?
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image" id="image" value="{{$news->image}}">
                            </div>

                            <div class="card-img" style="background-image: url({{$news->image ?? asset('default.png')}})"></div>

                            <div class="form-group">
                                <button type="submit" id="addNews" class="btn btn-primary">
                                    @if (!$news->id)Добавить новость@else Редактировать новость@endif
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
