@extends('layouts.main')

@section('title', '| Категории')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Категории</h1><br>
                        @foreach ($Categories as $category)
                            <a href="{{ route('Categories.show', $category->categoryTxt) }}"><h2>{{ $category->name }}</a></h2><br>
                        @endforeach
                        {{ $Categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


