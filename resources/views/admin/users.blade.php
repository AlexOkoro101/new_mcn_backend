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
                                <th>Role</th>
                                <th>Name</th>
                                <th>Phone(s)</th>
                                <th>Email</th>
                                <th>Time Registered</th>
                                <th>Block</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>{{$user->id}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->status === 0 ? "Blocked":"Active"}}</td>
                                <td>
                                    <a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#user-edit{{$user->id}}">
                                        Edit
                                    </a>
                                </td>

                                <div id="user-edit{{$user->id}}" class="modal fade">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit</h4>
                                      </div>
                                        <form action="{{url('/admin/user/edit/'.$user->id)}}" method="POST" class="userEditForm{{$user->id}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="userId" value="{{$user->id}}">
                                          <div class="modal-body">
                                            <div class="form-group">
                                                Role: <select name="role" class="form-control">
                                                    <option value="" disabled>Select Role</option>
                                                    @foreach($roles as $role)
                                                    <option value="{{$role->id}}" {{$user->role->id == $role->id ? "selected":""}}>{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email" value="{{$user->email}}">
                                            </div>
                                            <div class="form-group">
                                                Block User <input type="checkbox" name="status" {{$user->status === 0 ? "checked":""}}>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                            <button type="submit" id="e{{$user->id}}" class="user-edit-btn btn btn-primary btn-sm">Save changes</button>
                                          </div>
                                        </form>
                                        <form action="{{url('/admin/user/delete/'.$user->id)}}" method="post">
                                          {{csrf_field()}}
                                          <div class="form-group text-center">
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete User</button>
                                          </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <div class="well">
                        <button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#myModal">Add User</button>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

        <div class="col-lg-12">
          
            <p class="lead">USERS ONLINE</p>
            <ul>
             @foreach($usersArray as $userOnline)
                <li>{{$userOnline}}</li>
             @endforeach 
            </ul>
          
        </div>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Add New User</h4>
            </div>
            <div class="modal-body">
              <form id="new-user-form" role="form" method="POST" action="{{ url('/admin/user/store') }}">
                    {{ csrf_field() }}

                  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name"  required autofocus/>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
                

                
                  
                  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" required />
                       @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                  </div>
               
                
                  <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" id="password" class="form-control" type="password" name="password" placeholder="Password" required />
                    @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                  </div>

                  <div class="form-group">
                    <input id="password_confirmation" id="password-confirm" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required />
                  </div>
                
                
                  <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone No." required  autofocus/>
                     @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                  </div>
               
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>



    </div>
    <!-- /.row -->

    



              

@endsection