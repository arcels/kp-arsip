@extends('layout/main')
@section('konten')


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-title" style="font-size: 14pt;">
                        <strong>
                            SURAT KERJA PRAKTEK
                        </strong>
                    </div>
                    <div class="card-body form-group offset-md-1">
                        <form action="{{action('SuratKeluarController@kp')}}" method="post">
                            {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Title Surat</label>
                                    </strong> </div>
                                <div class="col-sm-2">
                                    <input type="text" id="text-input" name="sk_title" value="Surat Kerja Praktek" class="form-control" readonly>

                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Kode Surat</label>
                                    </strong> </div>
                                <div class="col-sm-1">
                                    <input type="text" id="text-input" name="sk_kode" value="KP" class="form-control" readonly>

                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Perihal</label>
                                    </strong> </div>
                                <div class="col-sm-4">
                                    <input type="text" id="text-input" name="kp_hal" class="form-control" required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label class=" form-control-label">Penanggung Jawab</label>
                                    </strong> </div>
                                <div class="input-group col-md-4">
                                    <select name="sk_penanggungjawab" id="select" class="form-control"required>
                                        <option disabled selected hidden value="">Pilih Penanggung Jawab</option>
                                        @foreach ($listDosen as $dosen)
                                        @if($dosen->dosen_status == 1)
                                        <option value="{{ $dosen->id }}">{{$dosen->dosen_nama}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Nama Perusahaan</label>
                                    </strong> </div>
                                <div class="col-sm-4">
                                    <input type="text" id="text-input" name="kp_perusahaan" class="form-control"required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Pimpinan Perusahaan</label>
                                    </strong> </div>
                                <div class="col-sm-4">
                                    <input type="text" id="text-input" name="sk_kepada" class="form-control"required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Nama Mahasiswa</label>
                                    </strong> </div>
                                <div class="col-sm-4">
                                    <input type="text" id="text-input" name="kp_mahasiswa" class="form-control"required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Nim Mahasiswa</label>
                                    </strong> </div>
                                <div class="col-sm-3">
                                    <input type="text" id="text-input" name="kp_nim" class="form-control"required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Mulai Kerja Praktek</label>
                                    </strong> </div>
                                <div class="col-sm-3">
                                    <input type="date" id="text-input" name="kp_mulai" class="form-control"required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Selesai Kerja Praktek</label>
                                    </strong> </div>
                                <div class="col-sm-3">
                                    <input type="date" id="text-input" name="kp_selesai" class="form-control"required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <a href="surat-keluar" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Batal

                            </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>

@endsection