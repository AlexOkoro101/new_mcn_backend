@extends('layouts.master')

@section('title')
	Account
@endsection

@section('content')
	<br><br><br><br>
	 <article id="main">
                    <section class="wrapper style3 container special program">
                    	@include('includes.wrapper-inner')
                                  <header class="major">
                                 </header>                            
		<hr>
		<div class="row 150%">
					
					<div id="highlights" class="container">
						<div class="row 150%" style="text-align: left;">
						<br>
						@include('includes.user-account-menu')
							<div class="6u 12u(mobile) news" >
								<section class="highlight newsletter" style="padding:3px;box-shadow:1px 1px 2px 1px  #aaa;background-color: #f5f5f5">
									<h4 style="color:#000 !important"> Newsletter &nbsp;&nbsp;Preferences</h4>
						              <hr style="color:white; background-color:#ddd; height:1px; border:none;">
						              <div class="form-group">
						              	<input type="checkbox" id="weekly-mails" value="">
							              <label for="weekly-mails" style="color:#000">Promotional Mails</label>
							          </div>
							            <div class="form-group">
							              <input type="checkbox" id="promotional-mails" value="">
							              <label for="promotional-mails"  style="color:#000">Weekly Mails</label>
							            </div>
								</section>
							</div>
							

							
							
							
							
							
						</div>
					</div>
				</section>
				</article>	
		
	
@endsection

