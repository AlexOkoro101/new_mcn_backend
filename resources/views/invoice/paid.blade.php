@extends ('layouts.master')

@section('title')
	Invoice - Paid
@endsection

@section('content')
	<article id="main">
		<header class="special container">
		  <span class="icon fa-envelope"></span>
		  <h2>Invoice Paid</h2>
		</header>

		<section class="wrapper style4 special container 75">
			<div class="content">
				<p><strong>Order ID:</strong>{{$orderID}}</p>
				<p><strong>Name:</strong>{{$name}}</p>
				<p><strong>Amount:</strong>{{$amount}}</p>
				<p><strong>Date:</strong>{{$date}}</p>
				<p><strong>Order Details:</strong> 
					@foreach($data as $netData) 
					<span>{{$netData['network']}}</span>
					<span>{{$netData['quantity']}}</span>
					<span>{{$netData['price']}}</span>
					<span>{{$netData['phone']}}</span>,
					@endforeach
				</p>
			</div>
		</section>
	</article>

@endsection