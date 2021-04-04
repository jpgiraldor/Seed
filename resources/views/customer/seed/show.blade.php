@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $seed->getName() }}</div>
                <div class="card-body">
                    <b>{{__('text.seed.brand')}}:</b> {{ $seed->getBrand() }}<br />
                    <b>{{__('text.seed.weight')}}:</b> {{ $seed->getweight() }}<br />
                    <b>{{__('text.seed.water')}}:</b> {{ $seed->getWater() }}<br />
                    <b>{{__('text.seed.ground')}}:</b> {{ $seed->getGround() }}<br />
                    <b>{{__('text.seed.drought')}}:</b> {{ $seed->getDrought() }}<br />
                    <b>{{__('text.seed.germination')}}:</b> {{ $seed->getGermination() }}<br />
                    <b>{{__('text.seed.type')}}:</b> {{ $seed->getType() }}<br />
                    <b>{{__('text.seed.keywords')}}:</b> {{ $seed->getKeywords() }}<br />
                    <b>{{__('text.seed.category')}}:</b> {{ $seed->getCategory() }}<br />
                    <b>{{__('text.seed.price')}}:</b> {{ $seed->getPrice() }}<br />
                    </ul>
                    <a href="{{ route('shop.add', ['id'=> $seed->getId()]) }}">{{__('text.cart.add')}}</a>
                    <h6>{{__('text.customer.seed.show.comment')}}</h6>
                    <form method="POST" action="{{ route('customer.review.save') }}">
                        @csrf
                        <input type="number" placeholder=0 min=0 max=5 step="1" name="score" value="{{ old('score') }}" />
                        <input type="text" placeholder={{__('text.customer.seed.show.comment.enter_content')}} name="content" value="{{ old('content') }}" />
                        <input type="hidden" name="seed" value="{{ $seed->getId() }}" />
                        <input type="hidden" name="customer" value="{{ Auth::user()->id }}" />
                        <input type="submit" value="Send" />
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @foreach($data["reviews"] as $review)
                <div class="card" >           
                    <div class="card-body">
                        <b>{{__('text.customer.seed.show.comment.score')}}: </b> {{ $review->getScore() }}<br />
                        <b>{{__('text.customer.seed.show.comment.comment')}}: </b> {{ $review->getContent() }}<br />
                    </div>
                </div>
                <br/>
            @endforeach
        </div>
    </div>
</div>
@endsection