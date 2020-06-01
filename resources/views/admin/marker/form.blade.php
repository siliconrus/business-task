@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="col-md-12">
        @isset($markers)
        <h1>Редактировать маркер</h1>
        @else
            <h1>Создать маркер</h1>
        @endisset
        <form method="POST"
              @isset($markers)
              action="{{ route('markers.update', $markers) }}"
              @else
              action="{{ route('markers.store') }}"
              @endisset
            >
            @isset($markers)
                @method('PUT')
            @endisset
            @csrf
            <div>
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Lat: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control  @error('lat') is-invalid @enderror" name="lat"
                               value="@isset($markers) {{ $markers->lat }} @endisset">
                        @error('lat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">LNG: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control  @error('lng') is-invalid @enderror" name="lng"
                               value="@isset($markers) {{ $markers->lng }} @endisset">
                        @error('lng')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
    </div>
@endsection