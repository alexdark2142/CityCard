@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="pull-right mb-3">
                @can('transport-create')
                    <a class="btn btn-success" href="{{ route('transports.create') }}"> Додати транспорт</a>
                @endcan
            </div>
            <div class="w-100 text-center">
                <h2>Транспорт</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if($transports[0])
        <table class="table table-bordered text-center w-auto m-auto">
            <tr>
                <th>№</th>
                <th>Вид транспорту</th>
                <th>Тариф</th>
                <th width="280px">Дії</th>
            </tr>
            @foreach ($transports as $transport)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $transport->type }}</td>
                    <td>{{ $transport->tariff }}</td>
                    <td>
                        <form action="{{ route('transports.destroy',$transport->id) }}" method="POST">
                            @can('transport-edit')
                                <a class="btn btn-primary" href="{{ route('transports.edit',$transport->id) }}">Редагувати</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('transport-delete')
                                <button type="submit" class="btn btn-danger">Видалити</button>
                            @endcan
                        </form>
                    </td>
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
                {!! $transports->links() !!}
            </div>
        </div>
    </div>

@endsection