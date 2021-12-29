<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\JenisPerjalananModel;
use App\Models\ProvinceModel;
use App\Models\RekeningModel;
use App\Models\SPPDModel;
use App\Models\SubdistrictModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SPPDController extends Controller
{
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
            'sppd_rek' => 'required|integer',
            'sppd_tgl' => 'required|date',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            dd($validator);
        }

        // create kode surat
        $sppd_model = new SPPDModel();
        $nomor = $sppd_model->generateKodeSPPD();

        $data['sppd_no'] = $nomor;

        try {
            SPPDModel::create($data);
        } catch (\Exception $th) {
            return redirect('/sppd')->withErrors('error', 'error insert data');
        }

        return redirect('/sppd')->with('success', 'Success membuat SPPD');

    }
}
