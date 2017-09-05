@extends ('layouts.form')
@section('title','WEB DEVELOPMENT QUOTE')

@section('content')

@section('title')
	Web Solutions - Quote
@endsection

<section id="contact">
			<div class="section-content">
				<h1 class="section-header"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s">Request a Website Quote </span></h1>
				
			</div>
			<div class="contact-section">
			<div class="container">
			@if(session('message'))
                    {{session('message')}}
                @endif
				<form action="{{url('web/store')}}" method="POST">
				   {{csrf_field()}}
					<div class="col-md-6 col-xs-3 form-line">
			  			<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
			  				<label for="name">Your name</label>
					    	<input type="text" class="form-control" name="name" placeholder=" Enter Name" required>
					    	@if ($errors->has('name'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('name') }}</strong>  
                                </span>
                              @endif
				  		</div>
				  		<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
					    	<label for="email">Email Address</label>
					    	<input type="email" class="form-control" name="email" placeholder=" Enter Email id" required>
					    	@if ($errors->has('email'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('email') }}</strong>  
                                </span>
                              @endif
					  	</div>	
					  	
                        <div class="form-group {{ $errors->has('webspec') ? ' has-error' : '' }}">
					    	<label for="webspec"> Type of Website </label>
					    	<select class="form-control" name="webspec" required>
					    	    <option value="" disabled selected hidden>Please Choose...</option>
                                

					    	    <option value="corporate">Corporate Site</option>
					    		<option value="schoolportal">School Portal</option>
					    		<option value="blog">Blog</option>
					    		<option value="ecommerce">eCommerce</option>
					    		<option value="others">Others</option>
					    	</select>
					    	@if ($errors->has('webspec'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('webspec') }}</strong>  
                                </span>
                              @endif
					  	</div>	

			  		</div>
			  		<div class="col-md-6 col-xs-3">
			  			<div class="form-group  {{ $errors->has('description') ? ' has-error' : '' }}">
			  				<label for ="description"> Message</label>
			  			 	<textarea  class="form-control" name="description" placeholder="Enter Your Message" required></textarea>
			  			</div>
			  			<div>

			  				<input type='submit' value='Submit' class='btn btn-success pull-right'>
			  				@if ($errors->has('description'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('description') }}</strong>  
                                </span>
                              @endif
			  			</div>
			  			
					</div>
				</form>
			</div>
		</section>
@endsection
   
