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
    
    @if(Session::has('success'))
      <div class="alert alert-success">
        {{Session::get('success')}}
      </div> 
    @endif

    @if(Session::has('userSuccess'))
      <div class="alert alert-success">
        {{Session::get('userSuccess')}}
      </div> 
    @endif

    <div id="user-page-flash" class="row">
      <div class="col-lg-12">
        <div class="alert alert-success">
          
        </div>
      </div>
    </div>

    <div id="main-user-area" class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Last accessed IP</th>
                                <th>URL</th>
                                <th>Views</th>
                                <th>Last Accessed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pageViews as $pv)
                            <tr class="odd gradeX">
                                <td>{{$pv->id}}</td>
                                <td>{{$pv->ip}}</td>
                                <td>{{$pv->url}}</td>
                                <td>{{$pv->count}}</td>
                                <td>{{$pv->updated_at->toDayDateTimeString()}}</td>
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

    



              

@endsection