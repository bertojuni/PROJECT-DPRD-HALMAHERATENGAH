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
                    <h6 class="m-0 font-weight-bold text-primary">Detail Data Anggota</h6>
                </div>
                <div class="card-body">
                    {{-- nama --}}
                    <div class="row">
                        <div class="col-3">
                            Nama
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_nama }}
                        </div>
                    </div>
                    <hr>
                    {{-- jabatan --}}
                    <div class="row">
                        <div class="col-3">
                            Jabatan
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_jabatan }}
                        </div>
                    </div>
                    <hr>
                    {{-- tempat lahir --}}
                    <div class="row">
                        <div class="col-3">
                            Tempat Lahir
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_tempatlhr }}
                        </div>
                    </div>
                    <hr>
                    {{-- tgl lahir --}}
                    <div class="row">
                        <div class="col-3">
                            Tgl Lahir
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_tgllhr }}
                        </div>
                    </div>
                    <hr>
                    {{-- partai --}}
                    <div class="row">
                        <div class="col-3">
                            Partai
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->partai_nama }}
                        </div>
                    </div>
                    <hr>
                    {{-- pasangan --}}
                    <div class="row">
                        <div class="col-3">
                            Pasangan
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_pasangan }}
                        </div>
                    </div>
                    <hr>
                    {{-- pekerjaan --}}
                    <div class="row">
                        <div class="col-3">
                            Pekerjaan
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_pekerjaan }}
                        </div>
                    </div>
                    <hr>
                    {{-- alamat --}}
                    <div class="row">
                        <div class="col-3">
                            Alamat
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_alamat }}
                        </div>
                    </div>
                    <hr>
                    {{-- hp --}}
                    <div class="row">
                        <div class="col-3">
                            No HP
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_alamat }}
                        </div>
                    </div>
                    <hr>
                    {{-- anggota anak --}}
                    <div class="row">
                        <div class="col-3">
                            Jumlah Anak
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_anak }}
                        </div>
                    </div>
                    <hr>
                    {{-- anggota ktp --}}
                    <div class="row">
                        <div class="col-3">
                            No KTP
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_ktp }}
                        </div>
                    </div>
                    <hr>
                    {{-- anggota npwp --}}
                    <div class="row">
                        <div class="col-3">
                            No NPWP
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_npwp }}
                        </div>
                    </div>
                    <hr>
                    {{-- anggota bpjs --}}
                    <div class="row">
                        <div class="col-3">
                            No BPJS
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->anggota_bpjs }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
