<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\JenisPerjalananModel;
use App\Models\ProvinceModel;
use App\Models\RekeningModel;
use App\Models\SettingModel;
use App\Models\SPPDDocumentModel;
use App\Models\SPPDModel;
use App\Models\SPTDocumentModel;
use App\Models\SubdistrictModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use PDF;

class SPPDController extends Controller
{
    public function __construct()
    {
        $this->sppd_model = new SPPDModel();
    }
    //
    public function index() {
        $data = [
            'sppd' => SPPDModel::join('province', 'sppd.sppd_tujuan_prov', 'province.province_id')
                                ->join('city', 'sppd.sppd_tujuan_city', 'city.city_id')
                                ->join('subdistrict', 'sppd.sppd_tujuan_subdis', 'subdistrict.subdistrict_id')
                                ->join('jenis_perjalanan', 'sppd.sppd_jenis', 'jenis_perjalanan.jp_id')
                                ->select('sppd.*', 'province.province', 'city.city_name', 'subdistrict.subdistrict_name', 'jenis_perjalanan.jp_nama')
                                ->get()
        ];


        return view('sppd.index', $data);
    }

    public function create() {
        $data = [
            'province_default' => 20,
            'city_default' => 140,
            'subdistrict_default' => 1943,

            'city_asal' => CityModel::where('province_id', 20)->get(),
            'subdistrict_asal' => SubdistrictModel::where('city_id', 140)->get(), 

            'province' => ProvinceModel::get(),
            'city' => CityModel::get(),
            'jenis_perjalanan' => JenisPerjalananModel::get(),
            'rekening' => RekeningModel::get()
        ];

        return view('sppd.create', $data);
    }

    public function store(Request $request) {
        // $nomor_sppd = '';

        $data = [
            'sppd_desc' => $request->sppd_desc,
            'sppd_asal' => $request->sppd_asal_subdis,
            'sppd_tujuan_prov' => $request->sppd_tujuan_prov,
            'sppd_tujuan_city' => $request->sppd_tujuan_city,
            'sppd_tujuan_subdis' => $request->sppd_tujuan_subdis,
            'sppd_waktu' => $request->sppd_waktu,
            'sppd_berangkat' => $request->sppd_berangkat,
            'sppd_kembali' => $request->sppd_kembali,
            'sppd_jenis' => $request->sppd_jenis,
            'sppd_rek' => $request->sppd_rek,
            'sppd_tgl' => date('Y-m-d'),
            'angkutan_perjalanan' => $request->angkutan_perjalanan,
            'anggota_dprd' => $request->anggota_dprd,
            'sppd_anggota_pegawai' => $request->sppd_anggota_pegawai,
            'sppd_anggota_ptt' => $request->sppd_anggota_ptt,
        ];

        $rules = [
            'sppd_desc' => 'required',
            'sppd_asal' => 'required|integer',
            'sppd_tujuan_prov' => 'required|integer',
            'sppd_tujuan_city' => 'required|integer',
            'sppd_tujuan_subdis' => 'required|integer',
            'sppd_waktu' => 'required',
            'sppd_berangkat' => 'required|date',
            'sppd_kembali' => 'required|date',
            'sppd_jenis' => 'required|integer',
            // 'sppd_rek' => 'required|integer',
            'sppd_tgl' => 'required|date',
            'anggota_dprd' => 'required',
            // 'sppd_anggota_pegawai' => 'required',
            // 'sppd_anggota_ptt' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            dd($validator);
        }

        $jabatan_ttd = SettingModel::where('setting_name', 'nama_ttd_sppd')->first();
        $nama_ttd = SettingModel::where('setting_name', 'jabatan_ttd_sppd')->first();
        $nip_ttd = SettingModel::where('setting_name', 'nip_ttd_sppd')->first();

        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $sppd_checklist = [
            'deskripsi' => $request->sppd_desc,
            'angkutan_perjalanan' => $request->angkutan_perjalanan,
            'asal' => $request->sppd_asal_subdis,
            'tujuan' => $request->sppd_tujuan_subdis,
            'lama' => $request->sppd_waktu,
            'tgl_berangkat' => date('d ', strtotime($request->sppd_berangkat)) . $bulan[(int) date('m ', strtotime($request->sppd_berangkat)) - 1] . ' ' . date('Y', strtotime($request->sppd_berangkat)),
            'tgl_kembali' => date('d ', strtotime($request->sppd_kembali)) . $bulan[(int) date('m ', strtotime($request->sppd_kembali)) -1] . ' ' . date('Y', strtotime($request->sppd_kembali)),
            'ttd_nama' => $nama_ttd->setting_value,
            'ttd_jabatan' => $jabatan_ttd->setting_value,
            'ttd_nip' => $nip_ttd->setting_value,
            'tgl_now' => date('d ', time()) . $bulan[(int) date('m ',time()) -1] . ' ' . date('Y', time())
        ];

        // dd($sppd_checklist);

        $documentcontrol = new DocumentController();

        $documentcontrol->create_sppd_document();
        // return view('sppd/doc/sptcreate');

        $pdfSppd = PDF::loadview('sppd/doc/sppdcreate', $sppd_checklist);
        $sppdFileName = date('Ymd') . '-' . time() . '-' . md5(time()) . '.pdf';
        $pdfSppd->save(public_path('/document/sppd/' . $sppdFileName));

        $pdfSpt = PDF::loadview('sppd/doc/sptcreate');
        $sptFileName = date('Ymd') . '-' . time() . '-' . md5(time()) . '.pdf';
        $pdfSpt->save(public_path('/document/spt/' . $sptFileName));

        // create kode surat
        try {
            $datacreatedsppd = SPPDModel::create($data);
        } catch (\Exception $th) {
            // return redirect('/sppd')->withErrors('error', 'error insert data');
            dd($th);
        }

        // file to db
        $created_sppd = SPPDDocumentModel::create([
            'id_sppd' => $datacreatedsppd->sppd_id,
            'path' => $sppdFileName,
            'type' => 'once',
            'title' => 'SPPD - ' . $request->anggota_dprd
        ]);

        $created_sppd = SPTDocumentModel::create([
            'id_sppd' => $datacreatedsppd->sppd_id,
            'path' => $sptFileName,
            'type' => 'once',
            'title' => 'SPT - ' . $request->anggota_dprd
        ]);

        return redirect('/sppd')->with('success_message', 'SPPD berhasil dibuat!');

    }

    public function detail($id) {
        $data = [
            'sppd' => SPPDModel::where('sppd_id', $id)->first()
        ];

        dd($data);

        if($data['sppd'] == null) {
            return redirect('/sppd')->with('error_not_found', 'Data yang Anda cari tidak ada!');
        }

        // dd($data);

        return view('sppd.detail', $data);
    }

    public function delete($id) {
        $datasearch = SPPDModel::where('sppd_id', $id)->first();

        if($datasearch) {
            SPPDModel::where('sppd_id', $id)->delete();
        }

        return redirect('/sppd');
    }
}
