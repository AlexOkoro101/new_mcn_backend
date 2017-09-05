@extends('layouts.master')

@section('title')
    Voice Mighty
@endsection

@section('content')
    <!-- Page Content -->
    <article id="main"> <br><br><br>

          <header class="special container">
            <span class="icon fa-pencil"></span>
            <h2> Blog</h2>
            <h1>Voice Mighty</h1>
          </header>

          <!-- One -->
        <section class="wrapper style4 special container 125%">

        <div class="row">
            <div class="12u 12u(mobile)">
                <h1 class="page-header">Blog
                    <small>Voice Mighty</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        @if (count($posts)!=0)
            @foreach($posts as $post)
                <!-- Blog Post Row -->
                <div id="d-blog-row" class="12u 12u(mobile)">
                    <div class="row">
                        @if($post->id % 2 == 0)
                        <div id="d-blog-image" class="6u 12u(mobile)">
                            <a href="#">
                                @if($post->post_image == null)
                                <img src="{{asset('img/vm.png')}}" class="img-responsive" alt="">
                                <small>Comments: {{count($post->comments)}}</small>
                                @else
                                <img class="img-responsive img-hover" src="{{asset('storage/blog/'.$post->post_image)}}" alt="">
                                @endif
                            </a>
                        </div>
                        <div id="d-blog-text" class="6u 12u(mobile)">
                            <h3>
                                <a href="{{url('/blog/'.$post->id)}}">{{$post->post_title}}</a>
                            </h3>

                            <span><a href="{{url('/blog/author-'.$post->user_id)}}">{{$post->user->name}}</a>
                            <small  data-toggle="tooltip" data-placement="right" title="{{$post->created_at->toDayDateTimeString()}}">{{$post->created_at->diffForHumans()}}</small><br>
                            <small><i class="fa fa-comment"></i> Comments: {{count($post->comments)}}</small>&nbsp;&nbsp;
                            <small><i class="fa fa-eye"></i> Views: {{$post->view_count}}</small>
                            </span>
                            <span>{!!str_limit($post->post_body, $limit = 50, $end = '...')!!}</span>
                            <a class="button default" href="{{url('/blog/'.$post->id.'-'.$post->post_title)}}">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                        @else
                        <div id="d-blog-text" class="6u 12u(mobile)">
                            <h3>
                                <a href="{{url('/blog/'.$post->id)}}">{{$post->post_title}}</a>
                            </h3>

                            <span><a href="{{url('/blog/author-'.$post->user_id)}}">{{$post->user->name}}</a>
                            <small  data-toggle="tooltip" data-placement="right" title="{{$post->created_at->toDayDateTimeString()}}">{{$post->created_at->diffForHumans()}}</small><br>
                            <small><i class="fa fa-comment"></i> Comments: {{count($post->comments)}}</small>&nbsp;&nbsp;
                            <small><i class="fa fa-eye"></i> Views: {{$post->view_count}}</small>
                            </span>
                            <span>{!!str_limit($post->post_body, $limit = 50, $end = '...')!!}</span>
                            <a class="button default" href="{{url('/blog/'.$post->id.'-'.$post->post_title)}}">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                        <div id="d-blog-image" class="6u 12u(mobile)">
                            <a href="#">
                                @if($post->post_image == null)
                                <img src="{{asset('img/vm.png')}}" class="img-responsive" alt="">
                                <small>Comments: {{count($post->comments)}}</small>
                                @else
                                <img class="img-responsive img-hover" src="{{asset('storage/blog/'.$post->post_image)}}" alt="">
                                @endif
                            </a>
                        </div>
                        @endif
                        </div>
                </div><br>
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
                <div class="12u">    
                    <h3>No Posts Yet!</h3>
                </div>
            </div>
        @endif

        <!-- /.container -->
        <hr>
        </section>

        </article>
@endsection
