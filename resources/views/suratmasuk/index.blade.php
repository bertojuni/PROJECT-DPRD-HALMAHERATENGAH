@extends('template.default')

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Surat Masuk</h6>
                </div>
                <div class="card-body">
                    @if (session('error_message'))
                        <div class="alert alert-danger">
                            {{ session('error_message') }}
                        </div>
                    @endif

                    @if (session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message') }}
                        </div>
                    @endif

                    <div class="mb-3 mt-1">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addSuratMasuk">
                            <i class="fas fa-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengirim</th>
                                    <th>Isi Surat</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)

                                @foreach ($sm as $item)
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td> {{ $item->sm_asal }} </td>
                                        <td> {{ $item->sm_desc }} </td>
                                        <td> {{ $item->sm_masuk }} </td>

                                        <td>
                                            <a href="{{ url('suratmasuk/detail/' . $item->sm_id) }}" class="btn btn-sm btn-primary btn-circle">
                                                <i class="fas fa-info"></i>
                                            </a>
                                            <a href="{{ url('suratmasuk/edit/' . $item->sm_id) }}" class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <div onclick="deleteModal({{ $item->sm_id }})" class="btn btn-sm btn-danger btn-circle">
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

                {{-- modal add data --}}
                <div class="modal fade" id="addSuratMasuk" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addSuratMasukLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addSuratMasukLabel">Tambah Data Surat Masuk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ url('/suratmasuk/store') }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="sm_asal">Asal Surat</label>
                                            <input type="text" class="form-control" id="sm_asal" required name="sm_asal">
                                        </div>

                                        <div class="form-group">
                                            <label for="sm_no">No. Surat</label>
                                            <input type="text" class="form-control" id="sm_no" required name="sm_no">
                                        </div>

                                        <div class="form-group">
                                            <label for="sm_perihal">Perihal</label>
                                            <input type="text" class="form-control" id="sm_perihal" required name="sm_perihal">
                                        </div>

                                        <div class="form-group">
                                            <label for="sm_tgl">Tanggal</label>
                                            <input type="date" class="form-control" id="sm_tgl" required name="sm_tgl">
                                        </div>

                                        <div class="form-group">
                                            <label for="sm_masuk">Tgl Masuk</label>
                                            <input type="date" class="form-control" id="sm_masuk" required name="sm_masuk">
                                        </div>

                                        <div class="form-group">
                                            <label for="sm_tujuan">Tujuan</label>
                                            <input type="text" class="form-control" id="sm_tujuan" required name="sm_tujuan">
                                        </div>

                                        <div class="form-group">
                                            <label for="sm_penerima">Penerima</label>
                                            <input type="text" class="form-control" id="sm_penerima" required name="sm_penerima">
                                        </div>

                                        <div class="form-group">
                                            <label for="sm_file">File Surat</label>
                                            <input type="file" class="form-control" id="sm_file" name="sm_file">
                                        </div>

                                        <div class="form-group">
                                            <label for="sm_desc">Deskripsi</label>
                                            <textarea name="sm_desc" id="sm_desc" cols="30" rows="10" class="form-control"></textarea>
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
                <div class="modal fade" id="deleteDataSurat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteDataSuratLabel" aria-hidden="true">
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
            </div>
        </div>
    </div>


@endsection
@section('script-custom')
    <script>
        function deleteModal(id) {
            $('#deleteDataSurat').modal('show');
            document.getElementById('modal-delete-form').setAttribute('action', 'suratmasuk/delete/' + id);
        }
    </script>
@endsection
