@extends('layout')

@section('title', 'Masuk')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col" align="center" style="margin:auto;">
            <h3>Masuk</h3>
            <a class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect bg-blue btn-social" href="{{url('auth/facebook')}}"><i class="fa fa-facebook"></i> | <span>Masuk lewat Facebook</span></a>
            <br/><br/>
            <a class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect bg-light-blue btn-social" href="{{url('auth/twitter')}}"><i class="fa fa-twitter"></i> | <span>Masuk lewat Twitter</span></a>
            <br/><br/>
            <h3>Kamu geek banget?</h3>
            <a class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect bg-black btn-social" href="{{url('auth/github')}}"><i class="fa fa-github"></i> | <span>Masuk lewat Github</span></a>
        </div>
    </div>
@endsection
