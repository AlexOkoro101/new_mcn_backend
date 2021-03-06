@extends('admin.home')

@section('top')
Users
@endsection

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Logged In Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Daily Logged-in Users
                </div>
                <div class="panel-body">    
                    <canvas id="logUsersChart"></canvas>
                    <div class="col-lg-12" id="total-trans">
                        
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div id="main-user-area" class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Users
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="online-table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Online Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usersArray as $key => $user)
                            <tr class="odd gradeX">
                                <td>{{$key + 1}}</td>
                                <td>{{$user[0]}}</td>
                                <td>{{$user[1]}}</td>
                            </tr>
                            @endforeach
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
    <script type="text/javascript">
        var ctx = document.getElementById('logUsersChart').getContext('2d');
        var weeklyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Online", "Offline"],
                datasets: [
                    {
                        label: 'users',
                        data: [{{$online}}, {{$offline}}],
                        backgroundColor: ['green','gray'],
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
    </script>
@endsection