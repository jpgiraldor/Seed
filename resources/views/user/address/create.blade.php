@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('text.address.add')}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.address.save') }}">
                        @csrf
                        
                            
                        @foreach($data["addresses"] as $addr)
                        <div class="form-group row col-md-6"> 
                            <label class="text-md-right col-form-label"> {{__('text.address.region')}}: {{ $addr->getRegion() }} {{__('text.address.city')}}: {{ $addr->getCity() }} {{__('text.address.street')}}: {{ $addr->getStreet() }}  </label>
                        </div>
                        @endforeach
                        


                        <input type="hidden" name="user" value="{{ Auth::id() }}" />
                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">{{__('text.address.region')}}</label>

                            <div class="col-md-6">
                                <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" required autocomplete="region" autofocus>

                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{__('text.address.city')}}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">{{__('text.address.street')}}</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street">

                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{__('text.address.phone')}}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="additional_info" class="col-md-4 col-form-label text-md-right">{{__('text.address.info')}}</label>

                            <div class="col-md-6">
                                <input id="additional_info" type="text" class="form-control" name="additional_info" autocomplete="additional_info">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{__('text.show.register')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
