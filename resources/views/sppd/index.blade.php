@extends('template.default')

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Data SPPD</h6>
                </div>
                <div class="card-body">
                    @if (session('error_not_found'))
                        <div class="alert alert-danger">
                            Data yang Anda cari tidak ditemukan!
                        </div>
                    @endif

                    @if (session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message') }}
                        </div>
                    @endif

                    <div class="mb-3 mt-1">
                        <a target="_blank"  class="btn btn-sm btn-primary" href="/sppd/add">
                            <i class="fas fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No SPPD</th>
                                    <th>Deskripsi</th>
                                    <th>Tujuan</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($sppd as $item)
                                <tr>
                                    <td> {{$i}} </td>
                                    <td> {{$item->sppd_no}} </td>
                                    <td> {{$item->sppd_desc}} </td>
                                    <td> {{$item->province}}, {{$item->city_name}}, {{$item->subdistrict_name}} </td>
                                    <td> {{$item->jp_nama}} </td>
                                    <td>
                                        <a href="{{url('sppd/detail/' . $item->sppd_id)}}" class="btn btn-sm btn-primary"> <i class="fas fa-info"></i></a>
                                        <a href="" class="btn btn-sm btn-warning"> <i class="fas fa-pencil-alt"></i></a>
                                        <div onclick="deleteModal({{ $item->sppd_id }})" class="btn btn-sm btn-danger">
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


    {{-- modal delete confirmation --}}
    <div class="modal fade" id="deleteDataSPPD" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteDataPegawaiLabel" aria-hidden="true">
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
            $('#deleteDataSPPD').modal('show');
            document.getElementById('modal-delete-form').setAttribute('action', 'sppd/delete/' + id);
        }
    </script>
@endsection
