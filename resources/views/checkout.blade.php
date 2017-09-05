@extends('layouts.master')

@section('title')
	Checkout
@endsection

@section('content')

<article id="main">
	<br><br><br>
	<section class="wrapper style3 container special">
		<header class="major">
			<i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 60px"></i><br>
			<h2><strong>Checkout&nbsp;</strong>Page&nbsp;</h2>
		</header>

		<div class="row">
			<div class="12u 12u(narrower)">
			<p class="lead">Amount Due :&nbsp;<strong>&#8358</strong>{{$cart->totalPrice}}</p>
			</div>
		</div>
		<div class="row">
			<div class="12u 12u(narrower)">
				<div class="atm-option">
					<p class="lead">Pay with ATM Card</p>
					<p><i class="fa fa-cc-mastercard fa-5x"></i></p>
					<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form"> 
						{{csrf_field()}}    
						<input type="hidden" name="email" value="{{$email}}"> {{-- required --}}
						<input type="hidden" name="amount" value="{{$totalPrice.'00'}}"> {{-- required in kobo --}}
						<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
						<input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
						{{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
						<p>
							<button class="button success" type="submit" value="Pay Now!">
							<i class="fa fa-plus-circle fa-lg"></i> Pay Now!
							</button>
						</p>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Two -->   
</article>
<!-- Footer -->
</div>

@endsection