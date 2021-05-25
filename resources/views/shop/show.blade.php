@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data['seed']->getName() }}</div>
                <div class="card-body">
                    <b>{{__('text.seed.brand')}}:</b> {{ $data['seed']->getBrand() }}<br />
                    <b>{{__('text.seed.weight')}}:</b> {{ $data['seed']->getweight() }}<br />
                    <b>{{__('text.seed.water')}}:</b> {{ $data['seed']->getWater() }}<br />
                    <b>{{__('text.seed.ground')}}:</b> {{ $data['seed']->getGround() }}<br />
                    <b>{{__('text.seed.drought')}}:</b> {{ $data['seed']->getDrought() }}<br />
                    <b>{{__('text.seed.germination')}}:</b> {{ $data['seed']->getGermination() }}<br />
                    <b>{{__('text.seed.type')}}:</b> {{ $data['seed']->getType() }}<br />
                    <b>{{__('text.seed.keywords')}}:</b> {{ $data['seed']->getKeywords() }}<br />
                    <b>{{__('text.seed.category')}}:</b> {{ $data['seed']->getCategory() }}<br />
                    <b>{{__('text.seed.price')}}:</b> {{ $data['seed']->getPrice() }}<br />
                    </ul>
                    
                    @auth
                        @if(Auth::user()->isAdmin())
                            <form method="post" action="{{ route('admin.seed.delete' , $data['seed']->getId()) }}">
                                @csrf
                                <input type="hidden" value="DELETE" />
                                <button type="submit" class ='btn btn-danger' >{{__('text.admin.delete')}}</button>
                            </form>
                        @else
                        <form method="post" action="{{ route('user.seed.add', ['id' => $data['seed']->getId()]) }}">
                            @csrf
                            <input type="number" name="amount" value="{{ old('amount') }}" placeholder="Amount" />
                            <button type="submit" action="{{ route('user.seed.add', ['id' => $data['seed']->getId()]) }}">{{__('text.cart.add')}}</button>
                        </form>
                            <h6>{{__('text.add.comment')}}</h6>  
                            <form method="POST" action="{{ route('user.review.save') }}">
                                @csrf
                                <input type="number" placeholder=0 min=0 max=5 step="1" name="score" value="{{ old('score') }}" />
                                <input type="text" placeholder={{__('text.comment.enter_content')}} name="content" value="{{ old('content') }}" />
                                <input type="hidden" name="seed" value="{{ $data['seed']->getId() }}" />
                                <input type="hidden" name="user" value="{{ Auth::user()->id }}" />
                                <input type="submit" value="Send" />
                            </form>
                        @endif
                    @else
                            {{__('text.show.login')}}
                            <a href="{{ route('login') }}">{{__('text.show.log')}}</a>
                            <a href="{{ route('register') }}">{{__('text.show.register')}}</a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @foreach($data["reviews"] as $review)
                <div class="card" >           
                    <div class="card-body">
                        <b>{{__('text.comment.score')}}: </b> {{ $review->getScore() }}<br />
                        <b>{{__('text.comment')}}: </b> {{ $review->getContent() }}<br />
                    </div>
                </div>
                <br/>
            @endforeach
        </div>
    </div>
</div>
@endsection