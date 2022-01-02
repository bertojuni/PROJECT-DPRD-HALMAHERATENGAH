@extends('template.default')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/sppd') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Data SPPD</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col">
                                    <div class="font-weight-bold">
                                        No SPPD
                                    </div>
                                    <div class="mt-2">
                                        {{$sppd->sppd_no}}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="font-weight-bold">
                                        SPPD Deskripsi
                                    </div>
                                    <div class="mt-2">
                                        {{$sppd->sppd_desc}}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="font-weight-bold">
                                        Asal
                                    </div>
                                    <div class="mt-2">
                                        {{$sppd->asalSubdistrict}}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="font-weight-bold">
                                        Provinsi Tujuan
                                    </div>
                                    <div class="mt-2">
                                        {{$sppd->tujuanProvince}}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="font-weight-bold">
                                        Kota Tujuan
                                    </div>
                                    <div class="mt-2">
                                        {{$sppd->tujuanCity}}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="font-weight-bold">
                                        Kecamatan Tujuan
                                    </div>
                                    <div class="mt-2">
                                        {{$sppd->tujuanSubdis}}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="font-weight-bold">
                                        Tanggal Berangkat
                                    </div>
                                    <div class="mt-2">
                                        {{$sppd->sppd_berangkat}}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="font-weight-bold">
                                        Tanggal Kembali
                                    </div>
                                    <div class="mt-2">
                                        {{$sppd->sppd_kembali}}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="font-weight-bold">
                                        Jenis SPPD
                                    </div>
                                    <div class="mt-2">
                                        {{$sppd->jp_nama}}
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="font-weight-bold">
                                        Rekening Penerima
                                    </div>
                                    <div class="mt-2">
                                        [{{$sppd->rek_bank}}] - {{$sppd->rek_no}} - {{$sppd->rek_nama}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
