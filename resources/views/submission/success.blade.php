@extends('layout')

@section('title', 'Berhasil')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col" align="center" style="margin:auto;">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Selesai</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    Data Anda berhasili dikirim untuk dimoderasi.
                </div>
                <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="{{url('auth/logout')}}">
                  Keluar
                </a>
              </div>
            </div>
        </div>
    </div>
@endsection