@extends('template.default')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/pegawai') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Data Pegawai</h6>
                </div>
                <div class="card-body">
                    {{-- nip --}}
                    <div class="row">
                        <div class="col-3">
                            NIP
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_nip }}
                        </div>
                    </div>
                    <hr>
                    {{-- nama --}}
                    <div class="row">
                        <div class="col-3">
                            Nama
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_nama }}
                        </div>
                    </div>
                    <hr>
                    {{-- gol --}}
                    <div class="row">
                        <div class="col-3">
                            Golongan
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_gol }}
                        </div>
                    </div>
                    <hr>
                    {{-- jabatan --}}
                    <div class="row">
                        <div class="col-3">
                            Jabatan
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_jabatan }}
                        </div>
                    </div>
                    <hr>
                    {{-- tempat lahir --}}
                    <div class="row">
                        <div class="col-3">
                            Tempat Lahir
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_tempatlhr }}
                        </div>
                    </div>
                    <hr>
                    {{-- tgl lahir --}}
                    <div class="row">
                        <div class="col-3">
                            Tgl Lahir
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_tgllhr }}
                        </div>
                    </div>
                    <hr>
                    {{-- partai --}}
                    <div class="row">
                        <div class="col-3">
                            Status
                        </div>
                        <div class="col font-weight-bold mt-2">
                            @if ($anggota->pg_status == 'aktif')
                                <div class="btn btn-sm btn-success">
                                    {{ $anggota->pg_status }}
                                </div>
                            @else
                                <div class="btn btn-sm btn-danger">
                                    {{ $anggota->pg_status }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    {{-- pasangan --}}
                    <div class="row">
                        <div class="col-3">
                            Pasangan
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_pasangan }}
                        </div>
                    </div>
                    <hr>
                    {{-- alamat --}}
                    <div class="row">
                        <div class="col-3">
                            Alamat
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_alamat }}
                        </div>
                    </div>
                    <hr>
                    {{-- hp --}}
                    <div class="row">
                        <div class="col-3">
                            No Kontak
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_kontak }}
                        </div>
                    </div>
                    <hr>
                    {{-- anggota anak --}}
                    <div class="row">
                        <div class="col-3">
                            Jumlah Anak
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_anak }}
                        </div>
                    </div>
                    <hr>
                    {{-- anggota ktp --}}
                    <div class="row">
                        <div class="col-3">
                            No KTP
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_ktp }}
                        </div>
                    </div>
                    <hr>
                    {{-- anggota karpeg --}}
                    <div class="row">
                        <div class="col-3">
                            No Kartu Pegawai
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_karpeg }}
                        </div>
                    </div>
                    <hr>
                    {{-- anggota npwp --}}
                    <div class="row">
                        <div class="col-3">
                            No NPWP
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_npwp }}
                        </div>
                    </div>
                    <hr>
                    {{-- anggota bpjs --}}
                    <div class="row">
                        <div class="col-3">
                            No BPJS
                        </div>
                        <div class="col font-weight-bold mt-2">
                            {{ $anggota->pg_bpjs }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
