@extends('layouts.master')

@section('title')
Deals
@endsection

@section('content')
	<body class="no-sidebar">
		<div id="page-wrapper">
				<article id="main">
<br><br><br><br>
					<header class="special container">
						<span class="icon fa-suitcase"></span>
						<h2><strong>Deals</strong></h2>
						
					</header>
					<section class="wrapper style4 special container 100%" style="background: none;padding:1px;margin:-12px">
          <ol class="arrows center" >
   <li><a href="{{url('/')}}">Home</a></li>
   <li><a href="{{url('/deals')}}" style="color: blue">Deals</a></li>
</ol>

          </section>
						<section class="wrapper style4 container">

							
								<div class="content" style="text-align: center">
									<section>
										<br><br><br><br>
										<span style="font-size: 75px;font-weight: bold;text-transform: capitalize;">Coming Soon.</span>
                                        <br><br><br><br>
										
									</section>
								</div>
                                    
						</section>

					
						
				</article>

			
				
		</div>
	</body>
@endsection