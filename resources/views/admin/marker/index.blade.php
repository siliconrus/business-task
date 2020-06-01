@extends('layouts.app')

@section('content')
    <main class="py-4">
        <div class="container">
            @include('layouts.admin')
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @include('inc.messages')
                            <table class="table">
                                <a class="btn btn-success" href="{{ route('markers.create') }}">Создать</a><p>
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>LAT</th>
                                        <th>LNG</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($markers as $marker)
                                        <tr>
                                            <td>{{ $marker->id }}</td>
                                            <td>{{ $marker->lat }}</td>
                                            <td>{{ $marker->lng }}</td>
                                            <td>
                                            <form action="{{ route('markers.destroy', $marker->id) }}" method="POST">
                                                @csrf
                                                <a class="btn btn-warning" href="{{ route('markers.edit', $marker->id) }}">Редактировать</a>
                                                <input class="btn btn-danger" type="submit" value="Delete">
                                                @method('DELETE')
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                            {{ $markers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection