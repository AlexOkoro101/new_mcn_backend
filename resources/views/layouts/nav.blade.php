@php
    
   $expiresAt = time() + (5 * 60); // Expires after 5 minutes
    $pageView = \App\PageView::where('url', url()->current())->first();
    
   if ($pageView) {
        if (!isset($_COOKIE["viewUrl"])){
            $pageView->ip = request()->ip();
            $pageView->url = url()->current();
            $value = $pageView->url;
            $pageView->count++;
            setcookie("viewUrl", $value, $expiresAt);
            $pageView->update();
        }

   } else {
        $pageView = new \App\PageView();
        $pageView->ip = request()->ip();
        $pageView->url = url()->current();
        //dd($pageView);
        $pageView->count =1;
        $pageView->save();
    }

   function nav_active($url){
        return url()->current() == $url;
    }
@endphp
<!-- Header -->
    <div id="d-our-phone"><div><i class="fa fa-mobile"></i> &nbsp;<span>07033044456</span></div></div>
    <div id="topper"></div>
    <a id="logo" href="{{url('/')}}"><img src="{{asset('img/logo.png')}}"></a>
<header id="header" class="alt">
    <nav id="nav">
        <ul>
            <li class="{{nav_active(url('/')) ? 'current':''}}"><a href="{{url('/')}}">HOME</a></li>
            <li class="submenu {{nav_active(url('/data')) ? 'current':'' || nav_active(url('data/mtn')) ? 'current':''||nav_active(url('data/etisalat')) ? 'current':'' ||nav_active(url('data/airtel')) ? 'current':''||nav_active(url('data/glo')) ? 'current':'' }}">
                <a href="{{url('/data')}}">Data</a>
                <ul>
                    <li class="{{nav_active(url('/data/mtn')) ? 'current':''}}"><a href="{{url('/data/mtn')}}">MTN</a></li>
                    <li class="{{nav_active(url('/data/etisalat')) ? 'current':''}}"><a href="{{url('/data/etisalat')}}">ETISALAT</a></li>
                    <li class="{{nav_active(url('/data/airtel')) ? 'current':''}}"><a href="{{url('/data/airtel')}}">AIRTEL</a></li>
                    <li class="{{nav_active(url('/data/glo')) ? 'current':''}}"><a href="{{url('/data/glo')}}">GLO</a></li>
                </ul>
            </li>
            
            
            <li>
                <a href="{{url('/data/data-cart')}}">
                    <i class="fa fa-cart-plus"></i> Cart
                    <span id="cart-place"></span>
            @if (Session::has('cart'))
                    <span class="carta cart-badge">{{Session::get('cart')->totalQty}}</span>
            @endif
                </a>
            </li>

            <li class="{{nav_active(url('/blog')) ? 'current':''}}"><a href="{{url('/blog')}}">Blog</a></li>
            
            @if(!Auth::check())
            <li><a href="{{route('login')}}" class="button special dd-in-btn"><!-- <i class="fa fa-bars"></i> -->Sign In</a></li>
            @else
            <li class="submenu">
                <a href="#">Account</a>
                <ul>
                    <li>
                        <a id="logoutBtn" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out">Sign Out</i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                    <li>
                        <a href="{{url('/account')}}">
                            <i class="fa fa-address-book-o"></i> Hi, {{explode(" ", Auth::user()->name)[0]}}
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </nav>
</header>

@if (!Auth::check())
<div id="dropdown-login">
  <div class="dd-header">
      <i class="fa fa-sign-in"></i>
      <h5>LOGIN</h5>
  </div> 
  <form role="form" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
          
      <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus/>
      @if (isset($errors) && $errors->has('email'))
          <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
      
      <input type="password" name="password" placeholder="Password" required />
      @if (isset($errors) && $errors->has('password'))
          <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
      <div class="dd-others">
          <span class="o-1"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember</span>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span class="o-2"><a href="{{ route('password.request') }}">Forgot password?</a></span>
      </div>
      <input type="submit" value="Submit">
      <ul class="dd-icons">
          <li><a href="{{ url('/login/twitter') }}"><i class="fa fa-twitter-square fa-2x"></i></a></li>
          <li><a href="{{ url('/login/facebook') }}"><i class="fa fa-facebook-square fa-2x"></i></a></li>
          <li><a href="{{ url('/login/google') }}"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
      </ul>

      <p>Don't have an account? <a href="{{url('/register')}}">Register</a></p>
  </form>
</div>
@endif