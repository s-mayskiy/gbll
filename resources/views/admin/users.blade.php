@extends('layouts.main')

@section('title', '| Пользователи')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Пользователи</h1>
                        @forelse ($users as $singleUser)
                            <h2>{{$singleUser->name}}</h2>
                            <div class="row">
                                <div class="col-md-6"><h3>Email: {{$singleUser->email}}</h3></div>
                                <div class="col-md-6"><h3>Админ: {{$singleUser->isAdmin ? 'Да': 'Нет'}}</h3></div>
                            </div>
                            @if ($inactiveUserId == $singleUser->id)
                                <h3 class="alert-danger">Текущий пользователь</h3>
                            @else
                            <div>
                                <a href=" {{ !$singleUser->isAdmin ? route('admin.users.setAdmin', $singleUser) : ''}}"><button type="button" class="btn btn-success" {{$singleUser->isAdmin ? 'disabled' :''}} >{{__('Сделать администратором')}}</button></a>
                                <a href="{{ $singleUser->isAdmin ? route('admin.users.unsetAdmin', $singleUser) : ''}}"><button type="button" class="btn btn-warning" {{!$singleUser->isAdmin ? 'disabled' :''}}>{{__('Убрать из администраторов')}}</button></a>
                                <a href="{{ route('admin.users.delete', $singleUser) }}"><button type="button" class="btn btn-danger">{{__('Удалить')}}</button></a>
                            </div>
                            @endif
                            <hr/>
                        @empty
                            Пользователи отсутствуют!
                        @endforelse
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
