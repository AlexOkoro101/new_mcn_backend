@php
function data_active($url){
     return url()->current() == $url;
 }
@endphp
<ul class="data-menu">
	<li class="{{data_active(url('/data/mtn')) ? "data-active":""}}"><a href="{{url('/data/mtn')}}">MTN</a></li>
	<li class="{{data_active(url('/data/etisalat')) ? "data-active":""}}"><a href="{{url('/data/etisalat')}}">Etisalat</a></li>
	<li class="{{data_active(url('/data/airtel')) ? "data-active":""}}"><a href="{{url('/data/airtel')}}">Airtel</a></li>
	<li class="{{data_active(url('/data/glo')) ? "data-active":""}}"><a href="{{url('/data/glo')}}">Glo</a></li>
</ul>