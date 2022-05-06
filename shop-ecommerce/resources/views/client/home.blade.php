@extends('client.main')

    <!-- Slider -->
@include('client.slider')
	<!-- Banner -->
@include('client.banner')

@section('content')

<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Product Overview
            </h3>
        </div>

      
        <div class="row isotope-grid">
            
            {!! \App\Helpers\Helper::renderProductNewArrival($new_arrival_products)!!}

           

            

        <!-- Load more -->
       
    </div>
</section>
@endsection