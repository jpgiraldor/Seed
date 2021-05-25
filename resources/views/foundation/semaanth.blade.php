@extends('layouts.app')

@section('content')

@foreach($data as $foundation)
<div class="card" >           
                
    <div class="card-header"></div>
    <div class="card-body">
        <b>{{__('text.foundation.name')}}:</b> {{$foundation['name']}}<br />
        <b>{{__('text.foundation.email')}}:</b> {{$foundation['email']}}<br />
        <b>{{__('text.foundation.description')}}:</b> {{$foundation['description']}}<br />


        <a href={{$foundation['url']}} type = "button" class="btn btn-primary">{{__('text.foundation.donate')}}</a>

    </div>
</div>
@endforeach

@endsection