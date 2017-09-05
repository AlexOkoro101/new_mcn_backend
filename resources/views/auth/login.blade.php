@extends('layouts.master')

@section('title')
LOGIN PAGE
@endsection

@section('content')

    <article id="main"> <br><br><br>

          <header class="special container">
            <span class="icon fa-envelope"></span>
            <h2>Login Page</h2>
          </header>

          <!-- One -->
            <section class="wrapper style4 special container 75%">

              <!-- Content -->
                <div class="content">
                  <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <div class="row 50%">
                      <div class="6u 12u(mobile) {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus/>
                         @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="6u 12u(mobile) {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" placeholder="Password" required />
                         @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      </div>
                    </div>
                    
                    <div class="row 50%">
                      <div class="12u">
                        <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="12u">
                        <ul class="buttons">
                          <li><input type="submit" class="special" value="Submit" /></li>
                          <li><a href="{{ route('password.request') }}" class="button danger">Forgot your password?</a></li>
                        </ul>
                        <ul class="icons">
            <li><a href="{{ url('/login/twitter') }}" class="icon circle fa-twitter"><span class="label" >Twitter</span></a></li>
            <li><a href="{{ url('/login/facebook') }}" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="{{ url('/login/google') }}" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
        </ul>

                      </div>
                    </div>
                    <div class="row">
                    <div class="6u 12u(mobile)">
                        Don't have an account? <a href="{{url('/register')}}">Register</a>
                    </div>
                    </div>
                  </form>
                </div>

            </section>

        </article>

@endsection