@extends('layouts.master')

@section('title')
Careers
@endsection

@section('content')
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				

			<!-- Main -->
				<article id="main">
<br><br><br><br>
					<header class="special container">
						<span class="icon fa-suitcase"></span>
						<h2><strong>Careers</strong></h2>
						
					</header>

					<!-- One -->
					<section class="wrapper style4 special container 100%" style="background: none;padding:1px;margin:-12px">
          <ol class="arrows center" >
   <li><a href="{{url('/')}}">Home</a></li>
   <li><a href="{{url('/careers')}}" style="color: blue">Careers</a></li>
</ol>

          </section>
						<section class="wrapper style4 container">

							<!-- Content -->
								<div class="content">
									<section>
										
										<header>
										<img src="{{asset('img/team-small.jpg')}}" alt="mighty-career" width="100%">
										</header>
										<br>
										<span style="font-size: 75px;font-weight: bold">We are not hiring at the moment.</span>
										
									</section>
								</div>

						</section>

					<!-- Two -->
						
				</article>

			<!-- Footer -->
				
		</div>

	</body>
@endsection