@extends('template.default')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Surat Masuk</h6>
            </div>
            <div class="card-body">
                <div class="mb-3 mt-1">

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

                            <tr>

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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
<!--
@section('script-custom')
<script>
    function deleteModal(id) {
        $('#deleteDataPegawai').modal('show');
        document.getElementById('modal-delete-form').setAttribute('action', 'pegawai/delete/' + id);
    }
</script>
@endsection-->
