@extends('layouts.master')

@section('title')
	Account
@endsection

@section('content')
	<br><br>
	 <article id="main">
                    <section class="wrapper style3 container special program">
                    	@include('includes.wrapper-inner')
                                  <header class="major">
                                 </header>                            
		<hr>
		<div class="row 150%">
					
					<div id="highlights" class="container ">
						<div class="row 150%" style="text-align: left;">
						<br>
						@include('includes.user-account-menu')
							<div class="6u 12u(mobile) benefit" >
								<section class="highlight" style=";padding:3px;box-shadow:1px 1px 2px 1px  #aaa; background-color:#f5f5f5">
									<h4 style="color:#000 !important"> Saved &nbsp;&nbsp;Beneficiaries</h4>
						              <hr style="color:white; background-color:#ddd; height:1px; border:none;">
						              <ul>
						              	<li>John</li>
						              	<li>Kate</li>
						              </ul>
								</section>
							</div>
							

							
							
							
							
							
						</div>
					</div>
				</section>
				</article>	
		
	
@endsection

