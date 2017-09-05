<div class="wrapper_inner">
    <div class="4u 12u(mobile) personal_info" >
      <section class="highlight" style="padding:3px;margin-top: 13px;background-color: transparent;">
                <div class="info-left">
                  <label for="image">
                    <input type="file" name="image" style="display: none;" id="image">
                    <img src="{{asset('storage/'.auth()->user()->image)}}" height="200" width="220">
                  </label>
                </div>
                <div class="info-right">
                  <h3 style="text-transform: inherit;font-size: 25px;color:#e4e9ec;"> {{auth()->user()->name}}</h3>
                  <h3 style="text-transform: inherit;font-size: 13px;color:#e4e9ec;">{{auth()->user()->email}}</h3>
                  <h3 style="text-transform: inherit;font-size: 13px;color:#e4e9ec;">{{auth()->user()->phone}}</h3>
                  <p><span class="change_num"><a href="{{url('/account/personal')}}">Edit Phone <span class="fa fa-mobile"></span></a></span><span class="change_email"><a href="{{url('/account/personal')}}">Edit Email <span class="fa fa-envelope"></span></a></span></p>
                </div>
      </section>
    </div>
    <div class="toggle">
      <a type="button" href="#"><span class="fa fa-bars"></span></a>
    </div>
</div>