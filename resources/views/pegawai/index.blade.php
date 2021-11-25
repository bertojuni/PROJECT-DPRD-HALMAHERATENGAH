@extends('template.default')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
            </div>
            <div class="card-body">
                <div class="mb-3 mt-1">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addDataPartai">
                        <i class="fas fa-plus"></i>
                        Tambah Data
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Golongan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($pegawai as $p)
                            <tr>
                                <td> {{ $i }} </td>
                                <td> {{ $p->pg_nip }} </td>
                                <td> {{ $p->pg_nama }} </td>
                                <td> {{ $p->pg_gol }} </td>
                                <td>
                                    <a href="{{ url('/pegawai/detail/' . $p->pg_id) }}" class="btn btn-sm btn-primary btn-circle">
                                        <i class="fas fa-info"></i>
                                    </a>
                                    <a href="{{ url('/pegawai/edit/' . $p->pg_id) }}" class="btn btn-sm btn-warning btn-circle">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <div onclick="deleteModal({{ $p->pg_id }})" class="btn btn-sm btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </div>
                                </td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- modal add data --}}
<div class="modal fade" id="addDataPartai" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addDataPartaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataPartaiLabel">Tambah Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/pegawai/store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label for="pg_nama">Nama Pegawai</label>
                            <input type="text" class="form-control" id="pg_nama" required name="pg_nama">
                        </div>

                        <div class="form-group">
                            <label for="pg_nip">NIP</label>
                            <input type="text" class="form-control" id="pg_nip" required name="pg_nip">
                        </div>

                        <div class="form-group">
                            <label for="pg_gol">Golongan</label>
                            <select name="pg_gol" id="pg_gol" class="form-control" required>
                                <option value="null">Pilih Golongan</option>
                                <option value="IA">I A</option>
                                <option value="IB">I B</option>
                                <option value="IC">I C</option>
                                <option value="ID">I D</option>

                                <option value="IIA">II A</option>
                                <option value="IIB">II B</option>
                                <option value="IIC">II C</option>
                                <option value="IID">II D</option>

                                <option value="IIIA">III A</option>
                                <option value="IIIB">III B</option>
                                <option value="IIIC">III C</option>
                                <option value="IIID">III D</option>

                                <option value="IVA">IV A</option>
                                <option value="IVB">IV B</option>
                                <option value="IVC">IV C</option>
                                <option value="IVD">IV D</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pg_jabatan">Jabatan</label>
                            <input type="text" class="form-control" id="pg_jabatan" required name="pg_jabatan">
                        </div>

                        <div class="form-group">
                            <label for="pg_tempatlhr">Tempat Lahir</label>
                            <input type="text" class="form-control" id="pg_tempatlhr" required name="pg_tempatlhr">
                        </div>

                        <div class="form-group">
                            <label for="pg_tgllhr">Tgl Lahir</label>
                            <input type="date" class="form-control" id="pg_tgllhr" required name="pg_tgllhr">
                        </div>

                        <div class="form-group">
                            <label for="pg_status">Pasangan</label>
                            <select name="pg_status" id="pg_status" class="form-control">
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pg_pasangan">Pasangan</label>
                            <input type="text" class="form-control" id="pg_pasangan" required name="pg_pasangan">
                        </div>

                        <div class="form-group">
                            <label for="pg_alamat">Alamat</label>
                            <input type="text" class="form-control" id="pg_alamat" required name="pg_alamat">
                        </div>

                        <div class="form-group">
                            <label for="pg_kontak">No HP</label>
                            <input type="tel" class="form-control" id="pg_kontak" required name="pg_kontak">
                        </div>

                        <div class="form-group">
                            <label for="pg_email">Email</label>
                            <input type="email" class="form-control" id="pg_email" required name="pg_email">
                        </div>

                        <div class="form-group">
                            <label for="pg_anak">Jumlah Anak</label>
                            <input type="number" class="form-control" id="pg_anak" required name="pg_anak">
                        </div>

                        <div class="form-group">
                            <label for="pg_pendidikan">Tingkat Pendidikan</label>
                            <select name="pg_pendidikan" id="pg_pendidikan" class="form-control">
                                <option value="sd">SD</option>
                                <option value="smp">SMP</option>
                                <option value="smak">SMA/SMK</option>
                                <option value="diploma">Diploma</option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pg_karpeg">Kartu Pegawai</label>
                            <input type="file" class="form-control" id="pg_karpeg" required name="pg_karpeg">
                        </div>

                        <div class="form-group">
                            <label for="pg_ktp">Foto KTP</label>
                            <input type="file" class="form-control" id="pg_ktp" required name="pg_ktp">
                        </div>

                        <div class="form-group">
                            <label for="pg_npwp">Foto NPWP</label>
                            <input type="file" class="form-control" id="pg_npwp" required name="pg_npwp">
                        </div>

                        <div class="form-group">
                            <label for="pg_bpjs">Foto BPJS</label>
                            <input type="file" class="form-control" id="pg_bpjs" required name="pg_bpjs">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal delete confirmation --}}
<div class="modal fade" id="deleteDataPegawai" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteDataPegawaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Tersebut ?</p>
            </div>
            <div class="modal-footer">
                <form action="" method="POST" id="modal-delete-form">
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script-custom')
<script>
    function deleteModal(id) {
        $('#deleteDataPegawai').modal('show');
        document.getElementById('modal-delete-form').setAttribute('action', 'pegawai/delete/' + id);
    }
</script>
@endsection
