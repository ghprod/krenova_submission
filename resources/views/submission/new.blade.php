@extends('layout')

@section('title', 'Kirim')

@section('content')
    <div class="row" style="margin: 20px;">
        <div class="lg-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post">
                <h1>Pengirim Cerita</h1>
                <div class="form-group">
                    <div style="width:200px;height:200px;overflow:hidden;border-radius:50%;text-align:center;vertical-align:middle;float:left;">
                        <img src="{{$userData->avatar}}" width="200" />
                    </div>
                    <div style="float:left;">
                        @if($userData->tw_nickname)
                            <a class="btn btn-lg bg-light-blue btn-social" href="https://twitter.com/{{$userData->tw_nickname}}"><i class="fa fa-twitter"></i> <span>{{'@'.$userData->tw_nickname}}</span></a>
                        @elseif($userData->fb_nickname)
                            <a class="btn btn-lg bg-blue btn-social" href="http://facebook.com/{{$userData->fb_nickname}}"><i class="fa fa-facebook"></i> <span>{{$userData->name}}</span></a>
                        @endif
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <hr/>
                <div class="form-group">
                    <label for="my_name">Nama*</label>
                    <input type="text" class="form-control" id="my_name" placeholder="Nama" value="{{$userData->name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="my_email">Email*</label>
                    <input type="email" class="form-control" id="my_email" placeholder="Email" value="{{$userData->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="my_phone">Nomor HP*</label>
                    <input type="text" class="form-control" id="my_phone" placeholder="08xxxxxxxxxx" name="my_phone" value="{{$userData->phone}}">
                </div>
                <div class="form-group">
                    <label for="my_address">Alamat</label>
                    <textarea class="form-control" id="my_address" placeholder="Alamat" name="my_address" rows="3">{{$userData->address}}</textarea>
                </div>
                <h1>Kreator / Inovator</h1>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" id="triggerCreatorValue">
                    Sama dengan pengirim
                  </label>
                </div>
                <div class="form-group">
                    <label for="creator_name">Nama*</label>
                    <input type="text" class="form-control" id="creator_name" name="creator_name" placeholder="Nama Kreator / Inovator">
                </div>
                <div class="form-group">
                    <label for="creator_phone">Nomor HP*</label>
                    <input type="text" class="form-control" id="creator_phone" placeholder="08xxxxxxxxxx" name="creator_phone">
                </div>
                <div class="form-group">
                    <label for="creator_address">Alamat</label>
                    <textarea class="form-control" id="creator_address" placeholder="Alamat" name="creator_address" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="village">Desa*</label>
                    <input type="text" class="form-control" id="village" placeholder="Desa" name="village">
                </div>
                <div class="form-group">
                    <label for="districts">Kecamatan*</label>
                    <input type="text" class="form-control" id="districts" placeholder="Kecamatan" name="districts">
                </div>
                <h1>Karya / Produk</h1>
                <div class="form-group">
                    <label for="product">Nama Karya / Produk*</label>
                    <input type="text" class="form-control" id="product" placeholder="Nama Produk" name="product">
                </div>
                <div class="form-group">
                    <label for="spec">Spesifikasi</label>
                    <textarea class="form-control" id="spec" placeholder="Spesifikasi" name="spec" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="benefit">Kegunaan / Manfaat</label>
                    <textarea class="form-control" id="benefit" placeholder="Kegunaan / Manfaat" name="benefit" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="full_story">Cerita Lengkap</label>
                    <textarea class="form-control" id="full_story" placeholder="Cerita Lengkap" name="full_story" rows="3"></textarea>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <button class="btn btn-lg btn-primary" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('bottom_js')
<script>
    $( "#triggerCreatorValue" ).click(function() {
        if($('#triggerCreatorValue').prop('checked', true)) {
            $('#creator_name').val($('#my_name').val());
            $('#creator_phone').val($('#my_phone').val());
            $('#creator_address').val($('#my_address').val());
        } else {
            alert('Tidak dipilih');
        }
    });
</script>
@endsection