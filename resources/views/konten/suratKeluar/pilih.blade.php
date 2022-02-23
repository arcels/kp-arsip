@extends('layout/main')
@section('konten')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center" style="font-size: 18pt;">
                <strong>PILIH JENIS SURAT KELUAR</strong>
            </div>
            <div class="form-group">
                <!-- Left Block -->
                <div class="col-md-6 card-body">

                    <form action="{{action('SuratKeluarController@pilih')}}" method="POST">
                        {{csrf_field()}}
                        <div class="input-group-btn">
                            <button type="submit" name="sk_rutin" value="custom" class="btn btn-outline-secondary col-md-12">SURAT KELUAR CUSTOM</button>
                        </div>

                    </form>
                    <!-- <a type="button" class="btn btn-outline-secondary col-md-12 " href="/surat-keluar/custom"> -->
                    <!-- SURAT KELUAR CUSTOM
                        </a> -->

                </div>
                <!-- Right Block -->
                <div class="">
                    <div class="card-body col-md-6">
                        <form action="{{action('SuratKeluarController@pilih')}}" method="POST">
                            {{csrf_field()}}
                            <div class="input-group">
                                <select name="sk_rutin" id="select" class="form-control">
                                    <option selected hidden value="" disabled>Pilih Surat Keluar Rutin</option>
                                    <option value="kp">Surat Kerja Praktek</option>
                                    <option value="ska">Surat Keterangan Asisten</option>
                                    <option value="m">Surat Keterangan Aktif Mahasiswa</option>
                                </select>
                                <div class="input-group-btn"><button class="btn btn-primary">Pilih</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center" style="font-size: 18pt;">
                <strong>LIST SURAT KELUAR </strong>
            </div>
            <div class="card-body card-block">
                @if (session('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-body table-responsive">
                    <table id="bootstrap-data-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Surat Keluar</th>
                                <th>Perihal Surat Keluar</th>
                                <th>Tanggal Surat Keluar</th>
                                <th>Kepada</th>
                                <th>Penanggung Jawab</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if( session('user_role') == 'Admin' )
                            @foreach($listSK as $list)

                            <tr>
                                <td>{{$list->sk_kode}}</td>
                                <td>{{$list->sk_title}}</td>
                                <td>{{$list->sk_tgl}}</td>
                                <td>{{$list->sk_kepada}}</td>
                                @foreach($listDosen as $d)
                                @if($d->id == $list->sk_penanggungjawab)
                                <td>{{$d->dosen_nama}}</td>
                                @endif
                                @endforeach

                                <td>
                                    <a data-toggle="modal" data-target="#modalDetail{{$list->id }}" class="btn btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @if ($list->sk_status == 0)
                                    <a data-toggle="modal" data-target="#modalUpload{{$list->id }}" class="btn btn-sm">
                                        <i class="fa fa-upload"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>

                            @endforeach

                            @else

                            @foreach($listSK as $list)

                            @if (session('id') == $list->sk_penanggungjawab)
                            
                            <tr>
                                <td>{{$list->sk_kode}}</td>
                                <td>{{$list->sk_title}}</td>
                                <td>{{$list->sk_tgl}}</td>
                                <td>{{$list->sk_kepada}}</td>
                                @foreach($listDosen as $d)
                                @if($d->id == $list->sk_penanggungjawab)
                                <td>{{$d->dosen_nama}}</td>
                                @endif
                                @endforeach
                                <td>
                                    <a data-toggle="modal" data-target="#modalDetail{{$list->id }}" class="btn btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @if ($list->sk_status == 0)
                                    <a data-toggle="modal" data-target="#modalUpload{{$list->id }}" class="btn btn-sm">
                                        <i class="fa fa-upload"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($listSK as $list)
<div class="modal fade " id="modalDetail{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">Detail Data Surat Keluar</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('PdfController@cetak',$list->id)}}" method="POST">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group" hidden>
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input class="form-control" name="id" value="{{$list->id}}">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kode Surat Keluar</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input class="form-control" name="sk_kode" value="{{$list->sk_kode}}" readonly>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Perihal Surat Keluar</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input class="form-control" name="sk_title" value="{{$list->sk_title}}" readonly>
                                </div>
                                <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Surat Keluar</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa  fa-calendar"></i></div>
                                    <input type="date" class="form-control" name="sk_tgl" value="{{$list->sk_tgl}}" readonly>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>


                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Kepada</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="email" class="form-control" name="sk_kepada" value="{{$list->sk_kepada}}" readonly>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Penanggung Jawab</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                    @foreach($listDosen as $d)
                                    @if($d->id == $list->sk_penanggungjawab)
                                    <input type="email" class="form-control" name="sk_penanggungjawab" value="{{$d->dosen_nama}}" readonly>
                                    @endif
                                    @endforeach

                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Status Surat Keluar</label>
                                @if($list->sk_status == 1)
                                <div class="input-group">
                                    <div class="input-group-addon"><i class=" fa-check-square-o" style="color: #158467;"></i></div>
                                    <input type="text" class="form-control" name="sk_status" value="Berkas Sudah Diupload" readonly>
                                </div>
                                @else
                                <div class="input-group" style="color: #ea5455;">
                                    <div class="input-group-addon"><i class="fa fa-times-circle"></i></div>
                                    <input type="text" class="form-control" name="sk_status" value="Berkas Belum Diupload" readonly>\
                                </div>
                                @endif


                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        @if ($list->sk_status == 1)
                        <img src="{{ asset('uploads/suratKeluar/'.$list->sk_upload)}}" style="border:solid 10px #000000; width: 50%;" alt="">


                        @endif

                    </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                <button type="submit" class="btn btn-sm btn-info">Download PDF</button>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>

            </div>
            </form>
        </div>
        <!-- </div> -->


    </div>
</div>
@endforeach
@foreach ($listSK as $list)
<div class="modal fade " id="modalUpload{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">Upload Dokumen Surat Keluar</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('SuratKeluarController@edit',$list->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col">
                            <div class="form-group" hidden>
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input class="form-control" name="id" value="{{$list->id}}">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Upload Dokumen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-upload"></i></div>
                                    <input type="file" class="form-control" name="sk_upload" required>
                                </div>
                                <!-- <small class="form-text text-muted">Silahakan mengupload dokumen yang sesuai dengan data yang dipilih yang telah di tandatangani</small> -->
                            </div>



                        </div>

                    </div>
                    <small class="form-text text-muted"><strong>NB: </strong> Silahkan mengupload dokumen yang telah ditandatangani sesuai dengan data yang dipilih</small>

            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                <button type="submit" class="btn btn-sm btn-info">Upload Dokumen</button>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
        <!-- </div> -->


    </div>
</div>
@endforeach
@endsection