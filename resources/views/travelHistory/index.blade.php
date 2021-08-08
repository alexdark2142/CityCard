@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="w-100 text-center">
                <h2>Історія поїздок по картці : {{ $number }}</h2>
            </div>
        </div>
    </div>

    @if($travelHistories[0])
        <table class="table table-bordered text-center w-auto m-auto">
            <tr>
                <th>№</th>
                <th>Місто</th>
                <th>Звідки</th>
                <th>Куди</th>
                <th>Дата</th>
            </tr>
            @foreach ($travelHistories as $travel)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $travel->route->city->name }}</td>
                    <td>{{ $travel->route->from }}</td>
                    <td>{{ $travel->route->to }}</td>
                    <td>{{ $travel->created_at }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="w-auto text-center">
            <strong>{{ _('Список пуст') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-12 mt-5">
            <div class="w-100 text-center">
                {!! $travelHistories->links() !!}
            </div>
        </div>
    </div>

@endsection