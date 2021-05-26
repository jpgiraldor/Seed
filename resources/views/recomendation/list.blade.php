@extends('layouts.app')


@section('content')
<br>
<br>
<div class="container">
    <h3>{{__('text.recomend')}}</h3>
    <h6><li>{{$api['seeds'][0]['name']}}</li></h6>
    <a type="button" class='btn btn-primary 'text='View' href="{{ route('shop.show',$api['seeds'][0]['id']) }}">{{__('text.seed.show')}}</a>
</div>
@endsection
