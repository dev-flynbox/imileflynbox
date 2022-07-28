@extends('layouts.blank')

@section('content')
    <h1>
        Order Status: <span class="text-danger"> {{ $order->status }} </span>
    </h1>
@endsection
