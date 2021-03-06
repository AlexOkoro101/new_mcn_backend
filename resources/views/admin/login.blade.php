<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('admin_assets/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('failure'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('failure')}}
                        </div>
                        @endif
                        <form role="form" method="post" action="{{url('/admin/login')}}">
                            {{csrf_field()}}
                            <fieldset>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    @if ($errors->has('email'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('email') }}</strong>
                                       </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    @if ($errors->has('password'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('password') }}</strong>
                                       </span>
                                    @endif
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" href="index.html" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
