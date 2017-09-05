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
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    {{$support->subject}} <label class="label label-info">{{$support->status == 1 ? "Open":"Closed"}}</label>
                    <form class="ticket-close" method="post" action="{{url('/admin/support/close')}}">
                            {{csrf_field()}}
                        <input type="hidden" name="support_id" value="{{$support->id}}">
                        <button class="btn btn-sm btn-warning" type="submit">Close Ticket</button>
                    </form>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="col-sm-12">
                        <strong class="label label-primary">ORIGINAL TICKET #{{$support->id}}</strong>
                        <h2>{{$support->subject}}</h2>
                        <p>{!!$support->message!!}</p>
                        <span>{{$support->user->name}}</span><br>
                        <span>{{$support->user->email}}</span><br>
                        <span>{{$support->created_at->toDayDateTimeString()}}</span>
                    </div>
                    <div class="col-sm-12">
                        <br>
                        <strong class="label label-success">REPLIES</strong>
                        @if ($replies)
                            @foreach($replies as $reply)
                                <blockquote>
                                    {{$reply->message}}
                                    <small>{{$reply->created_at->toDayDateTimeString()}}</small>
                                    <small>{{$reply->user->name}}</small>
                                </blockquote>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-sm-12">   
                        <form method="post" action="{{url('/admin/support/reply')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                            <input type="hidden" name="support_id" value="{{$support->id}}">
                            <textarea name="message" class="form-control" placeholder="Message" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-success">Reply</button>
                                <a href="{{url('/admin/support')}}" class="btn btn-sm btn-warning">Cancel</a>
                            </div>
                        </form> 
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->
@endsection