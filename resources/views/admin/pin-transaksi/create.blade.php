@extends('layouts.backend.app',[
    'title' => 'PIN Transaksi',
    'contentTitle' => 'PIN Transaksi'
])

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote') }}/summernote-bs4.min.css">
@endpush

@section('content')
<div class="">    
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.pintransaksi.index') }}" class="btn btn-success btn-sm">Kembali</a>
        </div>
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.pintransaksi.store') }}">
            @csrf
            <div class="form-group">
                <label for="no">No</label>
                <input required="" type="" name="no" placeholder="" class="form-control title"> 
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <textarea required="" name="username" id="username" class="form-controltext-dark form-control summernote"></textarea>
            </div>
            <div class="form-group">
                <label for="kantor">Kantor</label>
                <textarea required="" name="kantor" id="kantor" class="form-controltext-dark form-control summernote"></textarea>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <textarea required="" name="tanggal" id="tanggal" class="form-controltext-dark form-control summernote"></textarea>
            </div>
            <div class="form-group">
                <label for="pin">PIN</label>
                <textarea required="" name="pin" id="pin classes="form-controltext-dark form-control summernote"></textarea>
            </div>
            <div class="form-group">
                <label for="limit">Limit</label>
                <textarea required="" name="limit" id="limit" class="form-control text-dark form-control summernote"></textarea>
            </div>
            <div class="form-group">
                <label for="waktumax">Waktu Max</label>
                <textarea required="" name="waktumax" id="waktumax" class="form-control text-dark form-control summernote"></textarea>
            </div>
            <div class="form-group">
                <label for="saldoawal">Saldo Awal</label>
                <textarea required="" name="saldoawal" id="saldoawal" class="form-control text-dark form-control summernote"></textarea>
            </div>
            <div class="form-group">
                <label for="saldoakhir">Saldo Awal</label>
                <textarea required="" name="saldoakhir" id="saldoakhir" class="form-control text-dark form-control summernote"></textarea>
            </div>
            <div class="form-group">
                <label for="kodeopen">Kode Open</label>
                <textarea required="" name="kodeopen" id="kodeopen" class="form-control text-dark form-control summernote"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">UPLOAD</button>    
            </div> 
        </div>
        </form>
    </div>
</div>
@stop

@push('js')
<script type="text/javascript" src="{{ asset('plugins/summernote') }}/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $(".summernote").summernote({
        height:500,
        callbacks: {
        // callback for pasting text only (no formatting)
            onPaste: function (e) {
              var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
              e.preventDefault();
              bufferText = bufferText.replace(/\r?\n/g, '<br>');
              document.execCommand('insertHtml', false, bufferText);
            }
        }
    })

    $(".summernote").on("summernote.enter", function(we, e) {
        $(this).summernote("pasteHTML", "<br><br>");
        e.preventDefault();
    });
</script>
@endpush