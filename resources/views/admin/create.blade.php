@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="col-md-12">
        <h1>Создание пользователя</h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('users.store') }}">
            @csrf
            <div>
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Name: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                               placeholder="Введите имя..">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Login: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="login"
                               placeholder="Введите логин..">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Email: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control   @error('email') is-invalid @enderror" name="email"
                               placeholder="Введите email..">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Password: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                               placeholder="Введите пароль..">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <br>
                <div class="col-md-5 mb-3">
                   <label for="country">Админ</label>
                   <select class="custom-select d-block w-100" id="country" name="is_admin" required>
                       <option value="">Не выбрано</option>
                       <option value="1">Да</option>
                       <option value="0">Нет</option>
                   </select>
                </div>
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