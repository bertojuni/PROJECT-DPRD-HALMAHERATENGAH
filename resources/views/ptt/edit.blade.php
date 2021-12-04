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
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Data Pegawai</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <form action="/pegawai/update/{{$id}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{-- nip --}}
                                <div class="form-group">
                                    <label for="pg_nip">NIP</label>
                                    <input type="text" class="form-control" id="pg_nip" required name="pg_nip"
                                        value="{{ $pegawai->pg_nip }}">
                                </div>
                                <hr>
                                {{-- anggota nama --}}
                                <div class="form-group">
                                    <label for="pg_nama">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="pg_nama" required name="pg_nama"
                                        value="{{ $pegawai->pg_nama }}">
                                </div>
                                <hr>
                                {{-- pg gol --}}
                                <div class="form-group">
                                    <label for="pg_gol">Golongan</label>
                                    <select name="pg_gol" id="pg_gol" class="form-control" required>
                                        <option value="null">Pilih Golongan</option>
                                        <option {{$pegawai->pg_gol == 'IB' ? 'selected' : ''}} value="IA">I A</option>
                                        <option {{$pegawai->pg_gol == 'IC' ? 'selected' : ''}} value="IB">I B</option>
                                        <option {{$pegawai->pg_gol == 'ID' ? 'selected' : ''}} value="IC">I C</option>
                                        <option {{$pegawai->pg_gol == 'IE' ? 'selected' : ''}} value="ID">I D</option>
    
                                        <option {{$pegawai->pg_gol == 'IIA' ? 'selected' : ''}} value="IIA">II A</option>
                                        <option {{$pegawai->pg_gol == 'IIB' ? 'selected' : ''}} value="IIB">II B</option>
                                        <option {{$pegawai->pg_gol == 'IIC' ? 'selected' : ''}} value="IIC">II C</option>
                                        <option {{$pegawai->pg_gol == 'IID' ? 'selected' : ''}} value="IID">II D</option>
    
                                        <option {{$pegawai->pg_gol == 'IIIA' ? 'selected' : ''}} value="IIIA">III A</option>
                                        <option {{$pegawai->pg_gol == 'IIIB' ? 'selected' : ''}} value="IIIB">III B</option>
                                        <option {{$pegawai->pg_gol == 'IIIC' ? 'selected' : ''}} value="IIIC">III C</option>
                                        <option {{$pegawai->pg_gol == 'IIID' ? 'selected' : ''}} value="IIID">III D</option>
    
                                        <option {{$pegawai->pg_gol == 'IVA' ? 'selected' : ''}} value="IVA">IV A</option>
                                        <option {{$pegawai->pg_gol == 'IVB' ? 'selected' : ''}} value="IVB">IV B</option>
                                        <option {{$pegawai->pg_gol == 'IVC' ? 'selected' : ''}} value="IVC">IV C</option>
                                        <option {{$pegawai->pg_gol == 'IVD' ? 'selected' : ''}} value="IVD">IV D</option>
                                    </select>
                                </div>
                                <hr>
                                {{-- jabatan --}}
                                <div class="form-group">
                                    <label for="pg_jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="pg_jabatan" required name="pg_jabatan"
                                        value="{{ $pegawai->pg_jabatan }}">
                                </div>
                                <hr>
                                {{-- jabatan --}}
                                <div class="form-group">
                                    <label for="pg_status">Statu</label>
                                    <select name="pg_status" id="pg_status" class="form-control">
                                        <option value="null">Pilih Status</option>
                                        <option {{$pegawai->pg_status == 'aktif' ? 'selected' : ''}} value="aktif">Aktif</option>
                                        <option {{$pegawai->pg_status == 'tidak_aktif' ? 'selected' : ''}} value="tidak_aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                                <hr>
                                {{-- tempat lahir --}}
                                <div class="form-group">
                                    <label for="pg_tempatlhr">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="pg_tempatlhr" required name="pg_tempatlhr"
                                        value="{{ $pegawai->pg_tempatlhr }}">
                                </div>
                                <hr>
                                {{-- tgl lahir --}}
                                <div class="form-group">
                                    <label for="pg_tgllhr">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="pg_tgllhr" required name="pg_tgllhr"
                                        value="{{ $pegawai->pg_tgllhr }}">
                                </div>
                                <hr>
                                {{-- pendidikan --}}
                                <div class="form-group">
                                    <label for="pg_pendidikan">Pendidikan</label>
                                    <select name="pg_pendidikan" id="pg_pendidikan" class="form-control">
                                        <option {{$pegawai->pg_pendidikan == 'sd' ? 'selected' : ''}} value="sd">SD</option>
                                        <option {{$pegawai->pg_pendidikan == 'smp' ? 'selected' : ''}} value="smp">SMP</option>
                                        <option {{$pegawai->pg_pendidikan == 'smak' ? 'selected' : ''}} value="smak">SMA/SMK</option>
                                        <option {{$pegawai->pg_pendidikan == 'diploma' ? 'selected' : ''}} value="diploma">Diploma</option>
                                        <option {{$pegawai->pg_pendidikan == 's1' ? 'selected' : ''}} value="s1">S1</option>
                                        <option {{$pegawai->pg_pendidikan == 's2' ? 'selected' : ''}} value="s2">S2</option>
                                        <option {{$pegawai->pg_pendidikan == 's3' ? 'selected' : ''}} value="s3">S3</option>
                                    </select>
                                </div>
                                <hr>
                                {{-- pasangan --}}
                                <div class="form-group">
                                    <label for="pg_pasangan">Pasangan</label>
                                    <input type="text" class="form-control" id="pg_pasangan" required name="pg_pasangan"
                                        value="{{ $pegawai->pg_pasangan }}">
                                </div>
                                <hr>
                                {{-- alamat --}}
                                <div class="form-group">
                                    <label for="pg_alamat">Alamat</label>
                                    <input type="text" class="form-control" id="pg_alamat" required name="pg_alamat"
                                        value="{{ $pegawai->pg_alamat }}">
                                </div>
                                <hr>

                                {{-- no hp --}}
                                <div class="form-group">
                                    <label for="pg_kontak">No HP</label>
                                    <input type="text" class="form-control" id="pg_kontak" required name="pg_kontak"
                                        value="{{ $pegawai->pg_kontak }}">
                                </div>
                                <hr>
                                {{-- email --}}
                                <div class="form-group">
                                    <label for="pg_email">Email</label>
                                    <input type="text" class="form-control" id="pg_email" required name="pg_email"
                                        value="{{ $pegawai->pg_email }}">
                                </div>
                                <hr>
                                {{-- anak --}}
                                <div class="form-group">
                                    <label for="pg_anak">Jumlah Anak</label>
                                    <input type="text" class="form-control" id="pg_anak" required name="pg_anak"
                                        value="{{ $pegawai->pg_anak }}">
                                </div>
                                <hr>
                                {{-- karpeg --}}
                                <div class="form-group">
                                    <label for="pg_karpeg">No Kartu Pegawai</label>
                                    <input type="text" class="form-control" id="pg_karpeg" required name="pg_karpeg"
                                        value="{{ $pegawai->pg_karpeg }}">
                                </div>
                                <hr>
                                {{-- ktp --}}
                                <div class="form-group">
                                    <label for="pg_ktp">No KTP</label>
                                    <input type="text" class="form-control" id="pg_ktp" required name="pg_ktp"
                                        value="{{ $pegawai->pg_ktp }}">
                                </div>
                                <hr>
                                {{-- npwp --}}
                                <div class="form-group">
                                    <label for="pg_npwp">No NPWP</label>
                                    <input type="text" class="form-control" id="pg_npwp" required name="pg_npwp"
                                        value="{{ $pegawai->pg_npwp }}">
                                </div>
                                <hr>
                                {{-- bpjs --}}
                                <div class="form-group">
                                    <label for="pg_bpjs">No BPJS</label>
                                    <input type="text" class="form-control" id="pg_bpjs" required name="pg_bpjs"
                                        value="{{ $pegawai->pg_bpjs }}">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
