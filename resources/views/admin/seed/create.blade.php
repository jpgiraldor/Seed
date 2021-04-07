@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('utils.message')
            <div class="card">
                <div class="card-header">{{__('text.home.index.hot')}}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.seed.save') }}">
                        @csrf
                        <input type="text" placeholder={{__('text.seed.name')}} name="name" value="{{ old('name') }}" />
                        <input type="text" placeholder={{__('text.seed.brand')}} name="brand" value="{{ old('brand') }}" />
                        <input type="text" placeholder={{__('text.seed.weight')}} name="weight" value="{{ old('weight') }}" />
                        <input type="text" placeholder={{__('text.seed.water')}} name="water" value="{{ old('water') }}" />
                        <input type="text" placeholder={{__('text.seed.drought')}} name="drought" value="{{ old('drought') }}" />
                        <input type="text" placeholder={{__('text.seed.germination')}} name="germination" value="{{ old('germination') }}" />
                        <input type="text" placeholder={{__('text.seed.type')}} name="type" value="{{ old('type') }}" />
                        <input type="text" placeholder={{__('text.seed.keywords')}} name="keywords" value="{{ old('keywords') }}" />
                        <input type="text" placeholder={{__('text.seed.category')}} name="category" value="{{ old('category') }}" />
                        <input type="text" placeholder={{__('text.seed.price')}} name="price" value="{{ old('price') }}" />
                        <input type="text" placeholder={{__('text.seed.ground')}} name="ground" value="{{ old('ground') }}" />
                        <input type="submit" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection