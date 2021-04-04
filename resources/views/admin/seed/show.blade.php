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
                    <form method="post" action="{{ route('admin.seed.delete' , $seed->getId()) }}">
                        {!! csrf_field() !!}
                        <input type="hidden" value="DELETE" />
                        <button type="submit" class ='btn btn-danger' >{{__('text.admin.seed.show.delete')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection