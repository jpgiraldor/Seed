@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data->getId }}</div>
                <div class="card-body">
                    {{ $data->getCustomer }}
                    {{ $data->getSeed }}
                    {{ $data->getScore }}
                    {{ $data->getContent }}
                    <form method="post" action="{{ route('admin.review.delete' , $data->getId) }}">
                        {!! csrf_field() !!}
                        <input type="hidden" value="DELETE" />
                        <button type="submit" class = >{{__('text.admin.review.show.delete')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection