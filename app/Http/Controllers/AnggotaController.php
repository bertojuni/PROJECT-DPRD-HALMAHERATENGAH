<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use App\Models\PartaiModel;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    //
    public function __construct()
    {
        $this->anggota_model = new AnggotaModel();
        $this->partai_model = new PartaiModel();
    }

    public function index()
    {
        $data = [
            'partai' => $this->partai_model::get(),
            'anggota' => $this->anggota_model->getAllAnggota()
        ];

        return view('anggota.index', $data);
    }

    public function detail($id)
    {
        $data = [
            'anggota' => $this->anggota_model::where('anggota_id', $id)
                ->join('partai', 'partai.partai_id', 'anggota.partai_id')
                ->select('anggota.*', 'partai.partai_nama')
                ->first()
        ];

        return view('anggota.detail', $data);
    }

    public function store(Request $request)
    {
        $data = [
            'anggota_nama' => $request->anggota_nama,
            'anggota_jabatan' => $request->anggota_jabatan,
            'anggota_tempatlhr' => $request->anggota_tempatlhr,
            'anggota_tgllhr' => $request->anggota_tgllhr,
            'partai_id' => $request->partai_id,
            'anggota_pasangan' => $request->anggota_pasangan,
            'anggota_alamat' => $request->anggota_alamat,
            'anggota_nohp' => $request->anggota_nohp,
            'anggota_pekerjaan' => $request->anggota_pekerjaan,
            'anggota_email' => $request->anggota_email,
            'anggota_anak' => $request->anggota_anak,
            'anggota_ktp' => $request->anggota_ktp,
            'anggota_npwp' => $request->anggota_npwp,
            'anggota_bpjs' => $request->anggota_bpjs
        ];

        // dd($data);

        $this->anggota_model::create($data);

        return redirect('/anggota');
    }

    public function edit($id)
    {
        $data = [
            'id' => $id,
            'anggota' => $this->anggota_model::where('anggota_id', $id)
                ->join('partai', 'partai.partai_id', 'anggota.partai_id')
                ->select('anggota.*', 'partai.partai_nama')
                ->first(),

            'partai' => $this->partai_model::get()
        ];

        return view('anggota.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'anggota_nama' => $request->anggota_nama,
            'anggota_jabatan' => $request->anggota_jabatan,
            'anggota_tempatlhr' => $request->anggota_tempatlhr,
            'anggota_tgllhr' => $request->anggota_tgllhr,
            'partai_id' => $request->partai_id,
            'anggota_pasangan' => $request->anggota_pasangan,
            'anggota_alamat' => $request->anggota_alamat,
            'anggota_nohp' => $request->anggota_nohp,
            'anggota_pekerjaan' => $request->anggota_pekerjaan,
            'anggota_email' => $request->anggota_email,
            'anggota_anak' => $request->anggota_anak,
            'anggota_ktp' => $request->anggota_ktp,
            'anggota_npwp' => $request->anggota_npwp,
            'anggota_bpjs' => $request->anggota_bpjs
        ];

        $this->anggota_model::where('anggota_id', $id)->update($data);

        return redirect('/anggota');
    }

    public function delete($id) {
        $data = $this->anggota_model::where('anggota_id', $id)->delete();

        return redirect("/anggota");
    }
}
