@extends('layout/main')
@section('konten')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>List Data Kategori</strong>
        </div>
        <div class="card-body ">
            @if (session('status'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }}
            </div>
            @endif

            <a type="button" data-toggle="modal" data-target="#modalAdd" class="btn btn-md float-right">
                <i class="fa fa-plus"></i> Tambah Data Kategori</a>
        </div>

        <div class="card-body table-responsive">
            <table id="bootstrap-data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Kategori</th>
                        <th>Keterangan Kategori</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($listKategori as $list)
                    @if($list->ks_status == 1)
                    <tr>
                        <td>{{$list->ks_kode}}</td>
                        <td>{{$list->ks_keterangan}}</td>
                        <td>
                            <a data-toggle="modal" data-target="#modalDetail{{$list->id }}" class="btn btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            
                            <a data-toggle="modal" data-target="#modalHapus{{$list->id }}" class="btn btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- modal tambah -->
<div class="modal fade " id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">Tambah Data Kategori</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('KategoriSuratController@add')}}" method="POST">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label">Kode Kategori</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input class="form-control" name="ks_kode">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Keterangan Kategori</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input class="form-control" name="ks_keterangan">
                                </div>
                                <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                        <button type="submit" class="btn btn-sm btn-info">Tambah Data</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>

                    </div>
                </form>
            </div>
            <!-- </div> -->


        </div>
    </div>

</div>
<!-- modal edit -->
@foreach ($listKategori as $list)
<div class="modal fade " id="modalDetail{{$list->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">Detail Kategori</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('KategoriSuratController@edit',$list->id)}}" method="POST">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group" hidden>
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input class="form-control" name="id" value="{{$list->id}}">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kode Kategori</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input class="form-control" name="ks_kode" value="{{$list->ks_kode}}">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Keterangan Kategori</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input class="form-control" name="ks_keterangan" value="{{$list->ks_keterangan}}">
                                </div>
                                <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                        <button type="submit" class="btn btn-sm btn-info">Update Data</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>

                    </div>
                </form>
            </div>
            <!-- </div> -->


        </div>
    </div>

</div>
@endforeach
<!-- modal hapus -->
@foreach ($listKategori as $list)
<div class="modal fade " id="modalHapus{{$list->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">Menghapus Data Kategori</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('KategoriSuratController@hapus',$list->id)}}" method="POST">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group" hidden>
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input class="form-control" name="id" value="{{$list->id}}">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Kode Kategori</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input readonly class="form-control" name="ks_kode" value="{{$list->ks_kode}}">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Keterangan Kategori</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input readonly class="form-control" name="ks_keterangan" value="{{$list->ks_keterangan}}">
                                </div>
                                <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                            </div>
                            <div class="form-group" hidden>
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input class="form-control" name="ks_status" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                        <button type="submit" class="btn btn-sm btn-info">Delete Data</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>

                    </div>
                </form>
            </div>
            <!-- </div> -->


        </div>
    </div>

</div>
@endforeach
@endsection