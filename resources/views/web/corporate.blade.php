@extends('layouts.master')

@section('title')
    Web - Corporate Websites
@endsection

@section('content')
	<!-- Page Content -->
	    <div class="web-area container-fluid">

	            <div class="row">
	                <div class="page-header text-center">
	                  <h1>Web Solutions</h1>
	                  <div class="new">
            <ol class="breadcrumb" style="text-align:left">
                        <li><a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="branding-active">Web Solutions</li>
                    </ol>
            </div>
	                </div>
	                <div class="web-header">


	                    @include('includes.web-menu-nav')
	                    
	                    <div class="web-message col-xs-12 col-sm-6 col-md-6 col-lg-9">              
	                        <h2 class="display-3">Talk about standing out your <i>Business?</i></h2>
	                        <p class="lead">We can create a corporate website that stands you out, with our digital marketing skills we help your online presence by promoting your brands through SEO</p>
	                        <p class="lead">
	                            <a class="btn btn-primary btn-lg" href="{{url('web/create')}}" role="button">Request Quote Now!</a>
	                        </p>
	                    </div>

	                </div>
	            </div>

	        <hr>

	        <div class="page-header text-center">
	            <h2>CORPORATE SAMPLES</h2>
	        </div>

	        <section class="no-padding" id="portfolio">
	            <div class="container-fluid">
	                <div class="row no-gutter popup-gallery">
	                    <div class="col-lg-4 col-sm-6">
	                        <a href="{{asset('img/portfolio/fullsize/1.jpg')}}" class="portfolio-box">
	                            <img src="{{asset('img/portfolio/thumbnails/1.jpg')}}" class="img-responsive" alt="">
	                            <div class="portfolio-box-caption">
	                                <div class="portfolio-box-caption-content">
	                                    <div class="project-category text-faded">
	                                        School Portal
	                                    </div>
	                                    <div class="project-name">
	                                        Flying Mountain
	                                    </div>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                    <div class="col-lg-4 col-sm-6">
	                        <a href="{{asset('img/portfolio/fullsize/2.jpg')}}" class="portfolio-box">
	                            <img src="{{asset('img/portfolio/thumbnails/2.jpg')}}" class="img-responsive" alt="">
	                            <div class="portfolio-box-caption">
	                                <div class="portfolio-box-caption-content">
	                                    <div class="project-category text-faded">
	                                        E-commerce Application
	                                    </div>
	                                    <div class="project-name">
	                                        Busting Handles
	                                    </div>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                    <div class="col-lg-4 col-sm-6">
	                        <a href="{{asset('img/portfolio/fullsize/3.jpg')}}" class="portfolio-box">
	                            <img src="{{asset('img/portfolio/thumbnails/3.jpg')}}" class="img-responsive" alt="">
	                            <div class="portfolio-box-caption">
	                                <div class="portfolio-box-caption-content">
	                                    <div class="project-category text-faded">
	                                        Blogs
	                                    </div>
	                                    <div class="project-name">
	                                        Shouting Happy
	                                    </div>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                    <div class="col-lg-4 col-sm-6">
	                        <a href="{{asset('img/portfolio/fullsize/4.jpg')}}" class="portfolio-box">
	                            <img src="{{asset('img/portfolio/thumbnails/4.jpg')}}" class="img-responsive" alt="">
	                            <div class="portfolio-box-caption">
	                                <div class="portfolio-box-caption-content">
	                                    <div class="project-category text-faded">
	                                        Category
	                                    </div>
	                                    <div class="project-name">
	                                        Landing Maroose
	                                    </div>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                    <div class="col-lg-4 col-sm-6">
	                        <a href="{{asset('img/portfolio/fullsize/5.jpg')}}" class="portfolio-box">
	                            <img src="{{asset('img/portfolio/thumbnails/5.jpg')}}" class="img-responsive" alt="">
	                            <div class="portfolio-box-caption">
	                                <div class="portfolio-box-caption-content">
	                                    <div class="project-category text-faded">
	                                        Category
	                                    </div>
	                                    <div class="project-name">
	                                        Project Name
	                                    </div>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                    <div class="col-lg-4 col-sm-6">
	                        <a href="{{asset('img/portfolio/fullsize/6.jpg')}}" class="portfolio-box">
	                            <img src="{{asset('img/portfolio/thumbnails/6.jpg')}}" class="img-responsive" alt="">
	                            <div class="portfolio-box-caption">
	                                <div class="portfolio-box-caption-content">
	                                    <div class="project-category text-faded">
	                                        Category
	                                    </div>
	                                    <div class="project-name">
	                                        Project Name
	                                    </div>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	            </div>
	        </section>

	    </div>
	    <!-- /.container -->
@endsection