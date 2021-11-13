<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //
    //
    public function __construct()
    {
        $this->pegawai_model = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            'pegawai' => $this->pegawai_model::get()
        ];

        return view('pegawai.index', $data);
    }

    public function detail($id)
    {
        $data = [
            'anggota' => $this->pegawai_model::where('pg_id', $id)
                ->first()
        ];

        return view('pegawai.detail', $data);
    }

    public function store(Request $request)
    {
        $data = [
            'pg_nama' => $request->pg_nama,
            'pg_nip' => $request->pg_nip,
            'pg_gol' => $request->pg_gol,
            'pg_jabatan' => $request->pg_jabatan,
            'pg_tempatlhr' => $request->pg_tempatlhr,
            'pg_tgllhr' => $request->pg_tgllhr,
            'pg_status' => $request->pg_status,
            'pg_pasangan' => $request->pg_pasangan,
            'pg_alamat' => $request->pg_alamat,
            'pg_pendidikan' => $request->pg_pendidikan,
            'pg_kontak' => $request->pg_kontak,
            'pg_karpeg' => $request->pg_karpeg,
            'pg_email' => $request->pg_email,
            'pg_anak' => $request->pg_anak,
            'pg_ktp' => $request->pg_ktp,
            'pg_npwp' => $request->pg_npwp,
            'pg_bpjs' => $request->pg_bpjs
        ];

        // dd($data);

        $this->pegawai_model::create($data);

        return redirect('/pegawai');
    }

    public function edit($id)
    {
        $data = [
            'id' => $id,
            'pegawai' => $this->pegawai_model::where('pg_id', $id)
                ->first(),
        ];

        return view('pegawai.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'pg_nama' => $request->pg_nama,
            'pg_nip' => $request->pg_nip,
            'pg_gol' => $request->pg_gol,
            'pg_jabatan' => $request->pg_jabatan,
            'pg_tempatlhr' => $request->pg_tempatlhr,
            'pg_tgllhr' => $request->pg_tgllhr,
            'pg_status' => $request->pg_status,
            'pg_pasangan' => $request->pg_pasangan,
            'pg_alamat' => $request->pg_alamat,
            'pg_pendidikan' => $request->pg_pendidikan,
            'pg_kontak' => $request->pg_kontak,
            'pg_karpeg' => $request->pg_karpeg,
            'pg_email' => $request->pg_email,
            'pg_anak' => $request->pg_anak,
            'pg_ktp' => $request->pg_ktp,
            'pg_npwp' => $request->pg_npwp,
            'pg_bpjs' => $request->pg_bpjs
        ];

        // dd($data);

        $this->pegawai_model::where('pg_id', $id)->update($data);

        return redirect('/pegawai');
    }

    public function delete($id)
    {
        $data = $this->pegawai_model::where('pg_id', $id)->delete();

        return redirect("/pegawai");
    }
}
