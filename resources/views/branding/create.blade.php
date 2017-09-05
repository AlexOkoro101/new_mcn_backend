@extends ('layouts.master')

@section('title','BRANDING QUOTE')


@section('content')
<article id="main"> <br><br><br>

          <header class="special container">
            <span class="icon fa-envelope"></span>
            <h2>Send a Quote</h2>
            <p>We want to hear from you.</p>
          </header>

          <!-- One -->
            <section class="wrapper style4 special container 75%" style="background:#C9CDD0">
             
              <!-- Content -->
                <div class="content">
                @if(session('message'))
                    {{session('message')}}
                @endif
                  <form action="{{url('branding/store')}}" method="POST" onsubmit="return validateMyForm();">
				   {{csrf_field()}}
                    <div class="row 50%">
                      <div class="6u 12u(mobile) {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" name="name" placeholder="Name" style="background-color: white"  />
                        @if ($errors->has('name'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('name') }}</strong>  
                                </span>
                              @endif
                      </div>
                      <div class="6u 12u(mobile) {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" name="email" placeholder="Email"  style="background-color: white" />
                        @if ($errors->has('email'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('email') }}</strong>  
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
                      <div class="12u">
                        <input type="text" name="subject" placeholder="Subject"  style="background-color: white" />
                      </div>
                    </div>
                     <div class="row 50%">
                      <div class=" 12u {{ $errors->has('webspec') ? ' has-error' : '' }}">
                     
                       <select class="form-control" name="webspec"  style="background-color: white" required>
                                <option value="" disabled selected hidden>Please Choose...</option>
                    <option value="pos">POS Display</option>
                  <option value="interior">Interior & Exterior Branding</option>
                  <option value="wallsigns">Wall Signs & Fabrication</option>
                  <option value="branddev">Brand Development</option>
                  <option value="others">Others</option>
                </select>
                @if ($errors->has('webspec'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('webspec') }}</strong>  
                                </span>
                              @endif
                      </div>
                    </div>
                    <div class="row 50%">
                      <div class="12u {{ $errors->has('description') ? ' has-error' : '' }}">
                        <textarea name="description" placeholder="Message" rows="7" style="background-color: white" ></textarea>
                        @if ($errors->has('description'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('description') }}</strong>  
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

            </section>

        </article>
		
@endsection
   
