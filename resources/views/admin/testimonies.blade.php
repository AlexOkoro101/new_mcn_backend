@extends('admin.home')

@section('top')
	Users
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">TESTIMONIES</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

	    <div id="main-user-area" class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    Testimonies
	                </div>
	                <!-- /.panel-heading -->
	                <div class="panel-body">
	                    <table width="100%" class="table table-striped table-bordered table-hover" id="testimonial-table">
	                        <thead>
	                            <tr>
	                                <th>S/N</th>
	                                <th>Name</th>
	                                <th>Message</th>
	                                <th>Status</th>
	                                <th>Date</th>
	                                <th>Approve</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	
	                        	@php $i = 1 @endphp
	                            @foreach($als as $al)
		                            <tr class="odd gradeX">
		                                <td>{{$i}}</td>
		                                <td>{{$al->name}}</td>
		                                <td>{{$al->message}}</td>
		                                <td id="stat{{$al->id}}">{{$al->approval === 1 ? "Approved" : "Not Approved"}}</td>
		                                <td>{{$al->created_at->toFormattedDateString()}}</td>
		                                <form class="testimonial-approval" id="al{{$al->id}}" action="">
		                        			{{csrf_field()}}
		                                <td>
		                                	<input type="checkbox" class="approval-btn-check" id="approval{{$al->id}}" name="approval" {{$al->approval === 1 ? "checked":""}}> &nbsp;&nbsp;
		                                	<button type="submit" id="al-check{{$al->id}}" class="approval-btn btn btn-xs btn-success">Save</button>
		                                </td>
		                                </form>
		                            </tr>
		                            @php $i++ @endphp
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


@endsection