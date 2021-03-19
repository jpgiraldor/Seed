
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
                    @if($loop->index==0 || $loop->index==1)
                    <b>Product id:</b> <b>{{ $seed->getId() }}</b><br />
                    @else
                    <b>Product id:</b> {{ $seed->getId() }}<br />
                    @endif
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
                    <a href="{{ route('seed.show',$seed->getId()) }}" type = "button" class="btn btn-primary">Show seed</a>
                </div>
            </div>

            <br />
            @endforeach
        </div>
    </div>
</div>
@endsection