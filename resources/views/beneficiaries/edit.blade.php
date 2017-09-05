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
                 @if(session('message'))
                 <div class="alert alert-success">
                    {{session('message')}}
                 </div>
                @endif
                  <form action="{{url('beneficiaries/store/'.$k->id)}}" method="POST" onsubmit="return validateMyForm();">
           {{csrf_field()}}
                    <div class="row 50%">
                      <div class="6u 12u(mobile) {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" name="name" placeholder="Name" style="background-color: white"  value="{{$k->name}}"/>
                        @if ($errors->has('name'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('name') }}</strong>  
                                </span>
                              @endif
                      </div>
                      <div class="6u 12u(mobile) {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" name="phone" placeholder="Type your Phone"  style="background-color: white" value="{{$k->phone}}"/>
                        @if ($errors->has('phone'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('phone') }}</strong>  
                                </span>
                              @endif
                      </div>
                    </div>
                    <!-- honeypot field start-->
                      <div style="display:none;">
                       <label>Keep this field blank</label>
                          <input type="text" name="honeypot" id="honeypot" />
                         </div>
                      <!-- honeypot field end -->
                     <div class="row 50%">
                      <div class=" 12u {{ $errors->has('network') ? ' has-error' : '' }}">
                     
                       <select class="form-control" name="network"  style="background-color: white" required>
                                <option value="" disabled selected hidden>{{$k->network}}</option>
                    <option value="Etisalat">Etisalat</option>
                  <option value="MTN">MTN</option>
                  <option value="Glo">Glo</option>
                  <option value="Airtel">Airtel</option>
                </select>
                @if ($errors->has('network'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('network') }}</strong>  
                                </span>
                              @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="12u">
                        <ul class="buttons">
                          <li><input type="submit" class="success" value="Send Message" /></li>
                        </ul>
                      </div>
                    </div>
                  </form>
                </div>
							
							</div>
						</div>
					</div>
				</section>
				</article>	
		
	
@endsection

