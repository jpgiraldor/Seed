@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('utils.message')
            <div class="card">
                <div class="card-header">Create seed</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('seed.save') }}">
                        @csrf
                        <input type="text" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                        <input type="text" placeholder="Enter brand" name="brand" value="{{ old('brand') }}" />
                        <input type="text" placeholder="Enter weight" name="weight" value="{{ old('weight') }}" />
                        <input type="text" placeholder="Enter Water" name="water" value="{{ old('water') }}" />
                        <input type="text" placeholder="Enter the drought resistance" name="drought" value="{{ old('drought') }}" />
                        <input type="text" placeholder="Enter germination" name="germination" value="{{ old('germination') }}" />
                        <input type="text" placeholder="Enter the type" name="type" value="{{ old('type') }}" />
                        <input type="text" placeholder="Enter the keywords" name="keywords" value="{{ old('keywords') }}" />
                        <input type="text" placeholder="Enter the category" name="category" value="{{ old('category') }}" />
                        <input type="text" placeholder="Enter the price" name="price" value="{{ old('price') }}" />
                        <input type="text" placeholder="Enter the ground type" name="ground" value="{{ old('ground') }}" />
                        <input type="submit" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection