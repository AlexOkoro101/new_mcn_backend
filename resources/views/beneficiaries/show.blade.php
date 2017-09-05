@extends('layouts.master')

@section('title')
	Account
@endsection

@section('content')
	<br><br><br><br>
	 <article id="main">
                    <section class="wrapper style3 container special">
                                  <header class="major">
                                    <h2>Account Control Panel <small>Beneficiaries</small></h2>
                                 </header>                            
		<hr>
		<div class="row 150%">
					
					<div id="highlights" class="container">
						<div class="row 150%" style="text-align: left;">
						<br>
						@include('includes.user-account-menu')
            <div class="content">
                <h1>{{$item->name}}</h1>
                <h1>{{$item->phone}}</h1>
                <h1>{{$item->network}}</h1>
							</div>
						</div>
					</div>
				</section>
				</article>	
		
	
@endsection

