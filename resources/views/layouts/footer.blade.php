<!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="row" id="footer-container">
                <div class="3u 12u(mobile) 12u(narrower)" id="footer-address">
                    <ul>
                        <li><a href="{{url('/')}}"><img src="{{asset('img/logo_footer.png')}}" alt=""></a></li>
                        <li id="address-place"><i class="fa fa-map-marker"></i> 66, Old Abeokuta Road, Opposite Wema Bank, Agege, Lagos, Nigeria <br>07033044456, 09097619649</li>
                    </ul>
                </div>
                <div class="3u 12u(mobile) 12u(narrower)" id="footer-data">
                    <p>Cheap data plans</p>
                    <ul>
                        <li><a href="{{url('/data/mtn')}}">MTN</a></li>
                        <li><a href="{{url('/data/airtel')}}">Airtel</a></li>
                        <li><a href="{{url('/data/etisalat')}}">Etisalat</a></li>
                        <li><a href="{{url('/data/glo')}}">Glo</a></li>
                    </ul>
                </div>
                <div class="3u 12u(mobile) 12u(narrower)" id="footer-service">
                    <p>Who we are & what we do</p>
                    <ul>
                        <li><a href="{{url('/branding')}}">Branding</a></li>
                        <li><a href="{{url('/about-us')}}">About</a></li>
                        <li><a href="{{url('/contact')}}">Contact</a></li>
                        <li><a href="{{url('/careers')}}">Careers</a></li>
                        <li><a href="{{url('/testimonial')}}">Testimonials</a></li>
                        <li><a href="{{url('/terms')}}">Terms</a></li>
                    </ul>
                </div>
                <div class="3u 12u(mobile) 12u(narrower)" id="footer-social">
                    <p>We are social</p>
                    <ul class="icons">
                        <li><a href="{{url('https://twitter.com/Mighty_Data')}}" target="_blank" class="icon circle fa-twitter"><span class="label" >Twitter</span></a></li>
                        <li><a href="{{url('https://www.facebook.com/mighty.solutions')}}" target="_blank" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon circle fa-instagram"><span class="label">Instagram</span></a></li>
                    </ul>
                    <p>Accepted payment methods</p>
                    <ul class="icons">
                        <li><a href="{{url('https://twitter.com/Mighty_Data')}}" target="_blank"><img src="{{asset('img/payment_cards.png')}}"></a></li>
                    </ul>
                    <p>Pay to our banks</p>
                    <ul class="icons">
                        <li><a href="{{url('https://twitter.com/Mighty_Data')}}" target="_blank"><img src="{{asset('img/payment_banks.png')}}"></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-circle-up fa-3x"></i><br>&nbsp;&nbsp;</button>
        <div id="footer-cross-line"></div>
        <div class="copyright row">
            <div class="6u 12u(mobile) footer-copy-left">Copyright &copy; {{Date('Y')}} Mighty Interactive LTD. (Formerly Mighty ICT Solutions).</div>
            <div class="6u 12u(mobile) footer-copy-right">Made with <i class="fa fa-heart"></i> in <a href="http://mighty.com.ng"> Lagos</a></div>
        </div>
    </footer>