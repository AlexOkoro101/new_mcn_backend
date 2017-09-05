@extends('layouts.master')

@section('title')
	Account
@endsection

@section('content')
	<br><br><br>
	 <article id="main">
                    <section class="wrapper style3 container special">
                    	@include('includes.wrapper-inner')
                                                             
		<div class="row 150%" style="margin:-50px">
					
					<div id="highlights" class="container account" >
						<div class="row 150%" style="text-align: left;">
						<br>
						@include('includes.user-account-menu')

							<div class="4u 12u(mobile)) beneficiary_info">
								<section class="highlight" style="padding:3px;box-shadow:1px 1px 2px 1px #aaa;background-color: #f5f5f5;">
									<h4 style="color: #555 !important; margin-bottom: 5px;">Saved Beneficiaries</h4>
						              <hr style="color:white; background-color:#ddd; height:1px; border:none;">
						              <ul>
						               @foreach($beneficiaries as $k)
						               <li>
						              <span style="color:white"><a href="{{url('/beneficiaries/'.$k->id)}}">{{$k->name}}</a> </span>
                                      <span class="pull-right" style="color:black">{{$k->created_at->diffForHumans()}} <a href="{{url('/beneficiaries/'.$k->id.'/edit')}}">EDIT</a></span>
                                      </li>
						              @endforeach
						              </ul>
						             
						 		</section>
							</div>
							<div class="4u 12u(mobile)) preference_info" >
								<section class="highlight" style="padding:3px;margin-right: -22px;box-shadow:1px 1px 2px 1px  #aaa;background-color: #f5f5f5;">
									<h4 style="color:#555 !important; margin-bottom: 5px;">Preferences</h4>
						               <hr style="color:white; background-color:#ddd; height:1px; border:none;">
						           <div class="form-group">
							         <input type="checkbox" id="weekly-mails" value="">
							         <label for="weekly-mails" style="color:#000; font-size: 14px;">Promotional Mails</label>
						             </div>
					             	<div class="form-group">
						        	<input type="checkbox" id="promotional-mails" value="">
							        <label for="promotional-mails" style="color: #000; font-size: 14px;">Weekly Mails</label>
					             	</div>
								</section>
							</div>
						</div>
					</div>
				</section>
				</article>	

			
	
@endsection

