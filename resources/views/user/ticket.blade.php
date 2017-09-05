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
									<h4>Tickets</h4>

									<!-- Content -->
									@if (Session::has('success'))
									<div class="alert alert-success">
										{{Session::get('success')}}
									</div>
									@endif

									@if (count($supports) !== 0)
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>ID</th>
													<th>Ticket</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($supports as $support)
												<tr>
													<td>{{$support->id}}</td>
													<td><a href="{{url('/account/ticket/'.auth()->user()->id."/".$support->id)}}">{{$support->subject}}</a></td>
													<td>{{$support->status==1 ? "open":"closed"}}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
									@else
									<div>You have not opened any tickets yet!</div>
									@endif
								</section>
							</div>						
						</div>
					</div>
				</div>
		</section>
	</article>	
@endsection

