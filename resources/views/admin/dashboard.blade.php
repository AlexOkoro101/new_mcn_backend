@extends('admin.home')

@section('content')
	<div class="row">
		<div class="col-lg-12">
		    <h1 class="page-header">Dashboard</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

	<div class="row">
	    <div class="col-lg-3 col-md-6">
	        <div class="panel panel-primary">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-xs-3">
	                        <i class="fa fa-users fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">
	                        <div class="huge">{{$users->count()}}</div>
	                        <div>USERS</div>
	                    </div>
	                </div>
	            </div>
	            <a href="#">
	                <div class="panel-footer">
	                    <span class="pull-left">View Details</span>
	                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                    <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>
	    <div class="col-lg-3 col-md-6">
	        <div class="panel panel-green">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-xs-3">
	                        <i class="fa fa-eye fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">
	                        <div class="huge">{{$visit}}</div>
	                        <div>VISITS</div>
	                    </div>
	                </div>
	            </div>
	            <a href="#">
	                <div class="panel-footer">
	                    <span class="pull-left">View Details</span>
	                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                    <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>
	    <div class="col-lg-3 col-md-6">
	        <div class="panel panel-yellow">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-xs-3">
	                        <i class="fa fa-shopping-cart fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">
	                        <div class="huge">{{$orders->count()}}</div>
	                        <div>ORDERS</div>
	                    </div>
                      <div class="col-xs-6">
                      	<b>YESTERDAY</b><br>{{$yesterdayOrders}}
                      </div>
                      <div class="col-xs-6">
                      	<b>THIS WEEK</b><br>{{$thisWeekOrders}}
                      </div>
	                </div>
	            </div>
	            <a href="#">
	                <div class="panel-footer">
	                    <span class="pull-left">View Details</span>
	                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                    <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>
	    <div class="col-lg-3 col-md-6">
	        <div class="panel panel-red">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-xs-3">
	                        <i class="fa fa-5x">₦</i>
	                    </div>
	                    <div class="col-xs-9 text-right">
	                        <div class="huge">{{$purchase}}</div>
	                        <div>PURCHASES</div>
	                    </div>
	                    <div class="col-xs-6">
	                    	<b>YESTERDAY</b><br>{{$yesterdaySales}}
	                    </div>
	                    <div class="col-xs-6">
	                    	<b>TODAY</b><br>{{$todaySales}}
	                    </div>
	                </div>
	            </div>
	            <a href="#">
	                <div class="panel-footer">
	                    <span class="pull-left">View Details</span>
	                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                    <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>
	</div>
	<!-- /.row -->

	<div class="row">
	    <div id="recent-order-tbl" class="col-lg-6">
	        <div class="panel panel-green">
	            <div class="panel-heading">
	                Recent Orders
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <table width="100%" class="table table-striped table-bordered table-hover" id="recent-tbl">
	                    <thead>
	                        <tr>
	                            <th>S/N</th>
	                            <th>Status</th>
	                            <th>Name</th>
	                            <th>Total</th>
	                            <th>Date</th>
	                        </tr>
	                    </thead>
	                    <tbody>
                        	@php 
                                $i = 1;
                            @endphp
                            @if($recentOrders)
                            @foreach($recentOrders as $recentOrder)
	                            <tr class="odd gradeX">
	                                <td>{{$i}}</td>
	                                <td>{{$recentOrder->status==1 ? "paid":"unpaid"}}</td>
	                                <td>{{$recentOrder->name}}</td>
	                                <td>{{$recentOrder->amount}}</td>
	                                <td>{{$recentOrder->created_at->toDayDateTimeString()}}</td>
	                            </tr>
	                            @php $i++ @endphp
                            @endforeach
                            @endif
	                    </tbody>
	                </table>
	            </div>
	            <!-- /.panel-body -->
	        </div>
	        <!-- /.panel -->
	    </div>
	    <!-- /.col-lg-6 -->
	    <div id="support-ticket-tbl" class="col-lg-6">
	        <div class="panel panel-red">
	            <div class="panel-heading">
	                Support Tickets
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	                <table width="100%" class="table table-striped table-bordered table-hover" id="support-tbl">
	                    <thead>
	                        <tr>
	                            <th>Status</th>
	                            <th>Subject</th>
	                            <th>Department</th>
	                            <th>Date</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($recentSupports as $support)
	                        <tr class="odd gradeX">
	                            <td>{{$support->status}}</td>
	                            <td>{{$support->subject}}</td>
	                            <td>General</td>
	                            <td class="center">{{$support->created_at->toDayDateTimeString()}}</td>
	                        </tr>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>
	            <!-- /.panel-body -->
	        </div>
	        <!-- /.panel -->
	    </div>
	    <!-- /.col-lg-6 -->
	</div>
	<!-- /.row -->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-red">
				<div class="panel-heading">
					Weekly Sales Report
				</div>
				<div class="panel-body">	
		    		<canvas id="weeklyChart"></canvas>
				    <div class="col-lg-12" id="total-amt-gb">
				    	@foreach($dailyTotals as $p)
				    		<div class="amt-gb">
				    			₦{{$p[0]}}<br>{{$p[1]}}GB
				    		</div>
				    	@endforeach
				    </div>
				</div>
			</div>
		</div>
	</div><br>

	<div class="row">
		<div class="col-lg-12">
		    <div class="panel panel-yellow">
		        <div class="panel-heading">
		            Sales
		        </div>
		        <!-- /.panel-heading -->
		        <div class="panel-body">
		            <table width="100%" class="table table-striped table-bordered table-hover" id="sales-tbl">
		                <thead>
		                    <tr>
		                        <th>Today's sales</th>
		                        <th>This week's sales</th>
		                        <th>This month's sales</th>
		                        <th>This year's sales</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <tr class="odd gradeX">
		                        <td>{{$todaySales}}</td>
		                        <td>{{$thisWeekSales}}</td>
		                        <td>{{$thisMonthSales}}</td>
		                        <td class="center">{{$thisYearSales}}</td>
		                </tbody>
		            </table>
		        </div>
		        <!-- /.panel-body -->
		    </div>
		    <!-- /.panel -->
		</div>
		<!-- /.col-lg-6 -->
	</div>

	<div class="row">
		<div class="col-lg-9">
			<div class="panel panel-green">
				<div class="panel-heading">
					Weekly Page Views
				</div>
				<div class="panel-body">
					<canvas id="pageViewsChart"></canvas>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="panel panel-green">
	            <div class="panel-heading">
	                Most visited pages (weekly)
	            </div>
	            <!-- /.panel-heading -->
	            <div class="panel-body">
	            	<p><b>1. </b>&nbsp;/home/dev&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;113,017</p>
	            </div>
	            <!-- /.panel-body -->
	        </div>
	        <!-- /.panel -->
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
		    <div class="panel panel-yellow">
		        <div class="panel-heading">
		            Sales
		        </div>
		        <!-- /.panel-heading -->
		        <div class="panel-body">
		            <table width="100%" class="table table-striped table-bordered table-hover" id="sales-tbl">
		                <thead>
		                    <tr>
		                        <th>Today Views</th>
		                        <th>This week's views</th>
		                        <th>This month's views</th>
		                        <th>This year's views</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <tr class="odd gradeX">
		                        <td>{{$todaySales}}</td>
		                        <td>{{$thisWeekSales}}</td>
		                        <td>{{$thisMonthSales}}</td>
		                        <td class="center">{{$thisYearSales}}</td>
		                </tbody>
		            </table>
		        </div>
		        <!-- /.panel-body -->
		    </div>
		    <!-- /.panel -->
		</div>
		<!-- /.col-lg-6 -->
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<script>
		var ctx = document.getElementById("weeklyChart").getContext('2d');
		var weeklyChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
		        datasets: [
		            {
		                label: 'MTN',
		                backgroundColor: "#FFCA08",
		                data: [
		                	@foreach($mtnWeek as $i)
		                	{{count($i)}},
		                	@endforeach
		                ],
		            },
		            {
		                label: "Etisalat",
		                backgroundColor: "#C7D42F",
		                data: [
		                	@foreach($etisalatWeek as $i)
		                	{{count($i)}},
		                	@endforeach
		                ]
		            },
		            {
		                label: "Airtel",
		                backgroundColor: "#D62128",
		                data: [
		                	@foreach($airtelWeek as $i)
		                	{{count($i)}},
		                	@endforeach
		                ]
		            },
		            {
		                label: "Glo",
		                backgroundColor: "#14A508",
		                data: [
		                	@foreach($gloWeek as $i)
		                	{{count($i)}},
		                	@endforeach
		                ]
		            }
		        ]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});

		var ctx = document.getElementById('pageViewsChart').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'line',

		    // The data for our dataset
		    data: {
		        labels: ["Sunday","Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
		        datasets: [
		        {
		            label: "New Users",
		            backgroundColor: '',
		            borderColor: 'red',
		            data: [0, 10, 5, 2, 20, 30, 45],
		        },
		        {
		            label: "Old Users",
		            backgroundColor: '',
		            borderColor: 'green',
		            data: [13, 5, 8, 1, 35, 14, 10],
		        }
		        ]
		    },


		    // Configuration options go here
		    options: {}
		});
	</script>
@endsection