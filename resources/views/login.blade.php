@extends('layout')

@section('title', 'Masuk')

@section('content')
    <div class="row">
        <div class="lg-12" align="center" style="margin-top:20%;">
            <a class="btn btn-lg bg-blue btn-social" href="{{url('auth/facebook')}}"><i class="fa fa-facebook"></i> <span>Masuk lewat Facebook</span></a>
            <br/><br/>
            <a class="btn btn-lg bg-light-blue btn-social" href="{{url('auth/twitter')}}"><i class="fa fa-twitter"></i> <span>Masuk lewat Twitter</span></a>
            <br/><br/>
            <h3>Kamu geek banget?</h3>
            <a class="btn btn-lg bg-black btn-social" href="{{url('auth/github')}}"><i class="fa fa-github"></i> <span>Masuk lewat Github</span></a>
        </div>
    </div>
@endsection
