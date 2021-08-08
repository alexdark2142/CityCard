@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center">
            <div class="pb-5">
                <h2>Додати транспорт</h2>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Упс!</strong> Возникли проблемы с вашим вводом.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('transports.store') }}" method="POST">
        @csrf


        <div class="row w-auto flex-column">
            <div class="col-3 m-auto">
                <div class="form-group">
                    <strong>Вид транспорту:</strong>
                    <input type="text" name="type" class="form-control" placeholder="Назва">
                </div>
            </div>
            <div class="col-3 m-auto">
                <div class="form-group">
                    <strong>Вартість проїзду:</strong>
                    <input type="number" min="0" name="tariff" class="form-control" placeholder="5">
                </div>
            </div>
            <div class="col-3 m-auto text-center">
                <button type="submit" class="btn btn-primary">Додати</button>
                <a class="btn btn-primary" href="{{ route('transports.index') }}">Відмінити</a>
            </div>

        </div>


    </form>
@endsection