@extends('layouts.app')


@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data["orders"] as $order)
            <form method="POST" action="{{ route('user.seed.bill') }}">
                @csrf
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bill" id="pdf" value="pdf">
                    <label class="form-check-label" for="inlineRadio1">pdf</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bill" id="excel" value="excel">
                    <label class="form-check-label" for="inlineRadio2">excel</label>
                </div>
                <button type="submit" class="btn btn-primary" action="{{ route('user.seed.bill') }}">{{__('text.download.bill')}}</button>
                <div class="card" >           
            </form>
                <div class="card-header">{{ $order->getId() }}</div>
                <div class="card-body">
                    <b>{{__('text.user')}}:</b> {{ $order->user }}<br />
                    <b>{{__('text.date')}}:</b> {{ $order->date}}<br />
                    <b>{{__('text.total')}}:</b> {{ $order->total}}<br />

                </div>
            </div>

            <br />
            @endforeach
        </div>
    </div>
</div>
@endsection