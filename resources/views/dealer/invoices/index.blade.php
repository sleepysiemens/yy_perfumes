@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('Client') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Edit') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>
                                        <div>{{ $invoice->requisites['soc_name'] }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $invoice->created_at }}</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('print.invoice.show', $invoice->hash) }}" target="_blank">{{ __('Print invoice') }}</a>
                                        <br>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
