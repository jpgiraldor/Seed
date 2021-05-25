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
                    <b>Date:</b> {{ $order->getDate() }}<br />
                    <b>Total:</b> {{ $order->total }}<br />
                    <form method="post" action="{{ route('admin.order.delete' , $order->getId()) }}">
                        @csrf
                        <input type="hidden" value="DELETE" />
                        <button type="submit" class ='btn btn-danger' >{{__('text.admin.delete')}}</button>
                    
                    </form>
                    
                </div>
            </div>

            <br />
            @endforeach
        </div>
    </div>
</div>
@endsection