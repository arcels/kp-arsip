<body>
    <div class="">
        <img src="{{ public_path('style/images/coop.png')}}" alt="" style="width: 100%;">
    </div>
    <div style="padding-top: 10px;">
        <br>
    </div>
    <div style="text-align: center; font-size: 14pt;">
        <div>
            <b><u>SURAT KETERANGAN</u></b>
        </div>
        <div style="padding-top: 0px;">
            <b>No: {{$m_no}}/{{$m_kode}}/FISKOM/{{$m_romawi}}/{{date('Y')}}</b>
        </div>
    </div>
    <p style="text-align: left; line-height: 1; margin-left: 140px;"><br></p>
    <p style="text-align: left; line-height: 1; margin-left: 140px;"><br></p>
    <p style="text-align: justify; line-height: 1;padding: 5px 60px;"><span>Dengan ini Dekan Fakultas Sains dan Komputer UKRIM Yogyakarta menerangkan bahwa:</span></p>
    <table style="width: 100%; margin-left: calc(15%); margin-right: calc(16%); padding: 5px 60px; ">
        <tbody>
            <tr>
                <td style="width: 40%;"><span>Nama</span></td>
                <td style="width: 5%; text-align: center;"><span>:</span></td>
                <td style="width: 50%;"><span>{{$m_mahasiswa}}<br></span></td>
            </tr>
            <tr>
                <td style="width: 40%;"><span>Alamat</span></td>
                <td style="width: 5%; text-align: center;"><span>:</span></td>
                <td style="width: 50%;"><span>{{$m_alamat}}<br></span></td>
            </tr>
            <tr>
                <td style="width: 40%;"><span>Program Studi</span></td>
                <td style="width: 5%; text-align: center;"><span>:</span></td>
                <td style="width: 50%;"><span>{{$m_prodi}}<br></span></td>
            </tr>
            <tr>
                <td style="width: 40%;"><span>Nomor Induk Mahasiswa (NIM)</span></td>
                <td style="width: 5%; text-align: center;"><span>:</span></td>
                <td style="width: 50%;"><span>{{$m_nim}}<br></span></td>
            </tr>
            <tr>
                <td style="width: 40%;"><span>Tahun Akademik</span></td>
                <td style="width: 5%; text-align: center;"><span>:</span></td>
                <td style="width: 50%;"><span>{{$m_tahun}}<br></span></td>
            </tr>
        </tbody>
    </table>
    <p style="margin-left: 100px; line-height: 1;"><br></p>
    <p style="text-align: justify; line-height: 1; padding: 5px 60px;">Adalah benar-benar mahasiswa Program Studi Informatika dan sampai dengan semester Gasal 2020/2021 masih aktif kuliah.&nbsp;
        {{$m_keperluan}}</p>
    <p style="line-height: 1;"><br></p>
    <p style="line-height: 1;"><br></p>
    <p style="line-height: 1; text-align: right;"><span style=" padding: 5px 60px;">Yogyakarta, {{now()->format('d/m/Y')}}</span></p>
    <table style="width: 100%; padding: 5px 60px;">
        <tbody>
            <tr>
                <td style="width: 71.7002%;"><br></td>
                <td style="width: 28.1879%; text-align: center;"><span>Dekan FISKOM</span></td>
            </tr>
            <tr>
                <td style="width: 71.7002%;"><span><br></span></td>
                <td style="width: 28.1879%;"><span><br></span></td>
            </tr>
            <tr>
                <td style="width: 71.7002%;"><span><br></span></td>
                <td style="width: 28.1879%;"><span><br></span></td>
            </tr>
            <tr>
                <td style="width: 71.7002%;"><span><br></span></td>
                <td style="width: 28.1879%;"><span><br></span></td>
            </tr>
            <tr>
                <td style="width: 71.7002%;"><span><br></span></td>
                <td style="width: 28.1879%;"><span><br></span></td>
            </tr>
            <tr>
                <td style="width: 71.7002%;"><span><br></span></td>
                <td style="width: 28.1879%; text-align: center;"><span>({{$m_pj}})</span></td>
            </tr>
        </tbody>
    </table>
</body>