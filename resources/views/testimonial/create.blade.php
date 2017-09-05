@extends ('layouts.master')
@section('title','TESTIMONY')
@section('content')
<article id="main"><br>

          <header class="special container">
            <span class="icon fa-envelope"></span>
            <h2>Share your testimonies.</h2><br>
            <a href="#testify" class="button special small">Let's Hear From You <i class="fa fa-angle-double-down"></i></a>
          </header>

          <section class="wrapper style4 special container 100%" style="background: none;padding:1px;margin:-12px">
          <ol class="arrows center" >
   <li><a href="{{('/')}}">Home</a></li>
   <li><a href="{{('/testimonial')}}" style="color:#2861C0">Testimonies</a></li>
   </ol>

          </section>
          <section class="wrapper style4 special container 100%" >
          @if(session('message'))
                 <div class="alert alert-success">
                    {{session('message')}}
                 </div>
                @endif
            @foreach($testimonies as $k)
            @if ($k->approval == null)
            @if ($k->webspec == 3)
              <blockquote>
                <i class="icon fa-quote-left"></i> &nbsp;&nbsp; <span style="font-size: 25px">{{$k->message}}</span><br>
                <span class="client_name"><span class="dash">-</span>{{$k->name}}</span><br>
                <span>{{$k->subject}}</span><br>
                <span class="data-badge" style="color:white !important">DATA</span>&nbsp;&nbsp;<i class="icon fa-quote-right"></i>
              </blockquote>
            @elseif ($k->webspec == 2)
            <blockquote>
                <i class="icon fa-quote-left"></i> &nbsp;&nbsp; <span style="font-size: 25px">{{$k->message}}</span><br>
                <span class="client_name"><span class="dash">-</span>{{$k->name}}</span><br>
                <span>{{$k->subject}}</span><br>
                <span class="web-badge" style="color:white !important">WEB</span>&nbsp;&nbsp;<i class="icon fa-quote-right"></i>
              </blockquote>
            @elseif ($k->webspec ==1)
            <blockquote>
                <i class="icon fa-quote-left"></i> &nbsp;&nbsp; <span style="font-size: 25px">{{$k->message}}</span><br>
                <span class="client_name"><span class="dash">-</span>{{$k->name}}</span><br>
                <span>{{$k->subject}}</span><br>
                <span class="brand-badge" style="color:white !important">BRAND</span>&nbsp;&nbsp;<i class="icon fa-quote-right"></i>
              </blockquote>
            @endif
            @endif
            @endforeach
           
              {{$testimonies->links()}}
            
             
          </section>

          <!-- One --> <div id="testify"></div>
            <section class="wrapper style4 special container 100%" style="background:#C9CDD0">
              <!-- Content -->
          <div class="content">
                 @if(session('message'))
                 <div class="alert alert-success">
                    {{session('message')}}
                 </div>
                @endif
               
                  <form action="{{url('/testimonial/store')}}" method="post" onsubmit="return validateMyForm();">
                    {{csrf_field()}}
                       <h2 style="text-transform:capitalize !important;"> Let's hear from you.</h2>
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
                        <input type="text" name="email" placeholder="Email" style="background-color: white" />
                        @if ($errors->has('email'))
                           <span class="help-block">
                               <strong>{{ $errors->first('email') }}</strong>
                           </span>
                         @endif
                      </div>
                    </div>
                    <div class="row 50%">
                      <div class="12u">
                        <input type="text" name="location" placeholder="Your Location" style="background-color: white" />
                        @if ($errors->has('subject'))
                           <span class="help-block">
                               <strong>{{ $errors->first('subject') }}</strong>
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
                    
                      <div class=" 12u {{ $errors->has('webspec') ? ' has-error' : '' }}">
                     
                       <select class="form-control" name="webspec" style="background-color: white" required>
                                <option value="" disabled selected hidden>Service Type...</option>
                  <option value="1">Web Development</option>
                  <option value="2">Brand Development</option>
                  <option value="3">Data</option>
                </select>
                @if ($errors->has('webspec'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('webspec') }}</strong>  
                                </span>
                              @endif
                      </div>
                    </div>
                    <div class="row"></div>
                    <div class="row 50%">
                      <div class="12u {{ $errors->has('message') ? ' has-error' : '' }}">
                        <textarea name="message" placeholder="Message" rows="7" style="background-color: white" ></textarea>
                         
                      </div>
                    </div>

                    <div class="row">
                      <div class="12u">
                        <ul class="buttons">
                          <li><input type="submit" class="special" value="Submit" /></li>
                        </ul>
                         @if ($errors->has('message'))
                                <span class="help-block">  
                                       <strong>{{ $errors->first('message') }}</strong>  
                                </span>
                              @endif
                      </div>
                    </div>
                  </form>
                </div>

            </section>

        </article>

@endsection
   
