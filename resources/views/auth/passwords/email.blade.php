@extends('layouts.master')

@section('content')
<article id="main"><br><br><br>
    <header class="special container">
      <span class="icon fa-envelope"></span>
      <h2>Reset your password</h2>
    </header>
    <section class="wrapper style4 special container 75%">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="button success">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                        </form>

    </section>
</article>
@endsection
