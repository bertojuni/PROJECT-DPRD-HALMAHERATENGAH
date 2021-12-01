<?php

namespace App\Http\Controllers;

use App\Models\AnggotaModel;
use App\Models\PartaiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        if($data['anggota'] == null) {
            return redirect('/anggota')->with('error_not_found', 'Data yang Anda cari tidak ada!');
        }

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

        $rules = [
            'anggota_nama' => 'required|string',
            'anggota_jabatan' => 'required|string',
            'anggota_tempatlhr' => 'required|string',
            'anggota_tgllhr' => 'required|string',
            'partai_id' => 'required',
            'anggota_pasangan' => 'required',
            'anggota_alamat' => 'required',
            'anggota_nohp' => 'required|string',
            'anggota_pekerjaan' => 'required|string',
            'anggota_email' => 'required|email',
            'anggota_anak' => 'required|integer',
            'anggota_ktp' => 'required|mimes:jpg,png,pdf',
            'anggota_npwp' => 'required|mimes:jpg,png,pdf',
            'anggota_bpjs' => 'required|mimes:jpg,png,pdf'
        ];

        $messages = [
            'anggota_nama.required' => 'Anda harus mengisi kolom nama',
            'anggota_jabatan.required' => 'Anda harus mengisi kolom jabatan',
            'anggota_tempatlhr.required' => 'Anda harus mengisi kolom tempat lahir',
            'anggota_tgllhr.required' => 'Anda harus mengisi kolom tgl lahir',
            'partai_id' => 'Anda harus mengisi partai yang bersangkutan dengan anggota',
            'anggota_pasangan' => 'Anda harus mengisi kolom nama anggota pasangan',
            'anggota_alamat' => 'Anda harus mengisi kolom alamat anggota',
            'anggota_nohp' => 'Anda harus mengisi kolom nomor HP',
            'anggota_pekerjaan' => 'Anda harus mengisi pekerjaan anggota',
            'anggota_email' => 'Anda harus mengisi alamt email',
            'anggota_anak' => 'Anda harus mengisi jumlah anak',
            'anggota_ktp' => 'Anda harus mengupload KTP anggota',
            'anggota_npwp' => 'Anda harus mengupload NPWP anggota',
            'anggota_bpjs' => 'Anda harus mengupload BPJS anggota'
        ];



        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return redirect('anggota')->withErrors($validator)->withInput();
        }

        // catch file
        $time_for_file = time();

        if ($request->file('anggota_ktp') != null) {
            $file_ktp = $request->file('anggota_ktp');
            $file_name = 'uploads/anggota/' . 'ktp_' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_ktp->getClientOriginalExtension();
            $file_ktp->move(public_path('uploads/anggota/'), $file_name);

            $data['anggota_ktp'] = $file_name;
        }

        if ($request->file('anggota_npwp') != null) {
            $file_npwp = $request->file('anggota_npwp');
            $file_name = 'uploads/anggota/' . 'npwp_' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_npwp->getClientOriginalExtension();
            $file_npwp->move(public_path('uploads/anggota/'), $file_name);

            $data['anggota_npwp'] = $file_name;
        }

        if ($request->file('anggota_bpjs') != null) {
            $file_bpjs = $request->file('anggota_bpjs');
            $file_name = 'uploads/anggota/' . 'bpjs_' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_bpjs->getClientOriginalExtension();
            $file_bpjs->move(public_path('uploads/anggota/'), $file_name);

            $data['anggota_bpjs'] = $file_name;
        }

        // dd($data);

        AnggotaModel::create($data);

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

        if($data['anggota'] == null) {
            return redirect('/anggota')->with('error_not_found', 'Data yang Anda cari tidak ada!');
        }

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

    public function delete($id)
    {
        $data = $this->anggota_model::where('anggota_id', $id)->delete();

        return redirect("/anggota");
    }
}
