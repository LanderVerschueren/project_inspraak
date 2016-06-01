@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6" id="login">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Login</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Paswoord</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="Paswoord">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Onthoud mij
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-raised btn-default">
                                    <i class="fa fa-btn fa-sign-in"></i>Inloggen
                                </button>

                                <a class="btn btn-raised btn-link" href="{{ url('/password/reset') }}">Paswoord vergeten?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="login_register">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Profiel aanmaken</h4>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>Nog geen profiel?</li>
                        <li>Maak nu een profiel aan om projecten te kunnen volgen!</li>
                        <li>
                            <a href="{{ url('/register') }}" class="btn btn-raised btn-default" role="button">
                                <i class="fa fa-btn fa-user"></i>Registreren
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
