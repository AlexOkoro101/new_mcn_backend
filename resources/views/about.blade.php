@extends('layouts.master')

@section('title')
About Us
@endsection

@section('content')
	
<article id="main"><br><br><br>

          <!--<header class="special container">
            <span class="icon fa-envelope"></span>
            <!--<h2><strong>About Us</h2>-->
          <!--</header>-->
          <section class="wrapper style4 special container 100%" style="background: none;padding:1px;margin:-12px">
          <ol class="arrows center" >
   <li><a href="{{url('/')}}">Home</a></li>
   <li><a href="{{url('/about-us')}}" style="color: blue">About Us</a></li>
</ol>

          </section>
            <section class="wrapper style4 special container 100%">
            <img src="{{asset('img/about-us-page.jpg')}}">
            <br><br><br>
                <p>At Mighty ICT Solutions, we are a team of young IT professionals who have come together to bring you the best affordable data plans to make your life easier.</p>

           <p>With expertise ranging from web technologies to telecom and a wide array of ICT solutions, you can be sure that you are in safe hands.</p>

           <p>We have a strong presence in Lagos and Ogun states with representatives all over Nigeria.</p>

             <p>We are always happy to hear from you, so kindly <a href="{{url('/contact')}}"><strong>contact us</strong></a> if you have any questions or enquiries.</p>

            </section>

        </article>
@endsection