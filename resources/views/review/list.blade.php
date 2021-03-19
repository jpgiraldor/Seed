@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row p-5">
        <div class="col-md-12">
            <ul id="errors">
                @foreach($data["review"] as $review)
                <li>{{ $review->getId() }} - {{ $review->getName() }} : {{ $review->getPrice() }}</li>
                <a href="{{ route('review.show',$review->getId()) }}" type = "button" class="btn btn-primary">Show product</a>
                </b><br />
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection