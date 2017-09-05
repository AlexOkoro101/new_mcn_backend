@extends('layouts.master')

@section('title')
Contact Us
@endsection

@section('content')
  <article id="main" > <br><br><br>

          <header class="special container">
            <span class="icon fa-envelope"></span>
            <h2>Get In Touch</h2>
            <p>We want to hear from you...</p>
          </header>

          <!-- One -->
          <section class="wrapper style4 special container 100%" style="background: none;padding:1px;margin:-12px">
          <ol class="arrows center" >
   <li><a href="{{url('/')}}">Home</a></li>
   <li><a href="{{url('/contact')}}" style="color: blue">Contact Us Page</a></li>
</ol>

          </section>
            <section class="wrapper style4 special container 75%" style="background: #DDDCDC">

              <!-- Content -->
                <div class="content">
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                    </div>
                @endif
                  <form action="{{url('contacts/store')}}" method="POST" onsubmit="return validateMyForm();">
           {{csrf_field()}}
                    <div class="row 50%">
                      <div class="6u 12u(mobile) {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" name="name" placeholder="Name" style="background-color: white" />
                         @if ($errors->has('name'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('name') }}</strong>  
                                </span>
                              @endif
                      </div>
                      <div class="6u 12u(mobile) {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" name="email" placeholder="Email" style="background-color: white"  />
                         @if ($errors->has('email'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('email') }}</strong>  
                                </span>
                              @endif
                      </div>
                    </div>
                     <!-- honeypot field start-->
                     <div class="row 50%" style="display: none">
                       <label>Keep this field blank</label>
                         <input type="text" name="honeypot" id="honeypot" />
                     </div>
                      <!-- honeypot field end -->
                    <div class="row 50%">
                      <div class="12u {{ $errors->has('description') ? ' has-error' : '' }}">
                        <textarea name="description" placeholder="Message" rows="7" style="background-color: white" ></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="12u">
                        <ul class="buttons">
                          <li><input type="submit" class="special" value="Send Message" /></li>
                        </ul>
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

        </article>

@endsection