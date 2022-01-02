@extends('template.default')

@section('css-custom')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')

    <div class="row" id="app">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data SPPD</h6>
                </div>
                <div class="card-body">
                    @if (session('error_not_found'))
                        <div class="alert alert-danger">
                            Data yang Anda cari tidak ditemukan!
                        </div>
                    @endif

                    <form action="{{url('/sppd/store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="sppd_desc">Deskripsi SPPD</label>
                            <textarea type="text" id="sppd_desc" name="sppd_desc" class="form-control" v-model="input.sppd_desc"></textarea>
                        </div>

                        <hr class="mt-4">

                        <div class="font-weight-bold">
                            Asal
                        </div>

                        <div class="text-right">
                            <div class="btn btn-success" v-on:click="loadAsalData()">Refresh</div>
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_asal">Asal Provinsi</label>
                            <br>
                            <select class="selectpicker" name="sppd_asal_prov" id="sppd_asal_prov" data-live-search="true" data-width="100%" v-model="input.sppd_asal_prov">
                                <option value="null">Silahkan Pilih</option>
                                <option v-for="item in option.asalProv" :value="item.province_id" v-text="item.province" ></option>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_asal">Asal Kota</label>
                            <br>
                            <select class="selectpicker" name="sppd_asal_city" id="sppd_asal_city" data-live-search="true" data-width="100%" v-model="input.sppd_asal_city">
                                <option value="null">Silahkan Pilih</option>
                                <option v-for="item in option.asalCity" :value="item.city_id" v-text="item.city_name"></option>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_asal">Asal Kecamatan</label>
                            <br>
                            <select class="selectpicker" name="sppd_asal_subdis" id="sppd_asal_subdis" data-live-search="true" data-width="100%" v-model="input.sppd_asal_subdis">
                                <option value="null">Silahkan Pilih</option>
                                <option v-for="item in option.asalSubdis" :value="item.subdistrict_id" v-text="item.subdistrict_name" ></option>
                            </select>
                        </div>

                        <hr class="mt-4">

                        <div class="font-weight-bold">
                            Tujuan
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_tujuan_prov">Provinsi Tujuan</label>
                            <br>
                            <select class="selectpicker" name="sppd_tujuan_prov" id="sppd_tujuan_prov" data-live-search="true" data-width="100%" v-model="input.sppd_tujuan_prov">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($province as $p)
                                    <option value="{{ $p->province_id }}"> {{ $p->province }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_tujuan_city">Kota Tujuan</label>
                            <br>
                            <select class="selectpicker" name="sppd_tujuan_city" id="sppd_tujuan_city" data-live-search="true" data-width="100%" v-model="input.sppd_tujuan_city">
                                {{-- <option value="" v-for="index in input.city" :id="index.city_id" v-html="index.city_name"></option> --}}
                                <option v-for="item in option.city" :value="item.city_id" v-text="item.city_name"> </option>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_tujuan_subdis">Kecamatan Tujuan</label>
                            <br>
                            <select class="selectpicker" name="sppd_tujuan_subdis" id="sppd_tujuan_subdis" data-live-search="true" data-width="100%" v-model="input.sppd_tujuan_subdis">
                                {{-- <option value="" v-for="index in input.city" :id="index.city_id" v-html="index.city_name"></option> --}}
                                <option v-for="item in option.subdistrict" :value="item.subdistrict_id" v-text="item.subdistrict_name"> </option>
                            </select>
                        </div>

                        <hr class="mt-4">

                        <div class="form-group mt-4">
                            <label for="sppd_waktu">Lama Waktu (Hari)</label>
                            <input type="number" class="form-control" id="sppd_waktu" name="sppd_waktu" v-model="input.lama_waktu">
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_berangkat">Tgl Berangkat</label>
                            <input type="date" class="form-control" id="sppd_berangkat" name="sppd_berangkat" v-model="input.tgl_berangkat">
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_kembali">Tgl Kembali</label>
                            <input type="date" class="form-control" id="sppd_kembali" name="sppd_kembali" v-model="input.tgl_kembali">
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_jenis">Jenis Perjalanan</label>
                            <select name="sppd_jenis" id="sppd_jenis" class="form-control" v-model="input.jenis_perjalanan">
                                @foreach ($jenis_perjalanan as $jp)
                                    <option value="{{ $jp->jp_id }}"> {{ $jp->jp_nama }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="angkutan_perjalanan">Angkutan Perjalanan</label>
                            <select name="angkutan_perjalanan" id="angkutan_perjalanan" class="form-control">
                                <option value="Angkutan Darat">Angkutan Darat</option>
                                <option value="Angkutan Udara">Angkutan Udara</option>
                                <option value="Angkutan Laut">Angkutan Laut</option>
                            </select>
                        </div>

                        <hr>

                        {{-- anggota --}}
                        <div class="form-group mt-4">
                            <div class="font-weight-bold">Anggota SPPD</div>
                            <div>Silahkan masukkan data yang terlibat dalam SPPD</div>
                        </div>

                        <div class="text-right">
                            <div class="btn btn-success" v-on:click="loadAnggotaDPRD()">Refresh</div>
                        </div>

                        {{-- anggota dprd --}}
                        <div class="form-group mt-4">
                            <label for="anggota_dprd">Anggota DPRD</label>
                            <br>
                            <select class="selectpicker" multiple name="anggota_dprd" id="sppd_anggota_dprd" data-live-search="true" data-width="100%" v-model="input.anggota_dprd">
                                <option value="">Silahkan Pilih</option>
                                <option v-for="item in option.anggotaDPRD" :value="item.anggota_id"> @{{item.anggota_nama}} [@{{item.partai_nama}}] </option>
                            </select>
                        </div>

                        {{-- anggota pendamping lain [pegawai] --}}
                        <div class="form-group mt-4">
                            <label for="sppd_anggota_pegawai">Anggota Pendamping Lain [Pegawai]</label>
                            <br>
                            <select class="selectpicker" multiple name="sppd_anggota_pegawai" id="sppd_anggota_pegawai" data-live-search="true" data-width="100%" v-model="input.anggota_pegawai">
                                <option value="">Silahkan Pilih</option>
                                <option v-for="item in option.pegawai" :value="item.pg_id"> @{{item.pg_nama}} [@{{item.pg_jabatan}}] </option>
                            </select>
                        </div>

                        {{-- anggota pendamping lain [ptt] --}}
                        <div class="form-group mt-4">
                            <label for="sppd_anggota_ptt">Anggota Pendamping Lain [PTT]</label>
                            <br>
                            <select class="selectpicker" multiple name="sppd_anggota_ptt" id="sppd_anggota_ptt" data-live-search="true" data-width="100%" v-model="input.anggota_ptt">
                                <option value="">Silahkan Pilih</option>
                                <option v-for="item in option.ptt" :value="item.ppt_id"> @{{item.ppt_nama}} [@{{item.ppt_bagian}}] </option>
                            </select>
                        </div>
                        
                        <br>
                        <button class="btn btn-primary px-4">Tambah SPPD</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('script-custom')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <script src="{{ env('VUE_JS') }}"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                urlSite: '<?= env('APP_URL') ?>',
                input: {
                    sppd_desc: null,
                    sppd_tujuan_prov: "",
                    sppd_tujuan_city: "",
                    sppd_tujuan_subdis: "",

                    sppd_asal_prov: '<?= $province_default ?>',
                    sppd_asal_city: '<?= $city_default ?>',
                    sppd_asal_subdis: '<?= $subdistrict_default ?>',

                    lama_waktu: null,
                    tgl_berangkat: null,
                    tgl_kembali: null,
                    jenis_perjalnan: null,
                    rekening: null,

                    anggota_dprd: [],
                    anggota_pegawai: [],
                    anggota_ptt: []
                },

                option: {
                    city: [],
                    province: [],
                    subdistrict: [],

                    asalProv: [],
                    asalCity: [],
                    asalSubdis: [],

                    anggotaDPRD: [],
                    pegawai: [],
                    ptt: []
                }
            },

            methods: {
                loadAsalData() {
                    // load prov
                    let theVue = this;
                    fetch(`${this.urlSite}api/getallprovince`).then(response => response.json()).then(
                        json => {
                            this.option.asalProv = json.data;
                            console.log(json)
                            theVue.$nextTick(function() {
                                $('#sppd_asal_prov').selectpicker('refresh');
                            });
                        }
                    );

                    // load city
                    fetch(`${this.urlSite}api/getcityprovince/` + '<?= $province_default ?>').then(response => response.json()).then(
                        json => {
                            this.option.asalCity = json.data;
                            console.log(json)
                            theVue.$nextTick(function() {
                                $('#sppd_asal_city').selectpicker('refresh');
                            });
                        }
                    );

                    fetch(`${this.urlSite}api/getsubdistrictcity/` + '<?= $city_default ?>').then(response => response.json()).then(
                        json => {
                            this.option.asalSubdis = json.data;
                            console.log(json)
                            theVue.$nextTick(function() {
                                $('#sppd_asal_subdis').selectpicker('refresh');
                            });
                        }
                    );

                    
                },

                loadAnggotaDPRD() {
                    let theVue = this;

                    fetch(`${this.urlSite}api/getallanggota/`).then(response => response.json()).then(
                        json => {
                            this.option.anggotaDPRD = json.data;
                            console.log(json)
                            theVue.$nextTick(function() {
                                $('#sppd_anggota_dprd').selectpicker('refresh');
                            });
                        }
                    );
                },

                loadAnggotaPendampingPegawai() {
                    let theVue = this;

                    fetch(`${this.urlSite}api/getallpegawai`).then(response => response.json()).then(
                        json => {
                            this.option.pegawai = json.data;
                            console.log(json)
                            theVue.$nextTick(function() {
                                $('#sppd_anggota_pegawai').selectpicker('refresh');
                            });
                        }
                    );
                },

                loadAnggotaPendampingPTT() {
                    let theVue = this;

                    fetch(`${this.urlSite}api/getallptt`).then(response => response.json()).then(
                        json => {
                            this.option.ptt = json.data;
                            console.log(json)
                            theVue.$nextTick(function() {
                                $('#sppd_anggota_ptt').selectpicker('refresh');
                            });
                        }
                    );
                }
            },

            beforeMount() {
                this.loadAsalData();

                this.loadAnggotaDPRD();
                this.loadAnggotaPendampingPegawai();
                this.loadAnggotaPendampingPTT();
            },

            watch: {
                "input.sppd_tujuan_prov": function() {
                    let theVue = this;

                    theVue.$nextTick(function() {
                        $('#sppd_tujuan_city').selectpicker('refresh');
                    });
                    theVue.$nextTick(function() {
                        $('#sppd_tujuan_subdis').selectpicker('refresh');
                    });

                    // console.log(`${this.urlSite}api/getcityprovince/${this.input.sppd_tujuan_prov}`);
                    fetch(`${this.urlSite}api/getcityprovince/${this.input.sppd_tujuan_prov}`).then(response => response.json()).then(
                        json => {
                            this.option.city = json.data;
                            theVue.$nextTick(function() {
                                $('#sppd_tujuan_city').selectpicker('refresh');
                            });
                        }
                    );
                },

                "input.sppd_tujuan_city": function() {
                    let theVue2 = this;
                    // console.log(`${this.urlSite}api/getcityprovince/${this.input.sppd_tujuan_prov}`);
                    fetch(`${this.urlSite}api/getsubdistrictcity/${this.input.sppd_tujuan_city}`).then(response => response.json()).then(
                        json => {
                            this.option.subdistrict = json.data;
                            console.log(json)
                            theVue2.$nextTick(function() {
                                $('#sppd_tujuan_subdis').selectpicker('refresh');
                            });
                        }
                    );
                },

                "input.sppd_asal_prov": function() {
                    let theVue = this;

                    theVue.$nextTick(function() {
                        $('#sppd_asal_city').selectpicker('refresh');
                    });
                    theVue.$nextTick(function() {
                        $('#sppd_asal_subdis').selectpicker('refresh');
                    });

                    // console.log(`${this.urlSite}api/getcityprovince/${this.input.sppd_tujuan_prov}`);
                    fetch(`${this.urlSite}api/getcityprovince/${this.input.sppd_asal_prov}`).then(response => response.json()).then(
                        json => {
                            this.option.asalCity = json.data;
                            theVue.$nextTick(function() {
                                $('#sppd_asal_city').selectpicker('refresh');
                            });
                        }
                    );
                },

                "input.sppd_asal_city": function() {
                    let theVue2 = this;
                    // console.log(`${this.urlSite}api/getcityprovince/${this.input.sppd_asal_prov}`);
                    fetch(`${this.urlSite}api/getsubdistrictcity/${this.input.sppd_asal_city}`).then(response => response.json()).then(
                        json => {
                            this.option.asalSubdis = json.data;
                            console.log(json)
                            theVue2.$nextTick(function() {
                                $('#sppd_asal_subdis').selectpicker('refresh');
                            });
                        }
                    );
                },
            }
        })
    </script>

@endsection
