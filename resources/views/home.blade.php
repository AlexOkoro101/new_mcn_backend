@extends('layouts.master')

@section('title')
    Mighty Solutions - Data, Web, Branding
@endsection

@section('content')
    <!-- Banner -->
    <section id="banner">

        <!--
            ".inner" is set up as an inline-block so it automatically expands
            in both directions to fit whatever's inside it. This means it won't
            automatically wrap lines, so be sure to use line breaks where
            appropriate (<br />).
        -->
        <div class="inner">
            
            <p>This is <strong>MIGHTY INTERACTIVE</strong>, where we
            <br />
            work.play.grow
            <br />
            </p>
            <footer>
                <ul class="buttons vertical">
                    <li id="home_link"><a href="{{url('/about-us')}}" class="button fit scrolly">Tell Me More&nbsp;<i class="fa fa-check-circle"></i></a></li>
                </ul>
            </footer>

        </div>

    </section>
    <!-- Main -->
        <article id="main">
            <section class="content dark style1 featured"  style="margin-top: -88px !important;">
            <div class="row"></div>
                <div id="d-testimonial" class="12u(narrower)">
                <header>
                                <h2>Our<strong> Customers</strong>  Love Us</h2>
                            </header>
                <div class="row">
                    <div  class="8u 12u(narrower)" style="text-align: right;">
                            
                            <section class="special testimonial">
                                @foreach($testimonies as $k)
                                 @if ($k->approval == NULL)
                                <div>
                                @if ($k->webspec == 3)
                                  <p class="testimonial-body"> <i class="icon fa-quote-left"></i> {{$k->message}} &nbsp;<i class="icon fa-quote-right"></i></p>
                                  <span>&mdash; <strong>{{$k->name}}</strong>, {{$k->subject}} <span class="data-badge">DATA</span>
                                   

                                </span>
                                @elseif ($k->webspec == 2)
                                <p class="testimonial-body"> <i class="icon fa-quote-left"></i> {{$k->message}} &nbsp;<i class="icon fa-quote-right"></i></p>
                                  <span>&mdash; <strong>{{$k->name}}</strong>, {{$k->subject}} <span class="web-badge">WEB</span>
                                  </span> 
                                @elseif ($k->webspec == 1)
                                <p class="testimonial-body"> <i class="icon fa-quote-left"></i> {{$k->message}} &nbsp;<i class="icon fa-quote-right"></i></p>
                                <span>&mdash; <strong>{{$k->name}}</strong>, {{$k->subject}} <span class="brand-badge">BRAND</span>
                                </span>
                                @endif
                                </div>
                                @endif
                                @endforeach
                            </section>
                        
                                
                    </div>
                    <div  class="4u 12u(narrower)">
                    <a href="{{url('/testimonial')}}" class="button earth">More Testimonies &nbsp;<i class="fa fa-chevron-right"></i></a><br><br><br>
                    </div>
                </div>
                </div>
               
            </section>
            

            <!-- Two -->
                
            <!-- One -->
                
        </article>
        <section id="d-services" class="wrapper style1 container special">
        <div class="row"></div>
                    <div class="row" id="datapix">
                         <div class="6u 12u(narrower)">
                             <a href="{{url('/data')}}">
                            <section style="padding-left: 30px;">
                            <br><br>
                                <header>
                                    <h2 style="color:black !important"><strong>DATA</strong> SERVICES</h2>
                                </header>
                                <p>We sell all types of network data.We have the best prizes for all major networks(MTN,Airtel,Etisalat and Globacom).</p>
                               <a href="{{url('/data')}}" class="button primary">&nbsp;View Data Bundles&nbsp;&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </section>
                              </a>
                        </div>
                        
                        <div class="6u 12u(narrower)" id="datapic">
                                <img src="{{asset('img/home_data.jpg')}}" alt="dataservices"  width="100%">
                        </div>
                       
                    </div>
                    
                    
                </section>
                
    <!-- CTA -->
        <section id="cta">

            <section id="services" style="margin-left: 36px !important;">
                <div class="12u">
                    <div class="row">
                    
                        <div id="s_inner" class="3u 12u(narrower)">
                          <a href="{{url('/deals')}}" style="color: inherit">
                              <p><span class="fa fa-dashboard"></span></p>
                              <p>Daily deals <br> Bethe first to know</p>
                          </a>
                        </div>
                        <div id="s_inner" class="3u 12u(narrower)">
                           <a href="{{url('/deals')}}" style="color: inherit">
                               <p><span class="fa fa-hand-o-left"></span></p>
                               <p>Reseller deals <br> Partner with us</p>
                           </a>
                        </div>
                        <div id="s_inner" class="3u 12u(narrower)">
                        <a href="{{url('/deals')}}" style="color: inherit">
                            <p><span class="fa fa-money"></span></p>
                            <p>Save-up program <br> Pay in bits</p>
                        </a>
                        </div>
                        <div id="s_inner" class="3u 12u(narrower)">
                         <a href="{{url('/deals')}}" style="color: inherit !important">
                             <p><span class="fa fa-suitcase"></span></p>
                             <p>Corporate Sales <br> Back to Back sales</p>
                         </a>
                        </div>
                        
                    </div>
                </div>
            </section>
            <header>
                <h2>Ready to do <strong>Business with us</strong>?</h2>
                <p>We'll give you good deals you can't resist.</p>
                <a href="{{url('/contact')}}" class="button special center">Contact Us Now&nbsp;<i class="fa fa-chevron-right"></i></a>
            </header>

           

        </section>
        <img src="{{asset('img/map.jpg')}}" alt="" width="100%" id="imgupdbate">
        <div class="row"></div>
@endsection

