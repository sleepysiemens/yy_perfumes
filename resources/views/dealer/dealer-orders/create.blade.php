@extends('layouts.app')

@section('return-url'){{ route('dealer.dashboard') }}@endsection
@section('return-text')В панель@endsection

@section('content')
    <div class="container">
        <dealer-order-create></dealer-order-create>
    </div>
@endsection
