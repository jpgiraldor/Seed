@extends('layouts.app')


@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data["orders"] as $order)
            <div class="card" >           
                
                <div class="card-header">{{ $order->getId() }}</div>
                <div class="card-body">
                    <b>User:</b> {{ $order->user }}<br />
                    <b>Date:</b> {{ $order->date}}<br />
                    <b>Total:</b> {{ $order->total}}<br />

                </div>
            </div>

            <br />
            @endforeach
        </div>
    </div>
</div>
@endsection