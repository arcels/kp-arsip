@extends('layout/main')
@section('konten')


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row ">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-title" style="font-size: 14pt;">
                        <strong>
                            SURAT KETERANGAN AKTIF MAHASISWA
                        </strong>
                    </div>
                    <div class="card-body form-group offset-md-1">
                        <form action="{{action('SuratKeluarController@m')}}" method="post">
                            {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Title Surat</label>
                                    </strong> </div>
                                <div class="col-sm-2">
                                    <input type="text" id="text-input" name="sk_title" value="Surat Keterangan Aktif" class="form-control" readonly>

                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Kode Surat</label>
                                    </strong> </div>
                                <div class="col-sm-1">
                                    <input type="text" id="text-input" name="sk_kode" value="SKA-M" class="form-control" readonly>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Nama Mahasiswa</label>
                                    </strong> </div>
                                <div class="col-sm-4">
                                    <input type="text" id="text-input" name="m_mahasiswa" class="form-control" required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Alamat Mahasiswa</label>
                                    </strong> </div>
                                <div class="col-sm-4">
                                    <input type="text" id="text-input" name="m_alamat" class="form-control"required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Prodi Mahasiswa</label>
                                    </strong> </div>
                                <div class="input-group col-md-3">
                                    <select name="m_prodi" id="select" class="form-control"required>
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
                                    <input type="text" id="text-input" name="m_nim" class="form-control"required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Tahun Akademik</label>
                                    </strong> </div>
                                <div class="col-sm-2">
                                    <input type="text" id="text-input" name="m_tahun" class="form-control"required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Keperluan</label>
                                    </strong> </div>
                                <div class="col-sm-4">
                                    <!-- <input type="textarea" id="text-input" name="m_keperluan" class="form-control"> -->
                                    <textarea class="form-control" name="m_keperluan" id="text-input" cols="20" rows="5"required></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label class=" form-control-label">Kode Penanggung Jawab</label>
                                    </strong>
                                </div>
                                <div class="input-group col-md-1">
                                    <input name="sk_kpj" type="text" id="text-input" class="form-control" required>

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