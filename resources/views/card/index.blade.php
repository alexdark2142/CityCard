@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cards.create', Auth::id()) }}">Додати картку</a>
            </div>
            <div class="w-100 text-center">
                <h2>Список карток</h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if($cards[0])
        <table class="table table-bordered text-center w-auto m-auto">
            <tr>
                <th>№</th>
                <th>Номер картки</th>
                <th>Місто</th>
                <th>Тип</th>
                <th>Баланс</th>
                <th>Дії</th>
            </tr>
            @foreach ($cards as $card)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $card->number }}</td>
                    <td>
                        @if($card->city)
                            {{ $card->city->name }}
                        @else
                            {{_('Місто видалено')}}
                        @endif
                    </td>
                    <td>
                        @if($card->cardType)
                            {{ $card->cardType->name }}
                        @else
                            {{_('Тип картки видалено')}}
                        @endif
                    </td>
                    <td>{{ $card->balance }} грн.</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('transaction', $card->id) }}">Історія транзакцій</a>
                        <a class="btn btn-primary" href="{{ route('travelHistory', $card->id) }}">Історія поїздок</a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="w-auto text-center">
            <strong>{{ _('У вас немає карток') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-12 mt-5">
            <div class="w-100 text-center">
                {!! $cards->links() !!}
            </div>
        </div>
    </div>

@endsection