@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="col-md-12">
            <h1>Редактировать пользователя<b></b></h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('users.update', $user) }}">
            @isset($user)
                @method('PUT')
            @endisset
                @csrf
            <div>
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Name: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                               value="{{ $user->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">login: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control  @error('login') is-invalid @enderror" name="login"
                               placeholder="{{ $user->login ?? 'Default is NULL'}}">
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">email: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email"
                               value="{{ $user->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
{{--                <br>
                <div class="input-group row">
                    <label for="admin" class="col-sm-2 col-form-label">Admin: </label>
                    <div class="col-sm-6">
                        <input type="checkbox" class="form-control" name="is_admin"
                            @if(isset($user) && $user->is_admin === 1)
                               checked = "checked"
                            @endif
                        >
                    </div>
                </div>--}}
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image">
                        </label>
                    </div>
                </div>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
    </div>
@endsection