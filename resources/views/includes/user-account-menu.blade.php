<div class="col-lg-3">
	<ul class="user-account-menu" style="border:2px solid white;">
		@php
		    function is_active($url){
		        return url()->current() == $url;
		    }
		@endphp
		<li style="border-bottom: 1px solid #273d4b;background-color: transparent;" class="{{is_active(url('/account')) ? 'uam-active' : ''}}"><a href="{{url('/account')}}" style="color: #79909e"><span class="fa fa-shield"></span> Overview</a></li>
		<li style="border-bottom: 1px solid #273d4b;background-color: transparent;" class="{{is_active(url('/account/personal')) ? 'uam-active' : ''}}"><a href="{{url('/account/personal')}}" style="color: #79909e"><span class="fa fa-user"></span> My Profile</a></li>
		<li style="border-bottom: 1px solid #273d4b;background-color: transparent;" class="{{is_active(url('/account/beneficiaries')) ? 'uam-active' : ''}}"><a href="{{url('/account/beneficiaries')}}" style="color: #79909e"> <span class="fa fa-users"></span> My Beneficiaries</a></li>
		<li style="border-bottom: 1px solid #273d4b;background-color: transparent;" class="{{is_active(url('/account/preferences')) ? 'uam-active' : ''}}"><a href="{{url('/account/preferences')}}" style=" color: #79909e"><span class="fa fa-newspaper-o"></span> Newsletter Preferences</a></li>
		<li style="border-bottom: 1px solid #273d4b;background-color: transparent;" class="{{is_active(url('/account/pass')) ? 'uam-active' : ''}}"><a href="{{url('/account/pass')}}" style="color: #79909e"><span class="fa fa-gears"></span> Change Password</a></li>
		<li style="border-bottom: 1px solid #273d4b;background-color: transparent;" class="{{is_active(url('/account/order')) ? 'uam-active' : ''}}"><a href="{{url('/account/order')}}" style="color: #79909e"><span class="fa fa-shopping-cart"></span> My Orders</a></li>
		<li style="border-bottom: 1px solid #273d4b;background-color: transparent;" class="{{is_active(url('/account/support')) ? 'uam-active' : ''}}"><a href="{{url('/account/support')}}" style="color: #79909e"><span class="fa fa-shopping-cart"></span> Open Support Ticket</a></li>
		<li style="border-bottom: 1px solid #273d4b;background-color: transparent;" class="{{is_active(url('/account/ticket')) ? 'uam-active' : ''}}"><a href="{{url('/account/ticket')}}" style="color: #79909e"><span class="fa fa-shopping-cart"></span> Tickets</a></li>
		<li style="border-bottom: 1px solid #273d4b;background-color: transparent;" class="{{is_active(url('/account/pass')) ? 'uam-active' : ''}}"><a href="{{url('/account/pass')}}" style="color: #79909e"><span class="fa fa-sign-out"></span> Logout</a></li>
	</ul>
</div>