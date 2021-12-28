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

                        <div class="form-group mt-4">
                            <label for="sppd_asal">Asal</label>
                            <br>
                            <select class="selectpicker" name="sppd_asal" id="sppd_asal" data-live-search="true" data-width="100%">
                                <option value="null">Silahkan Pilih</option>
                                @foreach ($province as $p)
                                    <option value="{{ $p->province_id }}"> {{ $p->province }} </option>
                                @endforeach
                            </select>
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

                        <div class="form-group mt-4">
                            <label for="sppd_waktu">Lama Waktu (Hari)</label>
                            <input type="number" class="form-control" id="sppd_waktu" name="sppd_waktu">
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_berangkat">Tgl Berangkat</label>
                            <input type="date" class="form-control" id="sppd_berangkat" name="sppd_berangkat">
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_kembali">Tgl Kembali</label>
                            <input type="date" class="form-control" id="sppd_kembali" name="sppd_kembali">
                        </div>

                        <div class="form-group mt-4">
                            <label for="sppd_jenis">Jenis Perjalanan</label>
                            <select name="sppd_jenis" id="sppd_jenis" class="form-control">
                                @foreach ($jenis_perjalanan as $jp)
                                    <option value="{{ $jp->jp_id }}"> {{ $jp->jp_nama }} </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group mt-4">
                            <label for="sppd_rek">Rekening</label>
                            <br>
                            <select name="sppd_rek" id="sppd_rek" class="form-control selectpicker" data-live-search="true" data-width="100%">
                                <option value="null">Pilih Rekening</option>
                                @foreach ($rekening as $rk)
                                    <option value="{{ $rk->rek_id }}"> {{ $rk->rek_no . ' - ' . $rk->rek_nama }} </option>
                                @endforeach
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
                    sppd_des: null,
                    sppd_tujuan_prov: "",
                    sppd_tujuan_city: "",
                    sppd_tujuan_subdis: ""
                },

                option: {
                    city: [],
                    province: [],
                    subdistrict: []
                }
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
                }
            }
        })
    </script>

@endsection