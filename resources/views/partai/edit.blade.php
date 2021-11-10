@extends('template.default')

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/partai') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Data Partai</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img style="max-height: 300px" class="img-fluid" alt=""
                                src="{{url($partai->partai_logo)}}">
                        </div>
                        <div class="col-6">
                            <form action="/partai/update/{{$id}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="partai_nama">Nama Partai</label>
                                    <input type="text" class="form-control" id="partai_nama" required name="partai_nama"
                                        value="{{ $partai->partai_nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="partai_logo">Ganti Logo Partai</label>
                                    <input type="file" class="form-control" id="partai_logo" name="partai_logo">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary float-right m-1">Ubah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
