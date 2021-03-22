@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $seed->getName() }}</div>
                <div class="card-body">
                    <b>Product id:</b> {{ $seed->getId() }}<br />
                    <b>Product brand:</b> {{ $seed->getBrand() }}<br />
                    <b>Product weight:</b> {{ $seed->getweight() }}<br />
                    <b>Product water:</b> {{ $seed->getWater() }}<br />
                    <b>Product ground:</b> {{ $seed->getGround() }}<br />
                    <b>Product drought:</b> {{ $seed->getDrought() }}<br />
                    <b>Product germination:</b> {{ $seed->getGermination() }}<br />
                    <b>Product type:</b> {{ $seed->getType() }}<br />
                    <b>Product keywords:</b> {{ $seed->getKeywords() }}<br />
                    <b>Product category:</b> {{ $seed->getCategory() }}<br />
                    <b>Product price:</b> {{ $seed->getPrice() }}<br />
                    </ul>
                    <a href="{{ route('shop.add', ['id'=> $seed->getId()]) }}">Add to cart</a>
                    <form method="POST" action="{{ route('customer.review.save') }}">
                        @csrf
                        <input type="text" placeholder="Enter the score" name="score" value="{{ old('score') }}" />
                        <input type="text" placeholder="Enter the content" name="content" value="{{ old('content') }}" />
                        <input name="seed" value="{{ $seed->getId() }}" />
                        <input name="customer" value="{{ $seed->getId() }}" />
                        <input type="submit" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection