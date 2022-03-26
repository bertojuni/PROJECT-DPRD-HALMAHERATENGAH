<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* tr {
            padding: 0px;
        }

        td {
            padding: 0px;
        }

        td > div {
            padding: 0px; */
        }

    </style>
</head>

<body style="font-size: 11px;">

    <div class="mt-4 ml-4">
        <div class="text-center h4">
            <div>
                Surat Perintah Perjalanan Dinas
            </div>
            <div>
                (SPPD)
            </div>
        </div>
        <table class='table' style="padding: 0;">
            <tbody>
                <tr>
                    <td>
                        1.
                    </td>
                    <td>
                        Pejabat yang memberi perintah
                    </td>
                    <td>
                        Sekretaris DPRD Kabupaten Halmahera Tengah
                    </td>
                </tr>

                <tr>
                    <td>
                        2.
                    </td>
                    <td>
                        Nama Pegawai yang diperintah
                    </td>
                    <td>
                        <b>AMRIN HAKIM</b>
                    </td>
                </tr>

                <tr>
                    <td>
                        3.
                    </td>
                    <td>
                        <ol type="a">
                            <li>
                                Pangkat dan Golongan Menurut PP No. 6 Tahun 1997
                            </li>
                            <li>
                                Jabatan
                            </li>
                            <li>
                                Tingkat menurut laporan Peraturan Perjalanan
                            </li>
                        </ol>
                    </td>
                    <td>
                        Staf Sekretariat DPRD Kabupaten Halmahera Tengah (Pegawai Tidak Tetap)
                    </td>
                </tr>

                <tr>
                    <td>
                        4.
                    </td>
                    <td>
                        Maksud Perjalanan Dinas
                    </td>
                    <td>
                        {{$deskripsi}}
                    </td>
                </tr>

                <tr>
                    <td>
                        5.
                    </td>
                    <td>
                        Alat Angkut yang dipergunakan
                    </td>
                    <td>
                        {{$angkutan_perjalanan}}
                    </td>
                </tr>

                <tr>
                    <td>
                        6.
                    </td>
                    <td>
                        <ol>
                            <li>Tempat berangkat</li>
                            <li>Tempat harus kembali</li>
                        </ol>
                    </td>
                    <td>
                        <ul style="list-style-type: none; padding: 0">
                            <li> {{$asal}} </li>
                            <li> {{$tujuan}} </li>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <td>
                        7.
                    </td>
                    <td>
                        <ol>
                            <li>
                                Lamanya Perjalanan Dinas
                            </li>
                            <li>
                                Tanggal berangkat
                            </li>
                            <li>
                                Tanggal harus kembali
                            </li>
                        </ol>
                    </td>
                    <td>
                        <ul style="list-style-type: none; padding: 0">
                            <li>
                                {{$lama}} hari
                            </li>
                            <li>
                                {{$tgl_berangkat}}
                            </li>
                            <li>
                                {{$tgl_kembali}}
                            </li>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <td>
                        8.
                    </td>
                    <td>
                        Pengikut
                    </td>
                    <td>

                    </td>
                </tr>

                <tr>
                    <td>
                        9.
                    </td>
                    <td>
                        Pembebanan Anggaran
                        <ol>
                            <li>Instansi</li>
                            <li>Mata Anggaran</li>
                        </ol>
                    </td>
                    <td>
                        <br>
                        <ul style="list-style-type: none; padding: 0">
                            <li>
                                Sekretariat DPRD Kabupaten Halmahera Tengah
                            </li>
                            <li>
                                4. 01 04 15 05 5 2 2 15 01
                            </li>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <td>
                        10.
                    </td>
                    <td>
                        Keterangan lain-lain
                    </td>
                    <td>

                    </td>
                </tr>

            </tbody>
        </table>

        <div class="row">
            {{-- <div class="col col-sm col-xs col-m">
                <div class="text-center">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <table>
                                <tr>
                                    <td>Dikeluarkan di  &nbsp;</td>
                                    <td> : </td>
                                    <td>&nbsp;  Weda</td>
                                </tr>
                                <tr>
                                    <td>Pada tanggal  &nbsp;</td>
                                    <td> : </td>
                                    <td>&nbsp;  07 September 2022</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <br>
                <br>

                <div class="text-center">
                    <div>
                        SEKRETARIS DEWAN PERWAKILAN RAKYAT DAERAH
                    </div>
                    <div>
                        KABUPATEN HALMAHERA TENGAH
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="font-weight-bold">
                        RIVANI   ABDURRADJAK, S.Hut.M.Sc
                    </div>
                    <div>
                        Pembina   Tk. I    IV/b
                    </div>
                    <div>
                        NIP. 19751113 200112 2 003
                    </div>
                </div>
            </div> --}}

            <div class="col">
                <div style="clear:both; position:relative;">
                    <div style="position:absolute; left:0pt; width:192pt;">

                    </div>
                    <div style="margin-left:200pt;">
                        <div class="row justify-content-center" style="margin-left: 100px">
                            <div class="">
                                <table>
                                    <tr>
                                        <td>Dikeluarkan di &nbsp;</td>
                                        <td> : </td>
                                        <td>&nbsp; Weda</td>
                                    </tr>
                                    <tr>
                                        <td>Pada tanggal &nbsp;</td>
                                        <td> : </td>
                                        <td>&nbsp; {{$tgl_now}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="text-center">
                            <div>
                                SEKRETARIS DEWAN PERWAKILAN RAKYAT DAERAH
                            </div>
                            <div>
                                KABUPATEN HALMAHERA TENGAH
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="font-weight-bold">
                                {{$ttd_nama}}
                            </div>
                            <div>
                                {{$ttd_jabatan}}
                            </div>
                            <div>
                                {{$ttd_nip}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
