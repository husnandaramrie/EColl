@extends('layouts.frontend.app',[
    'title' => 'Home',
])
@section('content')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area bg-img bg-overlay-2by5" style="background-image: url({{ asset('img/bg') }}/bg1.png);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <!-- Hero Content -->
                <div class="hero-content text-center">
                    <h2>Selamat Datang di ECollection</h2>
                    {{-- <a href="#" class="btn clever-btn"></a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Hero Area End ##### -->

<div class="regular-page-area section-padding-100 mt-5 mb-4">
    <div class="col-lg-9 mx-auto">
        <div class="card">
            <div class="card-header">ECollection</div>
            <div class="card-body">
                <p class="lead">
                    Ecollector merupakan aplikasi yang digunakan untuk melakukan
                    transaksi setoran tabungan, penarikan tabungan dan angsuran
                    kredit dengan menggunakan perangkat smartphone android dan
                    printer portable sebagai media untuk mencetak bukti transaksi.
                </p>
            </div>
        </div>
    </div>
</div>

@stop