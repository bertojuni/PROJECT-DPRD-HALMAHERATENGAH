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
}
