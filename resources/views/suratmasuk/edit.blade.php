@extends('template.default')

@section('content')
    <div class="row" id="app">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/suratmasuk') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Data Anggota</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('suratmasuk/update/' . $id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col">
                                {{-- asal surat --}}
                                <div class="form-group">
                                    <label for="sm_asal">Asal Surat</label>
                                    <input type="text" class="form-control" id="sm_asal" required name="sm_asal" value="{{ $sm->sm_asal }}">
                                </div>
                                {{-- no surat --}}
                                <div class="form-group">
                                    <label for="sm_no">No. Surat</label>
                                    <input type="text" class="form-control" id="sm_no" required name="sm_no" value="{{ $sm->sm_no }}">
                                </div>
                                {{-- sm perihak --}}
                                <div class="form-group">
                                    <label for="sm_perihal">Perihal Surat</label>
                                    <input type="text" class="form-control" id="sm_perihal" required name="sm_perihal" value="{{ $sm->sm_perihal }}">
                                </div>
                                {{-- sm tgl --}}
                                <div class="form-group">
                                    <label for="sm_tgl">Tgl Surat</label>
                                    <input type="date" class="form-control" id="sm_tgl" required name="sm_tgl" value="{{ $sm->sm_tgl }}">
                                </div>
                                {{-- sm masuk --}}
                                <div class="form-group">
                                    <label for="sm_masuk">Tgl Masuk</label>
                                    <input type="date" class="form-control" id="sm_masuk" required name="sm_masuk" value="{{ $sm->sm_masuk }}">
                                </div>
                                {{-- sm tujuan --}}
                                <div class="form-group">
                                    <label for="sm_tujuan">Tujuan Surat</label>
                                    <input type="text" class="form-control" id="sm_tujuan" required name="sm_tujuan" value="{{ $sm->sm_tujuan }}">
                                </div>
                                {{-- sm penerima --}}
                                <div class="form-group">
                                    <label for="sm_penerima">Penerima Surat</label>
                                    <input type="text" class="form-control" id="sm_penerima" required name="sm_penerima" value="{{ $sm->sm_penerima }}">
                                </div>
                                {{-- sm deskripsi --}}
                                <div class="form-group">
                                    <label for="sm_desc">Deskripsi Surat</label>
                                    <textarea class="form-control" name="sm_desc" id="sm_desc" cols="30" rows="10">{{ $sm->sm_desc }}</textarea>
                                </div>
                                
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="sm_file">File Surat</label>
                                    <div>
                                        @if ($sm->sm_file == null)
                                            <div class="alert alert-danger">
                                                <small>File pada surat ini tidak ada</small>
                                            </div>
                                            <hr>
                                            <div>
                                                <div>Ingin tambahkan file ? Silahkan upload di bawah</div>
                                                <div class="form-group mt-2">
                                                    <input type="file" class="form-control" name="sm_file" id="sm_file">
                                                </div>
                                            </div>
                                        @else
                                            <div class="btn btn-success">
                                                <a href="{{ url($sm->sm_file) }}" target="_blank" class="text-white">File Surat</a>
                                            </div>

                                            <hr>
                                            <div class="alert alert-primary">
                                                <small>Anda ingin mengubah file surat ? Silahkan upload ulang di bawah </small>
                                            </div>
                                            <hr>
                                            <select name="ganti_file_surat" id="ganti_file_surat" class="form-control" v-model="change_file">
                                                <option value="abaikan">Abaikan</option>
                                                <option value="ganti">Ganti File Surat</option>
                                                <option value="hapus">Hapus File Surat</option>
                                            </select>
                                            <hr>
                                            
                                            {{-- div hapus file surat --}}
                                            <div v-if="change_file == 'hapus'">
                                                <div class="alert alert-primary">
                                                    <small>Setelah Anda melakukan update, maka file surat akan terhapus!</small>
                                                </div>
                                            </div>

                                            <div v-if="change_file == 'ganti'">
                                                <div class="alert alert-primary">
                                                    <small>Silahkan update file surat di bawah</small>
                                                </div>

                                                <div class="mt-2 form-group">
                                                    <label for="update_file_sm">File Surat</label>
                                                    <input type="file" class="form-control" id="update_file_sm" name="update_file_sm">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                {{-- tombol submit --}}
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script-custom')
    <script src="{{ env('VUE_JS') }}"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                change_file: 'abaikan'
            }
        })
    </script>
@endsection
