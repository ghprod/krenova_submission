@extends('layout')

@section('title', 'Kirim')

@section('content')
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col" align="center" style="margin:auto;">
        @if (count($errors) > 0)
            <div class="demo-card-square mdl-card mdl-shadow--2dp modal" id="error_box">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">ERROR</h2>
                </div>
                <div class="mdl-card__supporting-text" align="left">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="close_error">OK</a>
                </div>
            </div>
        @endif
         <form method="post">
            <h3>Pengirim Cerita</h3>
            <div style="width:100px;height:100px;overflow:hidden;border-radius:50%;text-align:center;vertical-align:middle;">
                <img src="{{$userData->avatar}}" width="100" />
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="my_name" value="{{$userData->name}}" disabled>
                <label class="mdl-textfield__label" for="my_name">Nama</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="my_email" value="{{$userData->email}}" disabled>
                <label class="mdl-textfield__label" for="my_email">Email</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="my_phone" value="{{$userData->phone}}" name="my_phone">
                <label class="mdl-textfield__label" for="my_phone">Nomor HP</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" type="text" rows= "3" id="my_address" >{{$userData->address}}</textarea>
                <label class="mdl-textfield__label" for="my_address">Alamat</label>
            </div>
            <h3>Kreator / Inovator</h3>
            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-2" align="left">
                <input type="checkbox" id="switch-2" class="mdl-switch__input triggerCreatorValue">
                <span class="mdl-switch__label">Sama dengan Pengirim Cerita</span>
            </label>
            <div class="mdl-textfield mdl-js-textfield">
                <input type="text" class="mdl-textfield__input" id="creator_name" name="creator_name">
                <label for="creator_name" class="mdl-textfield__label" id="label_creator_name">Nama*</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input type="text" class="mdl-textfield__input" id="creator_phone" name="creator_phone">
                <label for="creator_phone" class="mdl-textfield__label" id="label_creator_phone">Nomor HP*</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" id="creator_address" name="creator_address" rows="3"></textarea>
                <label for="creator_address" class="mdl-textfield__label" id="label_creator_address">Alamat</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input type="text" class="mdl-textfield__input" id="village" name="village">
                <label for="village" class="mdl-textfield__label">Desa*</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input type="text" class="mdl-textfield__input" id="districts" name="districts">
                <label for="districts" class="mdl-textfield__label">Kecamatan*</label>
            </div>
            <h3>Karya / Produk</h3>
            <div class="mdl-textfield mdl-js-textfield">
                <input type="text" class="mdl-textfield__input" id="product" name="product">
                <label for="product" class="mdl-textfield__label">Nama Karya / Produk*</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" id="spec" name="spec" rows="3"></textarea>
                <label for="spec" class="mdl-textfield__label">Spesifikasi</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" id="benefit" name="benefit" rows="3"></textarea>
                <label for="benefit" class="mdl-textfield__label">Kegunaan / Manfaat</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" id="full_story" name="full_story" rows="3"></textarea>
                <label for="full_story" class="mdl-textfield__label">Cerita Lengkap</label>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br/><br/>
            <div align="right">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored submit_float" id="submit">
                    <i class="material-icons">send</i>
                </button>
                <div class="mdl-tooltip" for="submit">
                    Kirim
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('bottom_js')
<script>
    $( ".triggerCreatorValue" ).click(function() {
        if($('.triggerCreatorValue').prop('checked', true)) {
            $('#creator_name').val($('#my_name').val());
            $('#creator_phone').val($('#my_phone').val());
            $('#creator_address').val($('#my_address').val());
            $('#label_creator_name').empty();
            $('#label_creator_phone').empty();
            $('#label_creator_address').empty();
        } else {
            alert('Tidak dipilih');
        }
    });

    $('#close_error').click(function() {
        $('#error_box').hide();
    });
</script>
@endsection