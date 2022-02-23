@extends('layout/main')
@section('konten')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-title" style="font-size: 14pt;">
                        <strong>
                            SURAT KELUAR
                        </strong>
                    </div>
                    <div class="card-body form-group offset-md-1">
                        <form action="{{action('SuratKeluarController@custom')}}" method="post">
                            {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Title Surat</label>
                                    </strong> </div>
                                <div class="col-sm-4">
                                    <input type="text" id="text-input" name="sk_title" class="form-control" required>

                                </div>
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Kode Surat</label>
                                    </strong> </div>
                                <div class="col-sm-1">
                                    <input type="text" id="text-input" name="sk_kode" class="form-control" required>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <strong>
                                        <label for="text-input" class=" form-control-label">Kepada</label>
                                    </strong> </div>
                                <div class="col-sm-4">
                                    <input type="text" id="text-input" name="sk_kepada" class="form-control">
                                </div>
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
                                    </strong>
                                </div>
                                @if(session('user_role') == "Admin")
                                <div class="input-group col-md-4">
                                    <select name="sk_penanggungjawab" id="select" class="form-control" required>
                                        <option disabled selected hidden value="">Pilih Penanggung Jawab</option>
                                        @foreach($listDosen as $dosen)
                                        <option selected value="{{ $dosen->id }}">{{$dosen->dosen_nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                <div class="input-group col-md-4">
                                    @foreach ($listDosen as $dosen)
                                    @if($dosen->dosen_nidn == Session('user_name'))
                                    <input readonly type="text" id="text-input" name="" value="{{$dosen->dosen_nama}}" class="form-control" required>
                                    <input hidden type="text" id="text-input" name="sk_penanggungjawab" value="{{$dosen->id}}" class="form-control" required>
                                    @endif
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            <textarea id="konten" name="c_isiSurat"></textarea>
                            <script>
                                CKEDITOR.replace('c_isiSurat');
                            </script>
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <a href="surat-keluar" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Batal
                                </a>
                            </div>
                    </div>

                </div>
            </div>
        </div>

    </div>



</div>
@endsection