@extends('template.default')

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/anggota') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Data Anggota</h6>
                </div>
                <div class="card-body">
                    <form action="/anggota/update/{{ $id }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                {{-- anggota nama --}}
                                <div class="form-group">
                                    <label for="anggota_nama">Nama Anggota</label>
                                    <input type="text" class="form-control" id="anggota_nama" required name="anggota_nama" value="{{ $anggota->anggota_nama }}">
                                </div>
                                <hr>
                                {{-- jabatan --}}
                                <div class="form-group">
                                    <label for="anggota_jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="anggota_jabatan" required name="anggota_jabatan" value="{{ $anggota->anggota_jabatan }}">
                                </div>
                                <hr>
                                {{-- tempat lahir --}}
                                <div class="form-group">
                                    <label for="anggota_tempatlhr">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="anggota_tempatlhr" required name="anggota_tempatlhr" value="{{ $anggota->anggota_tempatlhr }}">
                                </div>
                                <hr>
                                {{-- tgl lahir --}}
                                <div class="form-group">
                                    <label for="anggota_tgllhr">Tempat Lahir</label>
                                    <input type="date" class="form-control" id="anggota_tgllhr" required name="anggota_tgllhr" value="{{ $anggota->anggota_tgllhr }}">
                                </div>
                                <hr>
                                {{-- partai --}}
                                <div class="form-group">
                                    <label for="partai_id">Partai</label>
                                    <select name="partai_id" id="partai_id" class="form-control">
                                        @foreach ($partai as $item)
                                            <option {{ $anggota->partai_id == $item->partai_id ? 'selected' : '' }} value="{{ $item->partai_id }}"> {{ $item->partai_nama }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <hr>
                                {{-- pasangan --}}
                                <div class="form-group">
                                    <label for="anggota_pasangan">Pasangan</label>
                                    <input type="text" class="form-control" id="anggota_pasangan" required name="anggota_pasangan" value="{{ $anggota->anggota_pasangan }}">
                                </div>
                                <hr>
                                {{-- pekerjaan --}}
                                <div class="form-group">
                                    <label for="anggota_pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" id="anggota_pekerjaan" required name="anggota_pekerjaan" value="{{ $anggota->anggota_pekerjaan }}">
                                </div>
                                <hr>
                                {{-- alamat --}}
                                <div class="form-group">
                                    <label for="anggota_alamat">Alamat</label>
                                    <input type="text" class="form-control" id="anggota_alamat" required name="anggota_alamat" value="{{ $anggota->anggota_alamat }}">
                                </div>
                                <hr>

                                {{-- no hp --}}
                                <div class="form-group">
                                    <label for="anggota_nohp">No HP</label>
                                    <input type="text" class="form-control" id="anggota_nohp" required name="anggota_nohp" value="{{ $anggota->anggota_nohp }}">
                                </div>
                                <hr>
                                {{-- email --}}
                                <div class="form-group">
                                    <label for="anggota_email">Email</label>
                                    <input type="text" class="form-control" id="anggota_email" required name="anggota_email" value="{{ $anggota->anggota_email }}">
                                </div>
                                <hr>
                                {{-- anak --}}
                                <div class="form-group">
                                    <label for="anggota_anak">Jumlah Anak</label>
                                    <input type="text" class="form-control" id="anggota_anak" required name="anggota_anak" value="{{ $anggota->anggota_anak }}">
                                </div>
                                <hr>
                                {{-- ktp --}}
                                <div class="form-group">
                                    <label for="anggota_ktp">Foto KTP</label>
                                    <input type="file" class="form-control" id="anggota_ktp" required name="anggota_ktp" value="{{ $anggota->anggota_ktp }}">
                                </div>
                                <hr>
                                {{-- npwp --}}
                                <div class="form-group">
                                    <label for="anggota_npwp">Foto NPWP</label>
                                    <input type="file" class="form-control" id="anggota_npwp" required name="anggota_npwp" value="{{ $anggota->anggota_npwp }}">
                                </div>
                                <hr>
                                {{-- bpjs --}}
                                <div class="form-group">
                                    <label for="anggota_bpjs">No BPJS</label>
                                    <input type="text" class="form-control" id="anggota_bpjs" required name="anggota_bpjs" value="{{ $anggota->anggota_bpjs }}">
                                </div>
                                <hr>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">KTP</label>
                                    <div>
                                        <img src="{{ url($anggota->anggota_ktp) }}" alt="img" class="img-fluid border" style="border-radius: 10px">
                                        <div class="form-group" style="">
                                            <button class="btn btn-danger btn-circle">
                                                <i class="fas fa-pencil-alt" style="font-size: 20px"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group mt-1">
                                    <label for="" class="font-weight-bold">NPWP</label>
                                    <img src="{{ url($anggota->anggota_npwp) }}" alt="img" class="img-fluid border" style="border-radius: 10px">
                                </div>

                                <hr>

                                <div class="form-group mt-1">
                                    <label for="" class="font-weight-bold">BPJS</label>
                                    <img src="{{ url($anggota->anggota_bpjs) }}" alt="img" class="img-fluid border" style="border-radius: 10px">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
