@extends('layouts.main')

@section('title', '| Скачать новости по категроии')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Выгружает данные из ФАЙЛА, а не из БД, т.к. в БД пока нет связей между новостями и категориями</h1>
                        <form method="POST" action="{{ route('admin.downloadNewsByCategory') }}">
                            @csrf

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
                                <button type="submit" id="addNews" class="btn btn-primary">
                                    Скачать файл с данными
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection