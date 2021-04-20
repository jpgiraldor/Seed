@extends('layouts.app')


@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav class="navbar navbar-light" style="background-color: #2c3e50;">    
            
                <a  class="nav-link" href="/shop/list/price">{{__('text.seed.price')}}</a>
                <a  class="nav-link" href="/shop/list/water">{{__('text.seed.water')}} </a>
                <a  class="nav-link" href="/shop/list/germination">{{__('text.seed.germination')}} </a>
                <a  class="nav-link" href="/shop/list/score">{{__('text.comment.score')}} </a>
                <a  class="nav-link" href="/shop/list/popularity"> {{__('text.popularity')}} </a>
                <form type='POST' class="form-inline my-2 my-lg-0">
                <!--@csrf -->
                    <input class="form-control ml-sm-2" name='query' type='search' >
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> {{__('text.search')}}</button>
                </form>
            </nav>
            @foreach($data["seeds"] as $seed)
            <div class="card" >           
                
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


                    <a href="{{ route('shop.show',$seed->getId()) }}" type = "button" class="btn btn-primary">{{__('text.seed.show')}}</a>

                </div>
            </div>

            <br />
            @endforeach
        </div>
    </div>
</div>
@endsection