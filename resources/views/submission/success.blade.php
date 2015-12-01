@extends('layout')

@section('title', 'Berhasil')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success" role="alert" align="center">
                <strong>Selesai!</strong> Data Anda berhasil dikirim untuk dimoderasi.<br/><a href="{{url('auth/logout')}}" class="alert-link">Keluar</a>
            </div>
        </div>
    </div>
@endsection