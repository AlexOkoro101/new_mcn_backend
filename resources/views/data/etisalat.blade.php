@extends('layouts.master')

@section('title')
	Etisalat Data
@endsection

@section('content')
  @include('includes.cart-success')
<br><br><header class="special container" style="margin-bottom: -90px !important">
            <span class="icon fa-phone"></span>
            </header>

    <!-- Page Content -->
        <article id="main">
<section class="data-top-header wrapper style3 special container 100%" style="background: none;padding:1px;">
@include('includes.data-menu')
          <ol class="data-breadcrumbs arrows center" >
   <li><a href="{{url('/')}}">Home</a></li>
   <li><a href="{{url('/data')}}">Data</a></li>
   <li><a href="{{url('/data/etisalat')}}" style="color:#4169E1">Etisalat</a></li>
   
   
</ol>

          </section>
                    <section class="wrapper style3 container special 150%">
    <div class="row">
    <br>
    <div class="3u 12u(narrower) 12u(mobile)">
            <img src="{{asset('img/etisalat2.png')}}" width="200px" class="data-header-img">
   </div>
   <div class="9u 12u(narrower) data-intro">
   
      <h1>Get more done, with Etisalat Easyblaze! Take advantage of Etisalat Nigeria's fast and stable broadband service to enjoy a richer online experience at the best prices ever! </h1>
     </div>
    </div>
      <header class="major">
      <h2><strong>Etisalat&nbsp;</strong>Data&nbsp;<strong>Options</strong></h2>
      </header>
              <div class="row">
                      @foreach($dataPlans as $dataPlan)
                        <div class="4u 12u(narrower)" id="databox">

                        <section>
                            <header>
                              <h3><p>{{$dataPlan->quantity}} </p></h3>
                              
                              <hr style="color:#919090; background-color:#f5f5fa; height:1px; border:none;">
                            </header>
                            <form class="phone-form phone-form{{$dataPlan->id}}">
                              {{csrf_field()}}
                                <h1 style="font-size: 35px"><sup> &#8358</sup>{{$dataPlan->price}} <sub id="subscript">/MO</sub></h1>
                                <input type="hidden" name="dataId" value="{{$dataPlan->id}}">
                        
                                <footer class="major">
                                    <div class="load-phone load-phone{{$dataPlan->id}}">
                                      <input type="text" name="phone{{$dataPlan->id}}" placeholder="Enter Phone Number to load data">
                                    </div>
                                    @if ($errors->has('phone'.$dataPlan->id))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone'.$dataPlan->id) }}</strong>
                                        </span>
                                    @endif
                                   <ul class="buttons">
                                      <li>
                                        <button class="button special spb{{$dataPlan->id}}" type="button"><i class="fa fa-shopping-cart fa-rotate-360"></i> &nbsp;Add to Cart</button>
                                        <button class="button special add-data-phone adp{{$dataPlan->id}}" type="submit"> &nbsp;BUY NOW</button>
                                      </li>
                                   </ul>
                                   
                                   </footer>
                                   </form>

                              </div>
                            @endforeach
                            </div>
                            <br><br><br>
                            </section>
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
                            <section class="wrapper style4 container special 150%">

              
              <h2>Frequently Asked Questions (FAQs)</h2>


<br>
<div id="ss_menu" style="text-align: left !important">
    <div class="ss_button">HOW DO I PAY FOR MY DATA BUNDLE?</div>
    <div class="ss_content">You can pay by airtime, bank deposit or online payment on this website. Click the Buy Now button for more info.</div>
    <br>
    <div class="ss_button">WILL I BE ABLE TO CHECK MY DATA BALANCE?</div>
    <div class="ss_content">Yes. Please dial *229*9# to check your Etisalat data bundle balance.</div><br>
    <div class="ss_button">CAN I SHARE MY DATA WITH MY FRIENDS?</div>
    <div class="ss_content">Unfortunately, you cannot share your Etisalat data bundles with friends at this time. Please note that this restriction is from the network.</div><br>
    <div class="ss_button">WILL THIS DATA PLAN WORK WITH MY DEVICE?</div>
    <div class="ss_content">Our Etisalat Data Plans work perfectly with all internet enabled devices. But please note that functionality may be restricted on older Blackberry devices.</div><br>
    <div class="ss_button">HOW LONG DOES THE DATA LAST?</div>
    <div class="ss_content">All our Etisalat Data Bundles are valid for 30 days, but depending on your usage, it may be exhausted before that time.</div><br>
    <div class="ss_button">CAN MY DATA BUNDLE BE ROLLED-OVER OR TOPPED-UP?</div>
    <div class="ss_content">No. You can not top up your Etisalat data bundles at this time.</div><br>
    <div class="ss_button">HOW LONG WILL IT TAKE TO GET THE DATA?</div>
    <div class="ss_content">We send out data bundles instantly as soon as we confirm payment.</div><br>
    <div class="ss_button">HOW CAN I WORK WITH YOU AND RESELL YOUR DATA TO MY CUSTOMERS?</div>
    <div class="ss_content">Please contact us on 07033044456 or 09097619649 for more info.</div><br>
    <div class="ss_button">WHY SHOULD I TRUST YOU (MIGHTY DATA)?</div>
    <div class="ss_content">We are a fully fuctional business, registered with the Corporate Affairs Commission (CAC). We use only our corporate accounts for collection of payment. Also, we have many customers who have been enjoying our services for quite a while.</div><br>
</div>


              
            </section>


         
            
        </article>

      
        
    

    
     

@endsection