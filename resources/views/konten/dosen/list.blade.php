@extends('layout/main')
@section('konten')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>List Data Dosen</strong>
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
                <i class="fa fa-plus"></i> Tambah Data Dosen</a>
        </div>

        <div class="card-body table-responsive">
            <table id="bootstrap-data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIDN Dosen</th>
                        <th>Nama Dosen</th>
                        <th>Dosen Prodi</th>
                        <th>Jabatan Dosen</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($listDosen as $list)
                    @if($list->dosen_status == 1)
                    @if($list->prodi->prodi_status == 1)
                    <tr>
                        <td>{{$list->dosen_nidn}}</td>
                        <td>{{$list->dosen_nama}}</td>
                        <td>{{$list->prodi->prodi_nama}}</td>
                        @if ($list->dosen_jabatan == 'WD')
                        <td> Wakil Dekan</td>
                        @else
                        <td>{{$list->dosen_jabatan}}</td>
                        @endif
                        <td>
                            <a data-toggle="modal" data-target="#modalDetail{{$list->id }}" class="btn btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <!-- <a href="{{url('dosen/edit', $list['id'])}}" class="btn btn-sm">
                                <i class="fa fa-edit"></i>
                            </a> -->
                            <a data-toggle="modal" data-target="#modalHapus{{$list->id }}" class="btn btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endif
                    @endforeach
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
                <h5 class="p-b-5"><span class="semi-bold">Tambah Data Dosen</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('DosenController@add')}}" method="POST">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Nidn Dosen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input class="form-control" name="dosen_nidn" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nama Dosen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input class="form-control" name="dosen_nama" required>
                                </div>
                                <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Email Dosen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="email" class="form-control" name="dosen_email" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Jabatan Dosen</label>
                                <div class="input-group">
                                    <select name="dosen_jabatan" id="select" class="form-control" required>
                                        <option disabled selected hidden value="">Pilih Jabatan</option>
                                        <option value="Dekan">Dekan</option>
                                        <option value="Kaparodi">Kaprodi</option>
                                        <option value="WD">Wakil Dekan</option>
                                        <option value="Dosen">Dosen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Dosen Prodi</label>
                                <div class="input-group">
                                    <select name="prodi_id" class="form-control" required>
                                        <option disabled selected hidden>Pilih Prodi</option>
                                        @foreach ($listProdi as $prodi)
                                        @if($prodi->prodi_status == 1)
                                        <option value="{{ $prodi->id }}">{{$prodi->prodi_nama}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                <button type="submit" class="btn btn-tambah btn-sm btn-info">Tambah Data</button>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>

            </div>
            </form>
        </div>
        <!-- </div> -->


    </div>
</div>
<!-- modal end -->

<!-- modal edit -->
@foreach ($listDosen as $list)
<div class="modal fade " id="modalDetail{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">Edit Data Dosen</span></h5>
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
                                <label class=" form-control-label">Nidn Dosen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input class="form-control" name="dosen_nidn" value="{{$list->dosen_nidn}}" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nama Dosen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input class="form-control" name="dosen_nama" value="{{$list->dosen_nama}}" required>
                                </div>
                                <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Email Dosen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="email" class="form-control" name="dosen_email" value="{{$list->dosen_email}}" required>
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Jabatan Dosen</label>
                                <div class="input-group">
                                    <select name="dosen_jabatan" id="select" class="form-control" required>
                                        <option disabled selected hidden value="">Pilih Jabatan</option>
                                        <option value="Dekan" @if ($list->dosen_jabatan === "Dekan")
                                            selected
                                            @endif >Dekan</option>
                                        <option value="Kaparodi" @if ($list->dosen_jabatan === "Kaparodi")
                                            selected
                                            @endif>Kaprodi</option>
                                        <option value="WD" @if ($list->dosen_jabatan === "WD")
                                            selected
                                            @endif>Wakil Dekan</option>
                                        <option value="Dosen" @if ($list->dosen_jabatan === "Dosen")
                                            selected
                                            @endif>Dosen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Dosen Prodi</label>
                                <div class="input-group">
                                    <select name="prodi_id" class="form-control" required>
                                        <option disabled selected hidden>Pilih Prodi</option>
                                        @foreach ($listProdi as $prodi)
                                        @if($list->prodi->prodi_status == 1)
                                        <option value="{{ $prodi->id }}" @if ($prodi->id === $list->prodi_id)
                                            selected
                                            @endif
                                            >
                                            {{$prodi->prodi_nama}}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                <button type="submit" class="btn btn-tambah btn-sm btn-info">Update Data</button>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>

            </div>
            </form>
        </div>
        <!-- </div> -->


    </div>
</div>
@endforeach
<!-- modal end -->

<!-- modal hapus -->
@foreach ($listDosen as $list)
<div class="modal fade " id="modalHapus{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">Hapus Data Dosen</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('DosenController@hapus',$list->id)}}" method="POST">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group" hidden>
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input readonly class="form-control" name="id" value="{{$list->id}}">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nidn Dosen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input readonly class="form-control" name="dosen_nidn" value="{{$list->dosen_nidn}}">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nama Dosen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input readonly class="form-control" name="dosen_nama" value="{{$list->dosen_nama}}">
                                </div>
                                <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Email Dosen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input readonly type="email" class="form-control" name="dosen_email" value="{{$list->dosen_email}}">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class=" form-control-label">Jabatan Dosen</label>
                                <div class="input-group">
                                    <select disabled name="dosen_jabatan" id="select" class="form-control">
                                        <option disabled selected hidden value="">Pilih Jabatan</option>
                                        <option value="Dekan" @if ($list->dosen_jabatan === "Dekan")
                                            selected
                                            @endif >Dekan</option>
                                        <option value="Kaparodi" @if ($list->dosen_jabatan === "Kaparodi")
                                            selected
                                            @endif>Kaprodi</option>
                                        <option value="WD" @if ($list->dosen_jabatan === "WD")
                                            selected
                                            @endif>Wakil Dekan</option>
                                        <option value="Dosen" @if ($list->dosen_jabatan === "Dosen")
                                            selected
                                            @endif>Dosen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Dosen Prodi</label>
                                <div class="input-group">
                                    <select disabled name="prodi_id" class="form-control">
                                        <option disabled selected hidden>Pilih Prodi</option>
                                        @foreach ($listProdi as $prodi)
                                        @if($list->prodi->prodi_status == 1)
                                        <option value="{{ $prodi->id }}" @if ($prodi->id === $list->prodi_id)
                                            selected
                                            @endif
                                            >
                                            {{$prodi->prodi_nama}}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                        </div>
                    </div>
                    <input class="form-control" hidden name="dosen_status" value="0">

            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                <button type="submit" class="btn btn-tambah btn-sm btn-info">Delete Data</button>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>

            </div>
            </form>
        </div>
        <!-- </div> -->


    </div>
</div>
@endforeach
<!-- modal end -->
<script>
    $(".btn-tambah").on("click", function() {

        Swal.fire({
            imageUrl: "{{'style/images/loading.gif'}}",
            timer: 90000,
            showCancelButton: false,
            showConfirmButton: false
        })
    });
</script>
@endsection