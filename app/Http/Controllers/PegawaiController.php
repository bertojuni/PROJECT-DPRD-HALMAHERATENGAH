<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
            'pg_email' => $request->pg_email,
            'pg_anak' => $request->pg_anak,
            'pg_karpeg' => $request->file('pg_karpeg'),
            'pg_ktp' => $request->file('pg_ktp'),
            'pg_npwp' => $request->file('pg_npwp'),
            'pg_bpjs' => $request->file('pg_bpjs')
        ];

        $rules = [
            'pg_nama' => 'required',
            'pg_nip' => 'required',
            'pg_gol' => 'required',
            'pg_jabatan' => 'required',
            'pg_tempatlhr' => 'required',
            'pg_tgllhr' => 'required',
            'pg_status' => 'required',
            'pg_pasangan' => 'required',
            'pg_alamat' => 'required',
            'pg_pendidikan' => 'required',
            'pg_kontak' => 'required',
            'pg_email' => 'required',
            'pg_anak' => 'required',
            'pg_karpeg' => 'required|mimes:jpg,bmp,png,pdf',
            'pg_ktp' => 'required|mimes:jpg,bmp,png,pdf',
            'pg_npwp' => 'required|mimes:jpg,bmp,png,pdf',
            'pg_bpjs' => 'required|mimes:jpg,bmp,png,pdf'
        ];

        $messages = [
            'pg_nama.required' => 'Anda harus mengisi Nama',
            'pg_nip.required' => 'Anda harus mengisi NIP',
            'pg_gol.required' => 'Anda harus mengisi Golongan',
            'pg_jabatan.required' => 'Anda harus mengisi Jabatan',
            'pg_tempatlhr.required' => 'Anda harus mengisi Tempat Lahir',
            'pg_tgllhr.required' => 'Anda harus mengisi Tgl Lahir',
            'pg_status.required' => 'Anda harus mengisi Status',
            'pg_pasangan.required' => 'Anda harus mengisi Pasangan',
            'pg_alamat.required' => 'Anda harus mengisi Alamat',
            'pg_pendidikan.required' => 'Anda harus mengisi Pendidikan',
            'pg_kontak.required' => 'Anda harus mengisi Kontak',
            'pg_email.required' => 'Anda harus mengisi Email',
            'pg_anak.required' => 'Anda harus mengisi Anak',
            'pg_karpeg.requied' => 'Anda harus mengupload Kartu Pegawai',
            'pg_ktp.required' => 'Anda harus mengupload KTP',
            'pg_npwp.required' => 'Anda harus mengupload NPWP',
            'pg_bpjs.required' => 'Anda harus mengupload BPJS',   

            'pg_karpeg.mimes' => 'Tipe file Kartu Pegawai harus menggunakan format jpg, png, bmp, pdf',
            'pg_ktp.mimes' => 'Tipe file KTP harus menggunakan format jpg, png, bmp, pdf',
            'pg_npwp.mimes' => 'Tipe file NPWP harus menggunakan format jpg, png, bmp, pdf',
            'pg_bpjs.mimes' => 'Tipe file BPJS harus menggunakan format jpg, png, bmp, pdf'
            
        ];

        $validator = Validator::make($data, $rules, $messages);
        
        if($validator->fails()) {
            return redirect('pegawai')->withErrors($validator)->withInput();
        }


        // catch file
        $time_for_file = time();


        $file_karpeg = $request->file('pg_karpeg');
        if($file_karpeg != null) {
            $file_name = 'karpeg_' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_karpeg->getClientOriginalExtension();
            $data['pg_karpeg'] = $file_name;
            $file_karpeg->move('uploads/pegawai/', $file_name);
        }

        $file_ktp = $request->file('pg_ktp');
        if($file_ktp != null) {
            $file_name = 'ktp_' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_ktp->getClientOriginalExtension();
            $data['pg_ktp'] = $file_name;
            $file_ktp->move('uploads/pegawai/', $file_name);
        }

        $file_npwp = $request->file('pg_npwp');
        if($file_npwp != null) {
            $file_name = 'npwp_' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_npwp->getClientOriginalExtension();
            $data['pg_npwp'] = $file_name;
            $file_npwp->move('uploads/pegawai/', $file_name);
        }

        $file_bpjs = $request->file('pg_bpjs');
        if($file_bpjs != null) {
            $file_name = 'bpjs_' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_bpjs->getClientOriginalExtension();
            $data['pg_bpjs'] = $file_name;
            $file_bpjs->move('uploads/pegawai/', $file_name);
        }

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
