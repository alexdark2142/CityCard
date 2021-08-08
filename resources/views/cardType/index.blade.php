@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="pull-right mb-3">
                @can('card-type-create')
                    <a class="btn btn-success" href="{{ route('card-types.create') }}"> Додати тип</a>
                @endcan
            </div>
            <div class="w-100 text-center">
                <h2>Типи квитків</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if($cardTypes[0])
        <table class="table table-bordered text-center w-auto m-auto">
            <tr>
                <th>№</th>
                <th>Тип квитка</th>
                <th>Вартість у відсотках</th>
                <th width="280px">Дії</th>
            </tr>
            @foreach ($cardTypes as $type)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->cost_in_percent }}%</td>
                    <td>
                        <form action="{{ route('card-types.destroy',$type->id) }}" method="POST">
                            @can('card-type-edit')
                                <a class="btn btn-primary"
                                   href="{{ route('card-types.edit',$type->id) }}">Редагувати</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('card-type-delete')
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
                {!! $cardTypes->links() !!}
            </div>
        </div>
    </div>

@endsection