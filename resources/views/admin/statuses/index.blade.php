@extends('layouts.admin')

@section('content')
    <div class="card">
       <div class="card-body">
           <div class="d-flex justify-content-between">
               <h4>Статусы заказов</h4>
               <a href="{{ route('statuses.create') }}" class="btn btn-primary">Новый статус</a>
           </div>

           <table class="table table-striped">
               <thead>
                <tr>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Создан</th>
                </tr>
               </thead>
               <tbody>
                @foreach($statuses as $status)
                    <tr>
                        <td class="d-flex align-items-center justify-content-start">
                            @if ($status->primary === true)
                                <div class="bg-info" style="width: 15px;height: 15px;margin-right: 5px;
                                    border-radius: 50%;"></div>
                            @endif
                            <p class="mb-0 mr-3">{{ $status->title }}</p>
                        </td>
                        <td>{{ $status->description }}</td>
                        <td>{{ $status->created_at }}</td>
                    </tr>
                @endforeach
               </tbody>
           </table>
       </div>
    </div>
@endsection
