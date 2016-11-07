@extends('layouts.auth.app')

@section('content')
<title>INSPINIA | Forgot password</title>
@endsection
<!-- Main Content -->
@section('content')
    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">

                    <h2 class="font-bold">Forgot password</h2>

                    <p>
                        Enter your email address and a password reset link will be emailed to you.
                    </p>

                    <div class="row">

                        <div class="col-lg-12">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                            <form class="m-t" role="form" method="POST" action="{{ url('/password/email') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" placeholder="Email address" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>

                                <button type="submit" class="btn btn-primary block full-width m-b">Send Password Reset Link</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <small>Sujit Deshpande© 2016</small>
            </div>
        </div>
    </div>
@endsection
