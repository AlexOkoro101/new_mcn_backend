@extends('admin.home')

@section('top')
Users
@endsection

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div id="main-user-area" class="row">
        <div class="col-lg-12">
            <div class="panel panel-red">
                <div class="panel-heading">
                    Support Tickets
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Status</th>
                                <th>Subject</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach($supports as $support)
                            <tr class="odd gradeX">
                                <td>{{$i}}</td>
                                <td>
                                    <label class="label label-{{$support->status == 1 ? "success":"danger"}} label-xs">
                                    {{$support->status == 1 ? "open":"closed"}}
                                    </label>
                                </td>
                                <td>{{$support->subject}}</td>
                                <td>{{$support->user->email}}</td>
                                <td>{{$support->created_at->toDayDateTimeString()}}</td>
                                <td>
                                <a class="btn btn-xs btn-info" href="{{url('/admin/support/'.$support->id)}}">View</a>
                                <a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')" href="{{url('/admin/support/d/'.$support->id)}}">Delete</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
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