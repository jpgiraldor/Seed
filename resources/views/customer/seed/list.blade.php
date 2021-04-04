@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data["seeds"] as $seed)
            <div class="card" >           
                <a href="/seed/show/{{$seed->getId()}}" >
                    <div class="card-header">{{ $seed->getName() }}</div>
                </a>
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
                    <a href="{{ route('customer.seed.show',$seed->getId()) }}" type = "button" class="btn btn-primary">{{__('text.seed.list.show')}}</a>
                </div>
            </div>

            <br />
            @endforeach
        </div>
    </div>
</div>
@endsection