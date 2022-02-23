@extends('layout/main')
@section('konten')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>Data Prodi Deleted</strong>
        </div>
        <div class="card-body table-responsive">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Kode Kategori</th>
                        <th>Keterangan Kategori</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    ody>
                    @foreach ($listKategori as $list)
                    @if($list->ks_status == 0)
                    <tr>
                        <td>{{$list->ks_kode}}</td>
                        <td>{{$list->ks_keterangan}}</td>
                        <td class="">
                            <a data-toggle="modal" data-target="#modalRestore{{$list->id }}" class="btn btn-sm">
                                <i class="fa fa-refresh"></i>
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
@foreach ($listKategori as $list)
<div class="modal fade " id="modalRestore{{$list->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">Mengembalikan Data Prodi</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('KategoriSuratController@restore',$list->id)}}" method="POST">
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
                                    <input class="form-control" readonly name="ks_kode" value="{{$list->ks_kode}}">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Keterangan Kategori</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
                                    <input class="form-control" readonly name="ks_keterangan" value="{{$list->ks_keterangan}}">
                                </div>
                                <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                            </div>
                            <div class="form-group" hidden>
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input class="form-control" name="ks_status" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="submit" class="btn btn-danger" >Hapus</button> -->
                        <button type="submit" class="btn btn-sm btn-info">Restore Data</button>
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