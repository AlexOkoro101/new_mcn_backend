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
								<section class="ticket wrapper style3 special container 75%">
									<h2>Support Ticket</h2>
									<span><b>Subject: </b>{{$support->subject}}</span>
									<div class="content">
										<span><b>By: </b>{{$support->user->name}}</span><br>
										<span><b>Email: </b>{{$support->user->email}}</span><br>
										<span><b>Message: </b>{!!$support->message!!}</span>
										<span><b>Date: </b>{{$support->created_at->toDayDateTimeString()}}</span><br>
										<span>
											<img src="{{asset('storage/support/'.$support->image)}}" alt=""><br>
										</span>
										@if ($replies)
											@foreach($replies as $reply)
												<blockquote>
													{{$reply->message}}<br>
													{{$reply->user->name}}
													<span>{{$reply->created_at->toDayDateTimeString()}}</span>
												</blockquote>
											@endforeach
										@endif
										<b>Status: </b><span>{{$support->status == 1 ? "open":"closed"}}</span>

										<p>Reply/Comments - by doing this, ticket would be reopened if closed</p>
										<form method="post" enctype="multipart/form-data" action="{{url('/account/support/reply')}}">
											{{csrf_field()}}
											<input type="hidden" name="support_id" value="{{$support->id}}">
											<div class="row 50%">
												<div class="12u">
													<textarea name="message" class="support-text" placeholder="Message" rows="3"></textarea>
												</div>
											</div>

											<div class="row">
												<div class="12u">
													<ul class="buttons">
													<li><button type="submit" class="special" />Reply</button></li>
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

