@extends('layouts.master')

@section('title')
	Mighty Solutions - Data, Web, Branding
@endsection

 @section('content')
 <br><br>
                <img src="{{asset('img/mightypix.png')}}" alt="" width="100%">

            <!-- Main -->
                <article id="main">
                                         <section class="wrapper style4 special container 100%" style="background: none;padding:1px;margin:-12px">
          <ol class="arrows center" >
   <li><a href="{{url('/')}}">Home</a></li>
   <li><a href="{{url('/data')}}" style="color: #4169E1">Data Homepage</a></li>
</ol>

          </section>
                                        <section class="wrapper style3 container special">
                               
                            <header class="major">
                                <h2>Data&nbsp;<strong>Networks</strong></h2>
                            </header>
                            <div class="row" id="data-intro">
                                <h4 style="text-transform: inherit">We have the <strong>BEST</strong> prices in town and we are proud of it. From Megabytes to Terabytes, we have you covered. <br>Click on your preferred network below to get started</h4>
                            </div>
                            <div class="row">
                                <div class="6u 12u(narrower)">

                                    <section class="image_container">
                                        <a href="{{url('/data/mtn')}}" class="image featured"><img src="{{asset('img/mtn0.png')}}" alt="" /></a>
                                    </section>

                                </div>
                                <div class="6u 12u(narrower)">
                                    <section class="image_container">
                                        <a href="{{url('/data/airtel')}}" class="image featured"><img src="{{asset('img/airtel0.png')}}" alt="" /></a>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="6u 12u(narrower)">

                                    <section class="image_container">
                                        <a href="{{url('/data/glo')}}" class="image featured"><img src="{{asset('img/glo0.jpg')}}" alt="" /></a>
                                    </section>
                                </div>
                                <div class="6u 12u(narrower)">
                                    <section class="image_container">
                                        <a href="{{url('/data/etisalat')}}" class="image featured"><img src="{{asset('img/etisalat0.png')}}" alt="" /></a>
                                    </section>
                                </div>
                            </div>
                            
                        </section>


                    <!-- Two -->
                        
                </article>

            <!-- Footer -->
                
        </div>

 @endsection

        <!-- Service Tabs -->

       

