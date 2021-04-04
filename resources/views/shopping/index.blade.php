@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ul id="errors">
                @foreach($data["seeds"] as $seed)
                    <li>
                    {{ $seed->getId() }} - {{ $seed->getName() }} : {{ $seed->getPrice() }}
                    <a href="{{ route('shop.add', ['id'=> $seed->getId()]) }}">{{__('cart.add')}}</a>
                    </li>
                @endforeach


                {{ $data["seeds"][0] }}<br /><br />
                {{ $data["seeds"][0]->items }}<br /><br />
                {{ $data["seeds"][0]->items[0] }}<br /><br />
                {{ $data["seeds"][0]->items[0]->order }}<br /><br />
                {{ $data["seeds"][0]->items[0]->order->getTotal() }}<br /><br />
            </ul>
        </div>
    </div>
</div>
@endsection