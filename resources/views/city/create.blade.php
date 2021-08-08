@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center">
            <div class="pb-5">
                <h2>Додати місто</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Упс!</strong>Можливі проблеми з вашим вводом.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cities.store') }}" method="POST">
        @csrf

        <div class="row w-auto flex-column">
            <div class="col-3 m-auto">
                <div class="form-group">
                    <strong>Назва:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Назва">
                </div>
            </div>

            <div class="col-3 m-auto text-center">
                <button type="submit" class="btn btn-primary">Додати</button>
                <a class="btn btn-primary" href="{{ route('cities.index') }}">Відмінити</a>
            </div>
        </div>

    </form>
@endsection