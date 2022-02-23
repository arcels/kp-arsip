<!-- START PDF -->

<body style="background-color: white;">
    <div class="">
        <div class="">
            <div class="">
                <img src="{{ public_path('style/images/coop.png')}}" alt="" style="width: 100%;">
            </div>
            <div style="padding-top: 20px;">
                <br>
            </div>
            <div class="">
                <label style="padding-left: 30px;">
                    No
                    <label style=" padding-left:30px;">
                        :
                    </label>
                    <label>
                        {{$kp_count}}/{{$kp_kode}}/FISKOM/{{$kp_romawi}}/{{date('Y')}}
                    </label>
                    <label style="padding-left: 200px;">
                        Yogyakarta,
                        <label style="padding-left: 5px;">{{now()->format('d F Y')}}</label>
                    </label>
                </label>

            </div>
            <div>
                <label style="padding-left: 30px;">
                    Hal
                    <label style=" padding-left:28px;">
                        :
                    </label>
                    <label>
                        {{$kp_hal}}
                    </label>
                </label>
            </div>
            <p> </p>
            <br>
            <div>
                <label style="padding-left: 30px;">
                    Kepada Yth,
                </label>
            </div>
            <div>
                <label style="padding-left: 30px;">

                    Bpk/Ibu {{$kp_kepada}}</p>
            </div>
            <div>
                <label style="padding-left: 30px;">

                    Di Tempat,</p>
            </div>
            <div>
                <p style="padding-left: 30px;">

                    Dengan Hormat,
                </p>
                <p style="padding: 5px 30px; text-align: justify;">
                    Sehubungan dengan tugas matakuliah Kerja Praktek di Program Studi Informatika FISKOM Universitas Kristen Immanuel Yogyakarta, melalui surat ini kami memohon ijin bagi mahasiswa kami :
                </p>
                <p style="text-align: center; ">
                    {{$kp_mahasiswa}} / {{$kp_nim}}
                </p>
                <p style="padding: 5px 30px; text-align: justify;">
                    Untuk dapat melakukan kerja praktek di {{$kp_perusahaan}}.
                    Kami menunggu surat balasan dari Bapak/Ibu sebagai tanda bahwa mahasiswa kami diijinkan melakukan kerja praktek di {{$kp_perusahaan}} yang dilaksanakan pada Bulan {{date(' F Y', strtotime($kp_mulai))}}
                    sampai dengan Bulan {{date(' F Y', strtotime($kp_selesai))}} ({{$kp_durasi}}).
                    Surat Balasan dapat dikirimkan ke alamat email kami <a style="color: blue;">admfiskom@ukrim.ac.id</a>
                </p>
                <p style="padding: 5px 30px; text-align: justify;">
                Demikian permohonan kami, atas kerjasama Bapak/Ibu kami menyampaikan terimakasih.
                </p>
                <div style="padding-top: 30px;">
                    <p></p>
                </div>
                <p style="padding: 5px 30px; text-align: justify;">Hormat kami</p>
                <p style="padding: 5px 30px; text-align: justify;">Koordinator Kerja Praktek</p>
                <div style="padding-top: 70px;">
                    <br>
                </div>
                <p style="padding: 5px 30px; text-align: justify;">({{$kp_penanggungjawab}})</p>
            </div>
        </div>

    </div>


</body>



<!-- END PDF -->