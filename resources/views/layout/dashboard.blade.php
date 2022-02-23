@extends('layout/main')
@section('konten')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="card" style="text-align: center;">
                @php
                $nama = Session::get('user_pengguna');
                @endphp
                <div class="card-body" style="justify-content: center; padding-top: 10%;">
                    <img src="{{ asset('style/images/logo.png') }}" style="width: 10%;">
                </div>
                <div class="card-body" style="font-family: serif;">

                    <h1>
                        Welcome, @php echo($nama) @endphp
                    </h1>
                    <h3>
                        Sistem Informasi Kearsipan Fiskom
                    </h3>

                </div>
                <div class="card-body" style="padding-top:18% ;">

                </div>
                <div class="card-footer" style="font-family: sans-serif;">
                    <small style="text-align: center;">
                        <b>COPY RIGHT 2020</b>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection