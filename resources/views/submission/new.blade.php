@extends('layout')

@section('title', 'Kirim')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 content">
            <h1 align="center">Formulir Peserta Festival Krenova</h1>
            
            <hr>

            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" enctype="multipart/form-data">
                <div style="width:100px;height:100px;overflow:hidden;border-radius:50%;text-align:center;vertical-align:middle;margin-right:10px;float:left;">
                    <img src="{{ session('user')->avatar }}" width="100" />
                </div>
                <div style="float:left;">
                    <h3>{{ session('user')->name }}</h3>

                    @if (session('user')->tw_nickname)
                        <a class="btn btn-lg bg-light-blue btn-social" href="https://twitter.com/{{$userData->tw_nickname}}"><i class="fa fa-twitter"></i> <span>{{'@'.$userData->tw_nickname}}</span></a>
                    @elseif (session('user')->fb_nickname)
                        <a class="btn btn-lg bg-blue btn-social" href="http://facebook.com/{{$userData->fb_nickname}}"><i class="fa fa-facebook"></i> <span>{{$userData->name}}</span></a>
                    @endif
                </div>
                
                <div class="clearfix"></div>
                
                <hr>

                <h3>BIODATA Pengirim Data</h3>
                
                <hr>

                <div class="form-group">
                    <label for="my_name">Nama Lengkap *</label>
                    <input type="text" class="form-control" id="my_name" name="my_name" placeholder="Nama Lengkap" value="{{ session('user')->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="my_email">Email *</label>
                    <input type="email" 
                        class="form-control" 
                        id="my_email" 
                        name="my_email" 
                        placeholder="Email" 
                        value="{{ session('user')->email }}" 
                        {{ session('user')->email ? 'disabled' : '' }}
                    >
                </div>
                <div class="form-group">
                    <label for="my_phone">Nomor HP *</label>
                    <input type="text" class="form-control" id="my_phone" name="my_phone" placeholder="Nomor HP" value="{{ session('user')->phone }}">
                </div>
                <div class="form-group">
                    <label for="my_address">Alamat</label>
                    <textarea class="form-control" id="my_address" name="my_address" placeholder="Alamat" rows="3">{{ session('user')->address }}</textarea>
                </div>
                <h3>
                    BIODATA Kreator/Inovator&nbsp;
                    <small>
                        <input type="checkbox" id="triggerCreatorValue"> Sama dengan pengirim data
                    </small>
                </h3>
                
                <hr>

                <div class="form-group">
                    <label for="creator_name">Nama Lengkap *</label>
                    <input type="text" class="form-control" id="creator_name" name="creator_name" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="creator_phone">Nomor HP *</label>
                    <input type="text" class="form-control" id="creator_phone" name="creator_phone" placeholder="Nomor HP">
                </div>
                <div class="form-group">
                    <label for="creator_address">Alamat</label>
                    <textarea class="form-control" id="creator_address" name="creator_address" placeholder="Alamat" rows="3"></textarea>
                </div>
                <h3>Data Karya</h3>
                
                <hr>

                <div class="form-group">
                    <label for="product">Nama/Judul Karya *</label>
                    <input type="text" class="form-control" id="product" name="product" placeholder="Nama/Judul Karya">
                </div>
                <div class="form-group">
                    <label>Ide Sendiri atau Terinspirasi dari Karya Lain?</label>
                    <br/>
                    <label class="radio-inline">
                        <input type="radio" id="ide_sendiri" name="inspire" checked> Ide Sendiri
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="inspire" id="terinspirasi"> Terinspirasi dari Karya Lain
                    </label>
                </div>
                <div class="form-group" style="display:none;" id="inspirator_group">
                    <label for="inspirator">Sebutkan Karya Sejenis</label>
                    <input type="text" class="form-control" id="insporator" name="inspirator">
                </div>
                <div class="form-group">
                    <label for="problem">Masalah Apa yang Jadi Alasan Membuat Karya ini?</label>
                    <textarea class="form-control" id="problem" name="problem" placeholder="Ceritakan di sini..." rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="since">Sejak Kapan Karya ini Dibuat?</label>
                    <input type="text" class="form-control" id="since" name="since" placeholder="Sejak Kapan Karya ini Dibuat?">
                </div>
                <div class="form-group">
                    <label>Karya ini Sudah Diterapkan atau Belum?</label>
                    <br/>
                    <label class="radio-inline">
                        <input type="radio" id="sudah_diterapkan" name="applied" checked> Sudah
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="applied" id="belum_diterapkan"> Belum
                    </label>
                </div>
                <div class="form-group" id="applied_group">
                    <label for="applied_at">Di Mana Saja Diterapkannya?</label>
                    <input type="text" class="form-control" id="applied_at" name="applied_at" placeholder="Ceritakan di sini...">
                </div>
                <div class="form-group">
                    <label for="benefit">Ceritakan Manfaat Apa Saja yang Didapat Masyarakat dari Karya ini!</label>
                    <textarea class="form-control" id="benefit" name="benefit" placeholder="Ceritakan di sini..." rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="obstacles">Apa Kendala yang Dihadapi Selama ini?</label>
                    <textarea class="form-control" id="obstacles" name="obstacles" placeholder="Ceritakan di sini" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="support_expectations">Apa Harapan Dukungan dari Pihak Lain untuk Karya ini?</label>
                    <textarea class="form-control" id="support_expectations" name="support_expectations" placeholder="Ceritakan di sini..." rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" id="image" name="image">
                    <p class="help-block">Unggah gambar pendukung (kalau ada).</p>
                </div>
                 <div class="form-group">
                    <label for="video">Video</label>
                    <input type="file" id="video" name="video">
                    <p class="help-block">Unggah video pendukung (kalau ada).</p>
                </div>
                <div class="form-group">
                    <label for="image_url">URL Gambar</label>
                    <input type="text" class="form-control" id="image_url" name="image_url" placeholder="http://">
                </div>
                <div class="form-group">
                    <label for="video_url">URL Video</label>
                    <input type="text" class="form-control" id="video_url" name="video_url" placeholder="http://">
                </div>
                <div class="form-group" align="right">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-default">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('bottom_js')
    <script>
        (function (window, $, undefined) {
            $(function () {
                // set as global val
                var creatorName = $('#creator_name')
                var creatorPhone = $('#creator_phone')
                var creatorAddress = $('#creator_address')

                // save as data
                creatorName.data('original-value', creatorName.val())
                creatorPhone.data('original-value', creatorPhone.val())
                creatorAddress.data('original-value', creatorAddress.val())

                $(document).on('change', '#triggerCreatorValue', function (e) {
                    var self = $(this)

                    if (self.is(':checked')) {
                        creatorName.val($('#my_name').val())
                        creatorPhone.val($('#my_phone').val())
                        creatorAddress.val($('#my_address').val())
                    } else {
                        creatorName.val(creatorName.data('original-value'))
                        creatorPhone.val(creatorPhone.data('original-value'))
                        creatorAddress.val(creatorAddress.data('original-value'))
                    }
                })

                $('#close_error').click(function() {
                    $('#error_box').hide();
                });

                $('#terinspirasi').click(function() {
                    $('#inspirator_group').fadeIn('slow');
                });

                $('#ide_sendiri').click(function() {
                    $('#inspirator_group').fadeOut('slow');
                });

                $('#sudah_diterapkan').click(function() {
                    $('#applied_group').fadeIn('slow');
                });

                $('#belum_diterapkan').click(function() {
                    $('#applied_group').fadeOut('slow');
                });
            })
        })(window, jQuery)
    </script>
@endsection