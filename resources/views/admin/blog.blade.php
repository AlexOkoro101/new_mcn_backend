@extends('admin.home')

@section('top')
	Blog
@endsection

@section('content')
	    
	        <div class="row">
	              <div class="col-lg-12">
	                  <h1 class="page-header">BLOG</h1>
	              </div>
	              <!-- /.col-lg-12 -->
	          </div>
	          <!-- /.row -->
	        <!-- /.row -->
	        @if (count($posts)!=0)
	            @foreach($posts as $post)
	                <!-- Blog Post Row -->
	                <div class="row">
	                        <div class="col-md-3">
	                            <a href="#">
	                                @if($post->post_image == null)
	                                <img src="{{asset('img/vm.png')}}" class="img-responsive" alt="">
	                                <small>Comments: {{count($post->comments)}}</small>
	                                @else
	                                <img class="img-responsive img-hover" src="{{asset('storage/blog/'.$post->post_image)}}" alt="">
	                                @endif
	                            </a>
	                            <small><i class="fa fa-comment"></i> Comments: {{count($post->comments)}}</small>&nbsp;&nbsp;
	                            <small><i class="fa fa-eye"></i> Views: {{$post->view_count}}</small>
	                        </div>
	                        <div class="col-md-9">
	                            <h3>
	                                <a href="{{url('/blog/'.$post->id)}}">{{$post->post_title}}</a>
	                            </h3>
	                            <p><a href="{{url('/blog/author-'.$post->user_id)}}">{{$post->user->name}}</a>
	                            <small  data-toggle="tooltip" data-placement="right" title="{{$post->created_at->toDayDateTimeString()}}">{{$post->created_at->diffForHumans()}}</small>
	                            </p>
	                            <p>{!!str_limit($post->post_body, $limit = 200, $end = '...')!!}</p>
	                            <a class="btn btn-primary" href="{{url('/blog/'.$post->id.'-'.$post->post_title)}}">Read More <i class="fa fa-angle-right"></i></a>
	                        </div>
	                </div>
	                <!-- /.row -->
	            @endforeach
	            

	            <!-- Pager -->
	            <div class="row text-center">
	                <nav>
	                  {{$posts->links()}}
	                </nav>
	            </div>
	            <!-- /.row -->

	            <hr>

	        @else
	            <div class="row">
	                <div class="col-lg-8 alert alert-info text-center">    
	                    <h4>No posts yet</h4>
	                </div>
	            </div>
	        @endif
	        
	        @if(Auth::check())
	        @if (Auth::user()->role->name == "Administrator")
	            <!-- Blog Create Form Row -->
	            <div class="row">
	                <div class="col-md-8">
	                    <h2>Create Post</h2>
	                    <form action="{{url('/admin/blog/create')}}" method="post" enctype="multipart/form-data">
	                        {{csrf_field()}}

	                        <div class="{{ $errors->has('post_title') ? ' has-error' : '' }}">
		                        <div class="form-group">
		                            <input type="text" name="post_title" class="form-control" placeholder="Enter Title" required>
		                        </div>
	                           @if ($errors->has('post_body'))
	                              <span class="help-block">
	                                  <strong>{{ $errors->first('post_title') }}</strong>
	                              </span>
	                            @endif
	                        </div>

	                        <div class="{{ $errors->has('post_body') ? ' has-error' : '' }}">
		                        <div class="form-group">
		                            <textarea name="post_body" class="blog-post-text form-control" rows="8"></textarea>
		                        </div>
	                           @if ($errors->has('post_body'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('post_body') }}</strong>
                                  </span>
	                            @endif
	                        </div>

	                        <div class="{{ $errors->has('image') ? ' has-error' : '' }}">
		                        <div class="form-group">
		                           <span>Attach beautiful post image</span><input type="file" name="image">
		                        </div>
	                           @if ($errors->has('image'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('image') }}</strong>
                                  </span>
	                            @endif
	                        </div>

	                        <pre><code>use Carbon\Carbon;</code></pre>
	                        
	                        <button type="submit" class="btn btn-lg btn-primary">Submit Post</button><br><br><br>
	                    </form>
	                </div>
	            </div>
	            <!-- /.row -->
	        @endif
	        @endif

@endsection