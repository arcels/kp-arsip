<body style="background-color: white;">

    <div class="">
        <div class="">
            <div class="">
                <img src="{{ public_path('style/images/coop.png')}}" alt="" style="width: 100%;">
            </div>
            <div style="padding-top: 20px;">
                <br>
            </div>
            <div style="text-align: left; font-size: 14pt;">
                <div style="padding: 0px 45px;">
                    @if ($c_kpj == null)
                    No: {{$c_no}}/{{$c_kode}}/FISKOM/{{$c_romawi}}/{{date('Y')}}
                    @else
                    No: {{$c_no}}/{{$c_kode}}/{{$c_kpj}}/FISKOM/{{$c_romawi}}/{{date('Y')}}
                    @endif
                </div>
                <div style="padding:0px 45px;">
                    Hal : {{$c_title}}
                </div>
            </div>
        </div>
        <div style="padding: 5px 45px;">
            {!!$c_isi!!}
        </div>
    </div>
</body>