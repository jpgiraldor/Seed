@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{__('text.shopping.cart.products_in_car')}}
            <ul id="errors">
            
                @foreach($data["seeds"] as $seed)
                    <li>
                    {{ $seed[0] }} : {{ $seed[1] }}
                    </li>
                @endforeach
            </ul>
            <br />
            {{__('text.shopping.cart.products_in_car')}}: {{ $data['total'] }}<br /><br />
            <a href="{{ route('shop.buy') }}">{{__('text.shopping.cart.buy')}}</a>
            <br /><br />
            <a href="{{ route('shop.removeAll') }}">{{__('text.shopping.cart.remove')}}</a>
        </div>
    </div>
</div>
@endsection