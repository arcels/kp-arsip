@extends('layout/main')
@section('konten')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-title" style="font-size: 12pt;">
                        <strong>
                            SURAT KETERANGAN ASISTEN
                        </strong>
                    </div>
                    <div class="card-body form-group offset-md-1">
                        <form action="{{action('SuratKeluarController@ska')}}" method="post">
                            {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Title Surat</label>
                                    </strong> </div>
                                <div class="col-sm-3">
                                    <input type="text" id="text-input" name="sk_title" value="Surat Keterangan Asisten" class="form-control" readonly>

                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Kode Surat</label>
                                    </strong> </div>
                                <div class="col-sm-1">
                                    <input type="text" id="text-input" name="sk_kode" value="SKA" class="form-control" readonly>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Mata Kuliah</label>
                                    </strong> </div>
                                <div class="col-sm-3">
                                    <input type="text" id="text-input" name="as_makul" class="form-control">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Pengampu Mata Kuliah</label>
                                    </strong> </div>
                                <div class="input-group col-md-3">
                                    <select name="sk_kepada" id="select" class="form-control">
                                        <option disabled selected hidden value="">Pilih Dosen Pengampu</option>
                                        @foreach ($listDosen as $dosen)
                                        @if($dosen->dosen_status == 1)
                                        <option value="{{ $dosen->id }}">{{$dosen->dosen_nama}} | {{$dosen->dosen_nidn}} </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Semester</label>
                                    </strong>
                                </div>
                                <div class="col-sm-3">
                                    <select name="as_semester" class="form-control" id="select">
                                        @for($i = 1;$i<=8; $i++) <option value="{{$i}}">Semester {{$i}}</option>

                                            @endfor
                                    </select>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label class=" form-control-label">Kode Penanggung Jawab</label>
                                    </strong>
                                </div>
                                <div class="input-group col-md-1">
                                    <input name="sk_kpj" type="text" id="text-input" class="form-control" />

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label class=" form-control-label">Penanggung Jawab</label>
                                    </strong> </div>
                                <div class="input-group col-md-3">
                                    <select name="sk_penanggungjawab" id="select" class="form-control">
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
                                        <label for="text-input" class=" form-control-label">Kelas</label>
                                    </strong>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" id="text-input" name="as_kelas" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Prodi Mahasiswa</label>
                                    </strong> </div>
                                <div class="input-group col-md-3">
                                    <select name="as_prodi" id="select" class="form-control">
                                        <option disabled selected hidden value="">Pilih Prodi</option>
                                        @foreach ($listProdi as $p)
                                        @if($p->prodi_status == 1)
                                        <option value="{{ $p->id }}">{{$p->prodi_nama}} </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Nim Mahasiswa</label>
                                    </strong> </div>
                                <div class="col-sm-3">
                                    <input type="text" id="text-input" name="as_nim" class="form-control">

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Nama Mahasiswa</label>
                                    </strong> </div>
                                <div class="col-sm-3">
                                    <input type="text" id="text-input" name="as_nama" class="form-control">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Tahun Akademik</label>
                                    </strong> </div>
                                <div class="col-sm-2">
                                    <input type="text" id="text-input" name="as_tahun" class="form-control">

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


</div><!-- .animated -->
</div><!-- .content -->


</div>

@endsection