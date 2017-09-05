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
							<div class="4u 12u(mobile) auth" >
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('failure'))
                    <div class="alert alert-danger">{{ Session::get('failure') }}</div>
                @endif
								<section id="auth" class="highlight" style="padding:12px;box-shadow:1px 1px 2px 1px  #aaa;background-color: #f5f5f5">
									<h6 style="color:#000" id="authentication">Information Authentication</h6>
						              <hr style="color:white; background-color:#ddd; height:1px; border:none;">
						              <form action="{{url('/account/pass')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }}">
                    <input type="password" name="old_password" class="form-control" placeholder="Enter old password" style="color:#000">
                    @if ($errors->has('old_password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('old_password') }}</strong>
                        </span>
                    @endif
                  </div><br>
                  <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Enter new password" style="color:#000">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div><br>
                  <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password" style="color:#000">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                  </div><br>
                  <button class="button special small" type="submit" >Update</button>
                </form>
								</section>
							</div>
						</div>
					</div>
				</section>
				</article>	
		
	
@endsection

