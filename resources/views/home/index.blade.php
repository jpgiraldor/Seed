@extends('layouts.app')

@section('content')
<!-- Portfolio Section-->

<!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/custom-styles.css') }}" rel="stylesheet" />

        <header class="masthead bg-primary text-white text-center">
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">{{__('text.admin.seed.create.create')}}</p>
            </div>
        </header>
@foreach($data["seeds"] as $seed)
            <div class="card" >           
                
                <div class="card-header">{{ $seed->getName() }}</div>
                <div class="card-body">
                    <b>{{__('text.seed.brand')}}:</b> {{ $seed->getBrand() }}<br />
                    <b>{{__('text.seed.weight')}}:</b> {{ $seed->getweight() }}<br />
                    <b>{{__('text.seed.water')}}:</b> {{ $seed->getWater() }}<br />
                    <b>{{__('text.seed.ground')}}:</b> {{ $seed->getGround() }}<br />
                    <b>{{__('text.seed.drought')}}:</b> {{ $seed->getDrought() }}<br />
                    <b>{{__('text.seed.germination')}}:</b> {{ $seed->getGermination() }}<br />
                    <b>{{__('text.seed.type')}}:</b> {{ $seed->getType() }}<br />
                    <b>{{__('text.seed.keywords')}}:</b> {{ $seed->getKeywords() }}<br />
                    <b>{{__('text.seed.category')}}:</b> {{ $seed->getCategory() }}<br />
                    <b>{{__('text.seed.price')}}:</b> {{ $seed->getPrice() }}<br />


                    <a href="{{ route('shop.show',$seed->getId()) }}" type = "button" class="btn btn-primary">{{__('text.admin.seed.list.show')}}</a>

                </div>
            </div>

            <br />
            @endforeach
<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">{{__('text.about')}}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ml-auto"><p class="lead">{{__('text.freelancer')}}</p></div>
            <div class="col-lg-4 mr-auto"><p class="lead">{{__('text.freelancer2')}}</p></div>
        </div>
        <!-- About Section Button-->

    </div>
</section>

@endsection
