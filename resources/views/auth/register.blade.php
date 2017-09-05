@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')
  <article id="main"> <br><br><br>

          <header class="special container">
            <span class="icon fa-envelope"></span>
            <h2>Register</h2>
          </header>

          <!-- One -->
            <section class="wrapper style4 special container 75%">

              <!-- Content -->
                <div class="content">
                  <form role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                    <div class="row 50%">
                      <div class="12u 12u(mobile) {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="text" name="name" placeholder="Name"  value="{{ old('name') }}" required autofocus/>
                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                      </div>
                      
                    </div>
                    <div class="row 50%">
                      
                      <div class="12u 12u(mobile) {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required/>
                           @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                      </div>
                    </div>
                    <div class="row 50%">
                      <div class="6u 12u(mobile) {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" name="password" placeholder="Password" required />
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="6u 12u(mobile)">
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required />
                      </div>
                    </div>
                    <div class="row 50%">
                      <div class="6u 12u(mobile) {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <input type="text" name="phone" placeholder="Phone No." value="{{ old('phone') }}" required autofocus/>
                         @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="12u">
                        <ul class="buttons">
                          <li><input type="submit" class="special" value="Submit" /></li>
                        </ul>
                        <ul class="icons">
            <li><a href="{{ url('/login/twitter') }}" class="icon circle fa-twitter"><span class="label" >Twitter</span></a></li>
            <li><a href="{{ url('/login/facebook') }}" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="{{ url('/login/github') }}" class="icon circle fa-github"><span class="label">Github</span></a></li>
        </ul>

                      </div>
                    </div>
                  </form>
                </div>

            </section>

        </article>

@endsection