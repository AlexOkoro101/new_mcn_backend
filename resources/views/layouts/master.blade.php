<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is Mighty ICT,We offer web development,branding and internet data services.We are good at what we do,that's why our customers keep coming back.">
    <meta name="author" content=" Mighty ICT ">
    <meta name="keywords" content="Branding,web development,internet,data,mtn,airtel,etisalat,airtel">

    <title>@yield('title')</title>

    <link rel="icon" href="{{asset('favicon.png')}}"/>

    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('css/slick.css')}}" />

    <!--[if lte IE 8]><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->

    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//mighty.ng/piwik/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <!-- End Piwik Code -->
    
</head>
<body class="index">
    <div id="page-wrapper">
        @include('layouts.nav')

        @yield('content')

        @include('layouts.footer')

    </div>

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.dropotron.min.js')}}"></script>
    <script src="{{asset('js/jquery.scrolly.min.js')}}"></script>
    <script src="{{asset('js/jquery.scrollgress.min.js')}}"></script>
    <script src="{{asset('js/skel.min.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <!--[if lte IE 8]><script src="js/ie/respond.min.js"></script><![endif]-->
    <script src="{{asset('js/main.js')}}"></script>
    <!-- page id-->
    <script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000);
    } // End if
  });
});
</script>
 <!-- Honeypot Anti-spam code -->
    <script type="text/javascript">
    function validateMyForm() {
        // The field is empty, submit the form.
        if(!document.getElementById("honeypot").value) { 
            return true;
        } 
         // the field has a value it's a spam bot
        else {
            return false;
        }
    }
   </script>
 <!-- Honeypot Anti-spam code end -->   
    <script>
// When the user scrolls down 20px or more from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
}
</script>
    <script>
        $(document).ready(function(){
          $('.atestimonial').slick({
            accessibility:true,
            mobileFirst:true,
            autoplay:true,
            /*autoplaySpeed:1500,*/
            prevArrow:false,
            nextArrow:false,
            infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear'
          });
        });
    </script>
    <script>
        $(document).ready(function(){
          $('.testimonial').slick({
            accessibility:true,
            mobileFirst:true,
            autoplay:true,
            /*autoplaySpeed:1500,*/
            prevArrow:false,
            nextArrow:false,
            infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear'
          });
        });
    </script>
     <!-- <script>
        $(document).ready(function(){
            $(function() {
              $( "#accordion" ).accordion({
                collapsible: true
              });
            });
        });
    </script>-->
    <script>
    jQuery(function() {
    jQuery('.ss_button').click(function() {
        jQuery(this).next().slideToggle('slow');
        jQuery(this).toggleClass('active')
        
    });
});
</script>

    @if (url()->current() == url('/blog'))
        <script type="text/javascript" src="{{asset('tinymce/tinymce.min.js')}}"></script>
        <script>
        tinymce.init({
          selector: 'textarea.blog-post-text',
          menubar: false,
          plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
          ],
          toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
        });
        </script>
    @endif

    @if (url()->current() == url('/account/support'))
      <script type="text/javascript" src="{{asset('tinymce/tinymce.min.js')}}"></script>
      <script>
      tinymce.init({
        selector: 'textarea.support-text',
        menubar: false,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: [
          '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
          '//www.tinymce.com/css/codepen.min.css']
      });
      </script>
    @endif
    <script type="text/javascript">
     
    </script>
</body>
</html>