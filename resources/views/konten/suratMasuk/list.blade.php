@extends('layout/main')
@section('konten')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>List Surat Masuk</strong>
        </div>
        <div class="card-body ">
            @if (session('status'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('error') }}
            </div>
            @endif

            <a type="button" data-toggle="modal" data-target="#modalAdd" class="btn btn-md float-right">
                <i class="fa fa-plus"></i> Tambah Surat Masuk</a>
        </div>

        <div class="card-body table-responsive">
            <table id="bootstrap-data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Surat Masuk</th>
                        <th>Keterangan Surat Masuk</th>
                        <th>Tanggal Surat Masuk</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    @if( session('user_role') == 'Admin' )
                    @foreach ($listSurat as $list)

                    <tr>
                        <td>{{$list->sm_kode}}</td>
                        <td>{{$list->sm_keterangan}}</td>
                        <td>{{$list->sm_tgl}}</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalDetail{{$list->id }}" class="btn btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                    @endif
                    @if(session('user_role') != 'Admin')
                    @foreach ($listSurat as $list)
                    @foreach ($listDetail as $d)
                    @if (session('id') == $d->sm_dosen)
                    <tr>
                        <td>{{$list->sm_kode}}</td>
                        <td>{{$list->sm_keterangan}}</td>
                        <td>{{$list->sm_tgl}}</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalDetail{{$list->id }}" class="btn btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>

                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- modal tambah -->
<div class="modal fade " id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">Tambah Data Surat Masuk</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('SuratMasukController@postSuratMasuk')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Kode Surat Masuk</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input class="form-control" name="sm_kode" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Keterangan Surat Masuk</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input class="form-control" name="sm_keterangan" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Surat Masuk</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-upload"></i></div>
                                    <input type="file" class="form-control" name="sm_upload" required>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Kirim Ke</label>
                                <div class="input-group">
                                    <select name="sm_dosen[]" id="select" class="form-control standardSelect" multiple data-placeholder="Kirim Ke" required>
                                        <!-- <option disabled selected hidden value="">Pilih Dosen</option> -->
                                        <option value="all">Semua Dosen</option>
                                        @foreach ($listDosen as $dosen)
                                        @if($dosen->dosen_status == 1)
                                        <option value="{{ $dosen->id }}">{{$dosen->dosen_nama}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" id="btn-tambah" class="btn btn-sm btn-info">Tambah Surat</button>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>

            </div>
            </form>
        </div>
        <!-- </div> -->


    </div>
</div>
<!-- modal details -->
@foreach ($listSurat as $list)
<div class="modal fade " id="modalDetail{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">View Detail Data Surat Masuk</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('DosenController@edit',$list->id)}}" method="POST">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group" hidden>
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input class="form-control" name="id" value="{{$list->id}}">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kode Surat Masuk</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input class="form-control" name="sm_kode" value="{{$list->sm_kode}}" readonly>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Keteragan Surat Masuk</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input class="form-control" name="sm_ket" value="{{$list->sm_keterangan}}" readonly>
                                </div>
                                <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Surat Masuk</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="email" class="form-control" name="sm_tgl" value="{{$list->sm_tgl}}" readonly>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kirim Surat Masuk Ke</label>
                                @foreach( $listDetail as $d)
                                @foreach($listDosen as $dosen)
                                @if($dosen->id == $d->sm_dosen && $list->id == $d->sm_id )
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="email" class="form-control" name="sm_dosen" value="{{$dosen->dosen_nama}} | {{$dosen->dosen_email}}" readonly>
                                </div>
                                @endif
                                @endforeach
                                @endforeach
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('uploads/suratMasuk/'.$list->sm_upload)}}" style="border:solid 10px #000000" alt="">

                            <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                <!-- <button type="submit" class="btn btn-sm btn-info">Update Data</button> -->
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>

            </div>
            </form>
        </div>
        <!-- </div> -->


    </div>
</div>
@endforeach
<script>
    $("#btn-tambah").on("click", function() {

        Swal.fire({
            imageUrl: "{{'style/images/loading.gif'}}",
            timer: 90000,
            showCancelButton: false,
            showConfirmButton: false
        })
    });
</script>
@endsection