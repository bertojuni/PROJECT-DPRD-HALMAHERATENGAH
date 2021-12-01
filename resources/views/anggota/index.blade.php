@extends('template.default')

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
                </div>
                <div class="card-body">
                    @if (session('error_not_found'))
                        <div class="alert alert-danger">
                            Data yang Anda cari tidak ditemukan!
                        </div>
                    @endif
                    <div class="mb-3 mt-1">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addDataAnggota">
                            <i class="fas fa-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>Partai</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($anggota as $p)
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td> {{ $p->anggota_nama }} </td>
                                        <td> {{ $p->partai_nama }} </td>
                                        <td> {{ $p->anggota_jabatan }} </td>
                                        <td>
                                            <a href="{{ url('/anggota/detail/' . $p->anggota_id) }}" class="btn btn-sm btn-primary btn-circle">
                                                <i class="fas fa-info"></i>
                                            </a>
                                            <a href="{{ url('/anggota/edit/' . $p->anggota_id) }}" class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <div onclick="deleteModal({{ $p->anggota_id }})" class="btn btn-sm btn-danger btn-circle">
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
    <div class="modal fade" id="addDataAnggota" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addDataAnggotaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataAnggotaLabel">Tambah Data Partai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/anggota/store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    Ada beberapa kesalahan dalam input data
                                    <div>
                                        <ul>
                                            @foreach ($errors->all() as $item => $value)
                                                <li class="text-small"> {{ $value }} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="anggota_nama">Nama Anggota</label>
                                <input type="text" class="form-control" id="anggota_nama" required name="anggota_nama">
                            </div>

                            <div class="form-group">
                                <label for="anggota_jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="anggota_jabatan" required name="anggota_jabatan">
                            </div>

                            <div class="form-group">
                                <label for="anggota_tempatlhr">Tempat Lahir</label>
                                <input type="text" class="form-control" id="anggota_tempatlhr" required name="anggota_tempatlhr">
                            </div>

                            <div class="form-group">
                                <label for="anggota_tgllhr">Tgl Lahir</label>
                                <input type="date" class="form-control" id="anggota_tgllhr" required name="anggota_tgllhr">
                            </div>

                            <div class="form-group">
                                <label for="partai_id">Partai</label>
                                <select name="partai_id" id="partai_id" class="form-control">
                                    <option value="null">Pilih Partai</option>
                                    @foreach ($partai as $item)
                                        <option value="{{ $item->partai_id }}">
                                            {{ $item->partai_nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="anggota_pasangan">Pasangan</label>
                                <input type="text" class="form-control" id="anggota_pasangan" required name="anggota_pasangan">
                            </div>

                            <div class="form-group">
                                <label for="anggota_pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" id="anggota_pekerjaan" required name="anggota_pekerjaan">
                            </div>

                            <div class="form-group">
                                <label for="anggota_alamat">Alamat</label>
                                <input type="text" class="form-control" id="anggota_alamat" required name="anggota_alamat">
                            </div>

                            <div class="form-group">
                                <label for="anggota_nohp">No HP</label>
                                <input type="tel" class="form-control" id="anggota_nohp" required name="anggota_nohp">
                            </div>

                            <div class="form-group">
                                <label for="anggota_email">Email</label>
                                <input type="email" class="form-control" id="anggota_email" required name="anggota_email">
                            </div>

                            <div class="form-group">
                                <label for="anggota_anak">Jumlah Anak</label>
                                <input type="number" class="form-control" id="anggota_anak" required name="anggota_anak">
                            </div>

                            <div class="form-group">
                                <label for="anggota_ktp">Foto KTP</label>
                                <input type="file" class="form-control" id="anggota_ktp" required name="anggota_ktp">
                            </div>

                            <div class="form-group">
                                <label for="anggota_npwp">Foto NPWP</label>
                                <input type="file" class="form-control" id="anggota_npwp" required name="anggota_npwp">
                            </div>

                            <div class="form-group">
                                <label for="anggota_bpjs">Foto BPJS</label>
                                <input type="file" class="form-control" id="anggota_bpjs" required name="anggota_bpjs">
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
    <div class="modal fade" id="deleteDataAnggota" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteDataAnggotaLabel" aria-hidden="true">
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
            $('#deleteDataAnggota').modal('show');
            document.getElementById('modal-delete-form').setAttribute('action', 'anggota/delete/' + id);
        }

        @if ($errors->any())
            $(window).on('load', function() {
            $('#addDataAnggota').modal('show');
            });
        @endif
    </script>
@endsection
