@extends('layouts.master')

@section('title')
	Account
@endsection

@section('content')
	<br><br><br><br>
	 <article id="main">
                    <section class="wrapper style3 container special">
                        @include('includes.wrapper-inner')
                                  <header class="major">
                                 </header>                            
		<hr>
		<div class="row 150%">
					
					<div id="highlights" class="container information">
						<div class="row 150%" style="text-align: left;">
						<br>
						@include('includes.user-account-menu')
							<div class="4u 12u(mobile) Personalsection" >
								<section class="highlight" style=" ; padding:30px;box-shadow:1px 1px 2px 1px  #aaa; background-color:#f5f5f5">
									<h5 style="color:#555 !important;">Personal Information</h5>
						              <hr style="color:#113A7E; background-color:#ddd; height:1px; border:none;">
						              <form action="{{url('/account/update')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name" style="color:#999 !important">Name</label>
                    <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}" style="color:#000 !important">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div><br>
                  <div class="form-group">
                  <label for="phone" style="color:#999 !important">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{auth()->user()->phone}}" style="color:#000 !important">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                  </div><br>
                  <!--<div class="form-group">
                  <label for="beneficiaries" style="color:white !important">Beneficiaries</label>
                    <input type="text" name="beneficiaries" class="form-control" value="{{auth()->user()->beneficiaries}}" style="color:white !important">
                    @if ($errors->has('beneficiaries'))
                        <span class="help-block">
                            <strong>{{ $errors->first('beneficiaries') }}</strong>
                        </span>
                    @endif
                  </div><br>-->
                  <div class="form-group">
                  <label for="email" style="color:#999 !important">Email</label>
                    <input type="text" name="email" class="form-control" value="{{auth()->user()->email}}" style="color:#000 !important">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div><br>
                  <div class="form-group">
                    &nbsp;&nbsp;<label for="image" style="color:#999 !important">Upload a Picture</label>
                    <input type="file" name="image" style="color:#999 !important">
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                  </div>
                  <br>
                  <button class="button special small" type="submit" >Update</button>
                </form>
								</section>
							</div>
							

							
							
							
							
							
						</div>
					</div>
				</section>
				</article>	
		
	
@endsection

