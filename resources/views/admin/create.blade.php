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
                                <label for="title" class="col-md-6">Название новости</label>
                                <input type="text" name="title" id="title" class="form-control {{$errors->get('title') ? 'is-invalid' : ''}}" value="{{ $news->title ?? old('title') }}">
                                <small id="titleHelp" class="invalid-feedback">
                                    @foreach($errors->get('title') as $localError)
                                        {{ $localError }}
                                    @endforeach
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="categoryId" class="col-md-6">Категория новости</label>
                                <select name="categoryId" class="form-control {{$errors->get('categoryId') ? 'is-invalid' : ''}}" id="categoryId">

                                    @forelse($categories as $item)
                                        <option @if (($news->categoryId == $item->id) || ($item->id == old('categoryId'))) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <h2>Нет категории</h2>
                                    @endforelse
                                </select>
                                <small id="categoryIdHelp" class="invalid-feedback">
                                    @foreach($errors->get('categoryId') as $localError)
                                        {{ $localError }}
                                    @endforeach
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="newsText">Содержание новости</label>
                                <textarea id ="textEdit" name="text" class="form-control {{$errors->get('text') ? 'is-invalid' : ''}}" rows="10" id="newsText">{{ $news->text ?? old('text') }}</textarea>
                                <small id="textHelp" class="invalid-feedback">
                                    @foreach($errors->get('text') as $localError)
                                        {{ $localError }}
                                    @endforeach
                                </small>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input @if (($news->id && $news->premium) || (old('premium') == 1)) checked @endif name="premium" class="form-check-input {{$errors->get('premium') ? 'is-invalid' : ''}}" type="checkbox" value="1"
                                           id="premium">
                                    <label class="form-check-label" for="premium">
                                        Новость для премиум доступа?
                                    </label>
                                    <small id="premiumHelp" class="invalid-feedback">
                                        @foreach($errors->get('premium') as $localError)
                                            {{ $localError }}
                                        @endforeach
                                    </small>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image" id="image" class="{{$errors->get('image') ? 'is-invalid' : ''}}" value="{{$news->image}}">
                                <small id="imageHelp" class="invalid-feedback">
                                    @foreach($errors->get('image') as $localError)
                                        {{ $localError }}
                                    @endforeach
                                </small>
                            </div>

                            <div class="card-img" style="background-image: url({{$news->image ?? asset('default.png')}})"></div>

                            <div class="form-group">
                                <button type="submit" id="addNews" class="btn btn-primary">
                                    @if (!$news->id){{__('Добавить')}}@else{{__('Изменить')}}@endif
                                </button>
                            </div>
                        </form>
                        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                        <script>
                            var options = {
                                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                            };
                        </script>
                        <script>
                            CKEDITOR.replace('textEdit', options);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
