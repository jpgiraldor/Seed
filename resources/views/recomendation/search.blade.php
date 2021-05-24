@extends('layouts.app')


@section('content')
<br>
<br>
<div class="container">
    <h3>Ingrese el municipio donde seran sembradas las semillas</h3>
    
        <input type="text"class="input-group mb-3"name="city"value="{{ old('city') }}">
        <a href="{{ route('recomendation.list',city) }}" type = "button" class="btn btn-primary">{{__('text.seed.show')}}</a>
    </form>
</div>
@endsection