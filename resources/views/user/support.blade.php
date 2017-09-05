@extends('layouts.master')

@section('title')
Account
@endsection

@section('content')
	<br><br><br><br>
	<article id="main">
		<section class="wrapper style3 container special">
				@include('includes.wrapper-inner')                         
				<hr>
				<div class="row 150%">
					<div id="highlights" class="container information">
						<div class="row 150%" style="text-align: left;">
							<br>
							@include('includes.user-account-menu')
							<div class="4u 12u(mobile) Personalsection" >
								<!-- One -->
								<section class="wrapper style4 special container 75%">
									<h2>Contact Support</h2>

									<!-- Content -->
									@if (Session::has('success'))
									<div class="alert alert-success">
										{{Session::get('success')}}
									</div>
									@endif
									@if (Session::has('failure'))
									<div class="alert alert-danger">
										{{Session::get('failure')}}
									</div>
									@endif
									<div class="content">
										<form method="post" enctype="multipart/form-data" action="{{url('/account/support')}}">
											{{csrf_field()}}
											<div class="row 50%">
												<div class="6u 12u(mobile)">
													<input type="text" name="name" placeholder="Name" />
													@if ($errors->has('name'))
														<span class="help-block">
														<strong>{{ $errors->first('name') }}</strong>
														</span>
													@endif
												</div>

												<div class="6u 12u(mobile)">
													<input type="text" name="email" placeholder="Email" />
													@if ($errors->has('email'))
														<span class="help-block">
														<strong>{{ $errors->first('email') }}</strong>
														</span>
													@endif
												</div>
											</div>

											<div class="row 50%">
												<div class="12u">
													<input type="text" name="subject" placeholder="Subject" />
													@if ($errors->has('subject'))
														<span class="help-block">
														<strong>{{ $errors->first('subject') }}</strong>
														</span>
													@endif
												</div>
											</div>

											<div class="row 50%">
												<div class="12u">
													<textarea name="message" class="support-text" placeholder="Message" rows="7"></textarea>
													<span class="help-block">
													@if ($errors->has('message'))
														<strong>{{$errors->first('message')}}</strong>
													@endif
													</span>
												</div>
											</div>

											<div class="row 50%">
												<div class="12u">
													<span>Attach screenshot or image of problem (optional)</span><input type="file" name="image">
													@if ($errors->has('image'))
														<span class="help-block">
														<strong>{{ $errors->first('image') }}</strong>
														</span>
													@endif
												</div>
											</div>

											<div class="row">
												<div class="12u">
													<ul class="buttons">
													<li><button type="submit" class="special" />Submit</button></li>
													<li><a href="{{url("/account/support")}}" class="special" value="Cancel" />Cancel</a></li>
													</ul>
												</div>
											</div>

										</form>
									</div>
								</section>
							</div>						
						</div>
					</div>
				</div>
		</section>
	</article>	
@endsection

