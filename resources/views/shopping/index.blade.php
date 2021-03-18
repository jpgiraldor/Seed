@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ul id="errors">
                @foreach($data["products"] as $product)
                    <li>
                    {{ $product->getId() }} - {{ $product->getName() }} : {{ $product->getPrice() }}
                    <a href="{{ route('shop.add', ['id'=> $product->getId()]) }}">Add to cart</a>
                    </li>
                @endforeach


                {{ $data["products"][0] }}<br /><br />
                {{ $data["products"][0]->items }}<br /><br />
                {{ $data["products"][0]->items[0] }}<br /><br />
                {{ $data["products"][0]->items[0]->order }}<br /><br />
                {{ $data["products"][0]->items[0]->order->getTotal() }}<br /><br />
            </ul>
        </div>
    </div>
</div>
@endsection