@extends('layout/main')
@section('konten')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>List Data User Deleted</strong>
        </div>
        <div class="card-body ">
            @if (session('status'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }}
            </div>
            @endif
        </div>

        <div class="card-body table-responsive">
            <table id="bootstrap-data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Nama Pengguna</th>
                        <th>User Role</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($listUser as $list)
                    @if($list->user_status == 0)
                    <tr>
                        <td>{{$list->user_name}}</td>
                        <td>{{$list->user_pengguna}}</td>
                        <td>{{$list->user_role}}</td>
                        <td>
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
<!-- modal restore -->
<!-- modal restore -->
@foreach ($listUser as $list)
<div class="modal fade " id="modalRestore{{$list->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5 class="p-b-5"><span class="semi-bold">Mengaktifkan User</span></h5>
            </div>
            <div class="modal-body">
                <form action="{{action('UserController@restore',$list->id)}}" method="POST">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group" hidden>
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input readonly class="form-control" name="id" value="{{$list->id}}">
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Username</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input readonly class="form-control" name="user_name" value="{{$list->user_name}}">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Nama User Pengguna</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input readonly class="form-control" name="user_pengguna" value="{{$list->user_pengguna}}">
                                </div>
                                <!-- <small class=" form-text text-muted">ex. Informatika</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Email User</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input readonly type="email" class="form-control" name="user_email" value="{{$list->user_email}}">
                                </div>
                                <!-- <small class="form-text text-muted">ex. 42321</small> -->
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Role User</label>
                                <div class="input-group">
                                    <select disabled name="user_pengguna" id="select" class="form-control">
                                        <!-- <option disabled selected hidden value="">User Role</option>x -->
                                        <option value="Dekan" @if ($list->user_pengguna === "Dekan")
                                            selected
                                            @endif >Dekan</option>
                                        <option value="Kaparodi" @if ($list->user_pengguna === "Kaparodi")
                                            selected
                                            @endif>Kaprodi</option>
                                        <option value="WD" @if ($list->user_pengguna === "WD")
                                            selected
                                            @endif>Wakil Dekan</option>
                                        <option value="Admin" @if ($list->user_pengguna === "Admin")
                                            selected
                                            @endif>Dosen</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="form-control" hidden name="user_status" value="1">
            </div>
            <div class="modal-footer">
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