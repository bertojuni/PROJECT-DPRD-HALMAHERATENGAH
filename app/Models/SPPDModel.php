<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPPDModel extends Model
{
    use HasFactory;
    protected $table = 'sppd';
    protected $primaryKey = 'sppd_id';

    protected $fillable = ['sppd_id', 'sppd_no', 'sppd_desc', 'sppd_asal', 'sppd_tujuan_prov', 'sppd_tujuan_city', 'sppd_tujuan_subdis', 'sppd_waktu', 'sppd_berangkat', 'sppd_kembali', 'sppd_jenis', 'sppd_rek', 'sppd_tgl', 'created_at', 'updated_at'];

    public function generateKodeSPPD() {
        $data = SPPDModel::orderBy('sppd_id')->first();

        if($data != null) {
            $code_last = $data->sppd_no;

            $code_arr = explode("/", $code_last);

            $number_last = $code_arr[count($code_arr) - 1];
            $number_last += 1;

            $month = date('m');
            $year = date('Y');
            $name = 'SETWAN';
            $nomor = $month . '/' . $year . '/' . $name . '/' . $number_last;
            
            return $nomor;
        }
    }

    public function getDetail($id) {
        $data = SPPDModel::where('sppd_id', $id)
                            ->join('province', 'province.province_id', 'sppd.sppd_tujuan_prov')
                            ->join('city', 'city.city_id', 'sppd.sppd_tujuan_city')
                            ->join('jenis_perjalanan', 'jenis_perjalanan.jp_id', 'sppd.sppd_jenis')
                            ->join('rekening', 'rekening.rek_id', 'sppd.sppd_rek')
                            ->join('subdistrict', 'subdistrict.subdistrict_id', 'sppd.sppd_tujuan_subdis')
                            ->select('sppd.*', 'city.city_name as tujuanCity', 'province.province as tujuanProvince', 'subdistrict.subdistrict_name as tujuanSubdis', 'rekening.*', 'jenis_perjalanan.*')
                            ->first();
        // query data asal
        if($data != null) {
            $asal_sppd = SPPDModel::where('sppd_id', $id)
                                ->join('subdistrict', 'subdistrict.subdistrict_id', 'sppd.sppd_asal')
                                ->first();

            $data->asalSubdistrict = $asal_sppd->subdistrict_name;
        }

        
        return $data;
    }
}
