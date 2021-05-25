@extends('layouts.app')


@section('content')
<br>
<br>
<div class="container">
    <h3>Ingrese el municipio donde seran sembradas las semillas</h3>
    <form method="POST" action="{{ route('recomendation.list') }}">
        @csrf
        <input type="text"class="input-group mb-3"name="city"value="{{ old('city') }}">
        <input type="submit" value="Send" action="{{ route('recomendation.list') }}" />
    </form>
</div>
@endsection