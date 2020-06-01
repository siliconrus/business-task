@extends('layouts.app')
@section('content')
    <main class="py-4">
        <div class="container">
            @include('layouts.admin')
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <a class="btn btn-success" href="{{ route('users.create') }}">Создать</a><p>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Аватар</th>
                                    <th>Имя</th>
                                    <th>Mail</th>
                                    <th>Роль</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            <img src="{{ $user->image }}" alt="" class="img-fluid" width="64" height="64">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->is_admin ? 'Админ' : 'Пользователь' }}</td>
                                        <td>
                                         <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                <a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}">Редактировать</a>
                                                <input class="btn btn-danger" type="submit" value="Delete">
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection