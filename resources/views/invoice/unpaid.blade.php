@extends('layouts.master')

@section('title')
	Invoice - Unpaid
@endsection

@section('content')

	<article id="main">
	<br><br><br><br>
		<header class="special container">
		  <span class="icon fa-envelope"></span>
		  <h2>Invoice Unpaid</h2>
		</header>

		<section class="wrapper style4 special container 75">
<<<<<<< HEAD
			<div class="row">
			<div class="6u 12u(mobile)"" style="text-align: left">
				<p><strong>Order ID :&nbsp;</strong>{{$orderID}}</p>
				<p><strong>Name :&nbsp;</strong>{{$name}}</p>
				<p><strong>Amount :&nbsp;</strong>{{$amount}}</p>
				<p><strong>Date :&nbsp;</strong>{{$date}}</p>
				@foreach($data as $netData) 
				<p><strong> Network :&nbsp;</strong>{{$netData['item']['network']}}</p>
				<p><strong> Quantity :&nbsp;</strong>{{$netData['item']['quantity']}}</p>
				<p><strong>Phone :&nbsp;</strong>{{$netData['phone']}}</p>
				@endforeach
				
=======
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
>>>>>>> 93c291ea1f15445e6834e2ef461e88bceadde31a
			</div>
			<div class="6u 12u(mobile)">
			<p><i class="fa fa-bank fa-5x"></i></p>
			<p>Kindly pay to the bank account below.</p>
			<table style="width:100%;">
                                <tr>
                                   <th>Bank</th>
                                   <th>Account Details</th> 
                                 </tr>
                                 <tr>
                                    <td> Zenith Bank</td>
                                    <td> 0123568989 </td> 
                                  </tr>
  
             </table>
				
			</div>
		</section>
	</article>
@endsection