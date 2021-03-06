@extends('template.default')

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Data PTT</h6>
                </div>
                <div class="card-body">
                    @if (session('error_not_found'))
                        <div class="alert alert-danger">
                            Data yang Anda cari tidak ditemukan!
                        </div>
                    @endif

                    <div class="mb-3 mt-1">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addDataPTT">
                            <i class="fas fa-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Bagian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($ptt as $item)
                                    <tr>
                                        <td> {{$i}} </td>
                                        <td> {{$item->ppt_nama}} </td>
                                        <td> {{$item->ppt_bagian}} </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary btn-circle">
                                                <i class="fas fa-info"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <div onclick="#" class="btn btn-sm btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    @php($i++)
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- modal add data --}}
    <div class="modal fade" id="addDataPTT" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addDataPTTLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataPTTLabel">Tambah Data PTT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/ptt/store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="ppt_nama">Nama Pegawai</label>
                                <input type="text" class="form-control" id="ppt_nama" required name="ppt_nama">
                            </div>

                            <div class="form-group">
                                <label for="ppt_pendidikan">Tingkat Pendidikan</label>
                                <select name="ppt_pendidikan" id="ppt_pendidikan" class="form-control">
                                    <option value="null">Pilih Tingkat Pendidikan</option>
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
                                <label for="ppt_tempatlhr">Tempat Lahir</label>
                                <input type="text" class="form-control" id="ppt_tempatlhr" required name="ppt_tempatlhr">
                            </div>

                            <div class="form-group">
                                <label for="ppt_tgllhr">Tgl Lahir</label>
                                <input type="date" class="form-control" id="ppt_tgllhr" required name="ppt_tgllhr">
                            </div>

                            <div class="form-group">
                                <label for="ppt_alamat">Alamat</label>
                                <input type="text" class="form-control" id="ppt_alamat" required name="ppt_alamat">
                            </div>

                            <div class="form-group">
                                <label for="ppt_nohp">No HP</label>
                                <input type="tel" class="form-control" id="ppt_nohp" required name="ppt_nohp">
                            </div>

                            <div class="form-group">
                                <label for="ppt_bagian">Bagian</label>
                                <input type="text" class="form-control" id="ppt_bagian" required name="ppt_bagian">
                            </div>

                            <div class="form-group">
                                <label for="ppt_ktp">Foto KTP</label>
                                <input type="file" class="form-control" id="ppt_ktp" required name="ppt_ktp">
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

        @if ($errors->any())
            $(window).on('load', function() {
            $('#addDataPTT').modal('show');
            });
        @endif
    </script>
@endsection
