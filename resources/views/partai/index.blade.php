@extends('template.default')

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Data Partai</h6>
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
                                    <th>Nama Partai</th>
                                    <th>Logo Partai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($partai as $p)
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td> {{ $p->partai_nama }} </td>
                                        <td> {{ $p->partai_logo }} </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning btn-circle">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <div onclick="deleteModal({{ $p->partai_id }})"
                                                class="btn btn-sm btn-danger btn-circle">
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
    <div class="modal fade" id="addDataPartai" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="addDataPartaiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataPartaiLabel">Tambah Data Partai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/partai/store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div>
                            <div class="form-group">
                                <label for="partai_nama">Nama Partai</label>
                                <input type="text" class="form-control" id="partai_nama" required name="partai_nama">
                            </div>

                            <div class="form-group">
                                <label for="partai_logo">Logo Partai</label>
                                <input type="file" class="form-control" id="partai_logo" required name="partai_logo">
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
    <div class="modal fade" id="deleteDataPartai" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="deleteDataPartaiLabel" aria-hidden="true">
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
            $('#deleteDataPartai').modal('show');
            document.getElementById('modal-delete-form').setAttribute('action', 'partai/delete/' + id);
        }
    </script>
@endsection
