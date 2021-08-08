@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <div class="pull-right mb-3">
                @can('city-create')
                    <a class="btn btn-success" href="{{ route('cities.create') }}"> Додати місто</a>
                @endcan
            </div>
            <div class="w-100 text-center">
                <h2>Міста</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if($cities[0])
        <table class="table table-bordered text-center w-auto m-auto">
            <tr>
                <th>№</th>
                <th>Назва міста</th>
                <th width="280px">Дії</th>
            </tr>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $city->name }}</td>
                    <td>
                        <form action="{{ route('cities.destroy',$city->id) }}" method="POST">
                            @can('city-edit')
                                <a class="btn btn-primary" href="{{ route('cities.edit',$city->id) }}">Редагувати</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('city-delete')
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
                {!! $cities->links() !!}
            </div>
        </div>
    </div>

@endsection