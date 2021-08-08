@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="w-100 text-center">
                <h2>Історія транзакцій по картці : {{ $number }}</h2>
            </div>
        </div>
    </div>

    @if($transactions[0])
        <table class="table table-bordered text-center w-auto m-auto">
            <tr>
                <th>№</th>
                <th>Тип транзакції</th>
                <th>Ціна</th>
                <th>Дата</th>
            </tr>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->cost }}</td>
                    <td>{{ $transaction->created_at }}</td>
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
                {!! $transactions->links() !!}
            </div>
        </div>
    </div>

@endsection