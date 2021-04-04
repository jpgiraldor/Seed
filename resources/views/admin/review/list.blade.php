@extends('layouts.app')
@section("title", $data["reviews"])
@section('content')
<div class="container">
    <div class="row p-5">
        <div class="col-md-12">
            <ul id="errors">
                @foreach($data["reviews"] as $review)
                <li>{{ $review->getId() }} - {{ $review->getComment() }} : {{ $review->getScore() }}</li>
                <a href="{{ route('admin.review.show',$review->getId()) }}" type = "button" class="btn btn-primary">{{__('text.admin.review.list.review')}}</a>
                </b><br />
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection