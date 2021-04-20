@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('text.products_in_car')}}</div>
                    <div class="row justify-content-center">
                        
                        <div class="col-md-12">
                            <ul id="errors">
                                @foreach($data["seeds"] as $sp)
                                    <li>
                                    {{ $sp[1] }} : ${{ $sp[2] }}
                                    </li>
                                @endforeach
                            </ul>
                            {{__('text.seed.cart')}}: 
                            <form action="{{ route('user.seed.buy') }}">
                                <div class="dropdown">
                                    <select class="btn btn-primary dropdown-toggle"name="ship_addr" type="button" id="ship_addr" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        
                                        <br></br>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach($data['addresses'] as $addr)
                                            <a><option value="{{ $addr->getId() }}"> {{ $addr->getCity() }} - {{ $addr->getStreet() }} </option> </a>
                                        @endforeach

                                        
                                    </select>
                                    <br><br>
                                    {{ count($data['seeds']) }} {{__('text.products_in_car')}}: ${{ $data['total'] }}
                                    <br><br>
                                    <input class="btn btn-primary" type="submit" value="{{__('text.shopping.cart.buy')}}">
                                </div>
                            </form>

                            


                            <br /><br />
                            <a class="btn btn-danger" href="{{ route('user.seed.removeAll') }}">{{__('text.shopping.cart.remove')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection