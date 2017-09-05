@extends('layouts.master')

@section('title')
    Voice Mighty - Post
@endsection

@section('content')
       <div id="fb-root"></div>
       <script>(function(d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));</script>
       <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

      

<!-- Page Content -->
   <article id="main"> <br><br>
            <section class="wrapper style4 special container 125%">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="12u 12u(mobile)">
                <h1 class="page-header"><span style="font-size:25px;font-weight: bold;">{{$post->post_title}}</span> 
                </h1>
                
            </div>
        </div>
        <!-- /.row -->


        <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="12u 12u(mobile)">

                <!-- Blog Post -->

                <!-- Date/Time -->
                <p><i class="fa fa-clock-o"></i> Posted on {{$post->created_at->toDayDateTimeString()}}</p>

                <!-- Preview Image -->
                @if ($post->post_image == null)
                    <img src="{{asset('img/vm.png')}}" class="img-responsive" alt="">
                @else
                    <img class="img-responsive img-hover" src="{{asset('storage/blog/'.$post->post_image)}}" alt=""><br>
                    <small><i class="fa fa-comment"></i> Comments: {{count($post->comments)}}</small>&nbsp;&nbsp;
                    <small><i class="fa fa-eye"></i> Views: {{$post->view_count}}</small>
                @endif

                <hr>

                <!-- Post Content -->
                <p class="lead">{!!$post->post_body!!}</p>
                <p>  
                    <a class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-size="large"></a>
                    <a class="twitter-share-button" href="{{url()->current()}}" data-size="large">Tweet</a>
                </p>
                <p> Posted by <small><a href="{{url('/blog/author-'.$post->user_id)}}">{{$post->user->name}}</a>
                    </small></p>
                <hr>
                <!-- Blog Comments -->
                @if (session('failure'))
                    <div class="alert alert-danger">
                        {{ session('failure') }}
                    </div>
                @endif
                <!-- Comments Form -->
                <div class="row">
                <div class="6u 12u(mobile)">
                    <h4>Leave a Comment:</h4>
                    <form method="post" action="{{url('/blog/'.$post->id.'/comment')}}" role="form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="button success small">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                
                @foreach($comments as $comment)
                    <!-- Comment -->
                    <div class="6u 12u(mobile)">
                        <a class="pull-left" href="#">
                            @if ($comment->user->image == null)
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                            @else
                            @php
                                $a = explode('/', $comment->user->image);  
                            @endphp
                            <img class="media-object" src="{{asset('storage/'. $a[0].'/thumb'.$a[1])}}" alt="">
                            @endif
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="{{url('/blog/author-'.$post->user_id)}}">{{$comment->user->name}}</a>
                                <small>{{$comment->created_at->toDayDateTimeString()}}</small>
                            </h4>
                            {{$comment->comment}}
                        </div>
                    </div>
                @endforeach
                </div>

            </div>

        </div>
        <hr>

     </section>

        </article>
  
 @endsection