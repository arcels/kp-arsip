<body style="background-color: white;">
    <div class="">
        <div class="">
            <div class="">
                <img src="{{ public_path('style/images/coop.png')}}" alt="" style="width: 100%;">
            </div>
            <div style="padding-top: 10px;">
                <br>
            </div>
            <div style="text-align: center; font-size: 14pt;">
                <div>
                    <b><u>{{$as_title}}</u></b>
                </div>
                <div style="padding-top: 0px;">
                    <b>No: {{$as_no}}/{{$as_kode}}/FISKOM/{{$as_romawi}}/{{date('Y')}}</b>
                </div>
            </div>
            <div style="padding-top: 20px;">
                <div style="padding: 5px 30px">
                    <p>Melalui surat ini program studi Informatika Fakultas Sains dan Komputer Universitas Kristen Immanuel, menerangkan bahwa mahasiswa dengan identitas sebagai berikut:</p>
                </div>
                <div style="padding: 0px 45px;">
                    <label>Nama</label><label style="padding-left: 83px;">:</label><label style="padding-left: 15px;">{{$as_nama}}</label>
                </div>
                <div style="padding: 0px 45px;">
                    <label>NIM </label><label style="padding-left: 87px;">:</label><label style="padding-left: 15px;">{{$as_nim}}</label>
                </div>
                <div style="padding: 0px 45px;">
                    <label>Program Studi </label><label style="padding-left: 26px;">:</label><label style="padding-left: 15px;">{{$as_prodi}}</label>
                </div>
                <div>
                    <p></p>
                </div>
                <div style="padding: 5px 30px;">
                    <p>Adalah benar sebagai asisten di luar matakuliah tugas khusus yang membantu pada matakuliah:</p>
                </div>
                <div style="padding: 0px 45px;">
                    <label>Nama Matakuliah</label><label style="padding-left: 10px;">:</label><label style="padding-left: 15px;">{{$as_makul}}</label>
                </div>
                <div style="padding: 0px 45px;">
                    <label>Kelas </label><label style="padding-left: 85px;">:</label><label style="padding-left: 15px;">{{$as_kelas}}</label>
                </div>
                <div style="padding: 0px 45px;">
                    <label>Dosen Pengampu </label><label style="padding-left: 10px;">:</label><label style="padding-left: 15px;">{{$as_kepada}}</label>
                </div>
                <div style="padding: 0px 45px;">
                    <label>Semester </label><label style="padding-left: 63px;">:</label><label style="padding-left: 15px;">{{$as_semester}}</label>
                </div>
                <div style="padding: 0px 45px;">
                    <label>Tahun Akademik </label><label style="padding-left: 10px;">:</label><label style="padding-left: 15px;">{{$as_tahun}}</label>
                </div>
                <div>
                    <p></p>
                </div>
                <div style="padding: 5px 30px;">
                    <p>
                        Demikian surat keterangan ini dibuat, agar dapat dimanfaatkan dengan sebaik-baiknya.
                    </p>
                </div>
                <div style="padding: 5px 30px; text-align: right;">
                    <p>Yogyakarta, {{now()->format('d/m/Y')}}</p>
                </div>
                <div style="padding: 5px 45px;">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <td style="width: 50.0000%;">Mengetahui,</td>
                                <td style="width: 50.0000%;"><br></td>
                            </tr>
                            <tr>
                                <td style="width: 65.0000%;">Dosen Pengampu Matakuliah</td>
                                <td style="width: 35.0000%;">Kepala Program Studi Informatika</td>
                            </tr>
                            <tr>
                                <td style="width: 50.0000%;"><br></td>
                                <td style="width: 50.0000%;"><br></td>
                            </tr>
                            <tr>
                                <td style="width: 50.0000%;"><br></td>
                                <td style="width: 50.0000%;"><br></td>
                            </tr>
                            <tr>
                                <td style="width: 50.0000%;"><br></td>
                                <td style="width: 50.0000%;"><br></td>
                            </tr>
                            <tr>
                                <td style="width: 65.0000%;">{{$as_kepada}}</td>
                                <td style="width: 35.0000%;">{{$as_pj}}</td>
                            </tr>
                            <tr>
                                <td style="width: 65.0000%;">Nidn : {{$as_nidn}}</td>
                                <td style="width: 35.0000%;">Nidn : {{$as_pj_nidn}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>