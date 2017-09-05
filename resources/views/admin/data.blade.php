@extends('admin.home')

@section('content')
  <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">DATA</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div id="main-user-area" class="row">
        <div class="col-lg-12">
            <div class="panel panel-red">
                <div class="panel-heading">
                    TOTAL DATA TRANSACTIONS
                </div>
                <div class="panel-body">
                    <p class="text-center">MTN<span class="l-mtn"><b>&#x25A0;</b></span> Etisalat<span class="l-eti">&#x25A0;</span> Airtel<span class="l-atl">&#x25A0;</span> Glo<span class="l-glo">&#x25A0;</span></p>
                    <canvas id="myChart"></canvas>
                    <div class="col-lg-12" id="total-trans">
                        <div class="tot">
                            <b>{{$totMtn}}</b>
                        </div>
                        <div class="tot">
                            <b>{{$totEtisalat}}</b>
                        </div>
                        <div class="tot">
                            <b>{{$totAirtel}}</b>
                        </div>
                        <div class="tot">
                            <b>{{$totGlo}}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    ORDERS
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Phone Loaded</th>
                                <th>Network</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        	
                        	@php 
                                $i = 1;
                                $mtn=0;
                                $glo=0;
                                $etisalat=0;
                                $airtel=0;
                            @endphp
                            @if($orders)
                            @foreach($orders as $order)
                            	@foreach(unserialize($order->cart)->items as $k => $inner)
                                    <?php 
                                        if ($inner['network'] == "MTN") {
                                            $mtn++;
                                        }

                                        if ($inner['network'] == "AIRTEL") {
                                            $airtel++;
                                        }

                                        if ($inner['network'] == "GLO") {
                                            $glo++;
                                        }

                                        if ($inner['network'] == "ETISALAT") {
                                            $etisalat++;
                                        }
                                    ?>

		                            <tr class="odd gradeX">
		                                <td>{{$i}}</td>
		                                <td>{{$order->user->name}}</td>
		                                <td>{{$inner['price']}}</td>
		                                <td>{{$inner['phone']}}</td>
		                                <td>{{$inner['network']}}</td>
		                                <td>{{$order->created_at->toDayDateTimeString()}}</td>
		                            </tr>
		                            @php $i++ @endphp
		                        @endforeach
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["MTN", "Etisalat", "Airtel", "Glo"],
                datasets: [
                    {
                        label: 'Total data transactions',
                        data: [{{$mtn}}, {{$etisalat}}, {{$airtel}}, {{$glo}}],
                        backgroundColor: ['#FFCA08', '#C7D42F', '#D62128', '#14A508']
                    },
                ],
            },
            options: {
                legend: {
                    display:false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

@endsection