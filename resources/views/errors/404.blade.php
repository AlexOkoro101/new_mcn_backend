@extends('layouts.master')

@section('title')
	Page Not Found
@endsection

@section('content')
<article id="main">
        <br><br><br>
                    <section class="wrapper style3 container special">
	<br><br>
	
	<div class="12u 12u(mobile)">
	                <span style="font-size: 200px;font-weight:bold">&#x2639;</span><br><br><br>
	      <span style="font-size: 160px;font-weight: bold;color:#2861C0">4</span><span style="font-size: 160px;font-weight: bold;color:grey">0</span> <span style="font-size: 160px;font-weight: bold;color:#2861C0">4</span>
	      <h1>PAGE NOT FOUND</h1><br>
			<p class="lead">Sorry we couldn't provide that page, check these links below.</p><br>
          <a class="button special" href="{{url('/buyDataStart')}}">Mighty Data Deals</a>
          <a class="button special" href="{{url('/web')}}">Mighty Web Solutions</a>
          <a href="{{url('/branding')}}" class="button special">Mighty Branding Services</a>
        </div>
	 </section>
          <!-- Two -->   
        </article>
@endsection