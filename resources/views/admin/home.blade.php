<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <link rel="icon" href="{{asset('favicon.png')}}"/>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('admin_assets/css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('admin_assets/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('admin_assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('admin_assets/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('admin_assets/css/dataTables.responsive.css')}}" rel="stylesheet">

    <!-- Ekundayo Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/main.css')}}">
    
    @if(url()->current() == url('/admin/blog'))
    <!-- TinyMCE Skins -->
    <link rel="stylesheet" type="text/css" href="{{asset('tinymce/skins/lightgray/content.min.css')}}">
    @endif

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

            @include('admin.nav')

            <div id="page-wrapper">
                @yield('content')
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->


    <!-- jQuery -->
    <script src="{{asset('admin_assets/js/jquery.min.js')}}"></script>
    

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin_assets/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('admin_assets/js/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('admin_assets/js/sb-admin-2.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('admin_assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/dataTables.responsive.js')}}"></script>

    <!-- Ekundayo custom script -->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#data-table').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#testimonial-table').DataTable({
            responsive: true
        });
    });
    </script>
    @if (url()->current() == url('/admin/blog'))
        <script type="text/javascript" src="{{asset('tinymce/tinymce.min.js')}}"></script>
        <script>
            tinymce.init({
                selector: "textarea.blog-post-text",
                theme: 'modern',
                  plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
                  ],
                  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
                  image_advtab: true,
                  templates: [
                    { title: 'Test template 1', content: 'Test 1' },
                    { title: 'Test template 2', content: 'Test 2' }
                  ],
                  content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'
                  ]
            });
        </script>
    @endif

</body>

</html>
