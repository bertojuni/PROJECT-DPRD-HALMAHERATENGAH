<?php

namespace App\Http\Controllers;

use App\Models\PPTModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PPTController extends Controller
{
    public function __construct()
    {
        $this->ppt_model = new PPTModel();
    }

    public function index() {
        $data = PPTModel::get();

        return view('ppt.index', $data);
    }

    public function store(Request $request) {
        $data = [
            'ppt_nama' => $request->ppt_nama,
            'ppt_pendidikan' => $request->ppt_pendidikan,
            'ppt_tempatlhr' => $request->ppt_tempatlhr,
            'ppt_alamat' => $request->alamat,
            'ppt_nohp' => $request->ppt_nohp,
            'ppt_bagian' => $request->ppt_bagian,
            'ppt_ktp' => $request->ppt_ktp
        ];

        $rules = [
            'ppt_nama' => 'required',
            'ppt_pendidikan' => 'required',
            'ppt_tempatlhr' => 'required',
            'ppt_alamat' => 'required',
            'ppt_nohp' => 'required',
            'ppt_bagian' => 'required',
            'ppt_ktp' => 'required|mimes:jpg,png,pdf'
        ];

        $messages = [
            'ppt_nama.required' => 'Anda harus mengisi kolom Nama',
            'ppt_pendidikan.required' => 'Anda harus mengisi kolom Pendidikan',
            'ppt_tempatlhr.required' => 'Anda harus mengisi kolom Tempat Lahir',
            'ppt_alamat.required' => 'Anda harus mengisi kolom Alamat',
            'ppt_nohp.required' => 'Anda harus mengisi kolom No HP',
            'ppt_bagian.required' => 'Anda harus mengisi kolom Bagian',
            'ppt_ktp.required' => 'Anda harus mengupload file KTP',
            'ppt_ktp.mimes' => 'File KTP yang Anda upload harus berformat JPG/PNG/PDF'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if($validator->fails()) {
            return redirect('/ppt')->withErrors($validator)->withInput();
        }

        // catch file
        $time_for_file = time();

        if($request->file('ppt_ktp') != null) {
            $file_ktp = $request->file('ppt_ktp');
            $nama_file = 'uploads/ppt/' .  'ktp_' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_ktp->getClientOriginalExtension();
            $data['ppt_ktp'] = $nama_file;
            $file_ktp->move(public_path('uploads/ppt'), $nama_file);
        }

        $this->ppt_model->create($data);

        return redirect('ppt');

    }

    public function detail($id) {
        $data = [
            'ppt' => PPTModel::where('ppt_id', $id)->first()
        ];

        return view('ppt.detail', $data);
    }

    public function edit(Request $request, $id) {
        $data = [
            'ppt' => PPTModel::where('ppt_id', $id)->first()
        ];

        return view('ppt.edit', $data);

    }

    public function update(Request $request, $id) {
        $data = [
            'ppt' => PPTModel::where('ppt_id', $id)->first()
        ];

        $dataUpdate = [
            'ppt_nama' => $request->ppt_nama,
            'ppt_pendidikan' => $request->ppt_pendidikan,
            'ppt_tempatlhr' => $request->ppt_tempatlhr,
            'ppt_alamat' => $request->alamat,
            'ppt_nohp' => $request->ppt_nohp,
            'ppt_bagian' => $request->ppt_bagian,
        ];

        $rules = [
            'ppt_nama' => 'required',
            'ppt_pendidikan' => 'required',
            'ppt_tempatlhr' => 'required',
            'ppt_alamat' => 'required',
            'ppt_nohp' => 'required',
            'ppt_bagian' => 'required',
        ];

        $messages = [
            'ppt_nama.required' => 'Anda harus mengisi kolom Nama',
            'ppt_pendidikan.required' => 'Anda harus mengisi kolom Pendidikan',
            'ppt_tempatlhr.required' => 'Anda harus mengisi kolom Tempat Lahir',
            'ppt_alamat.required' => 'Anda harus mengisi kolom Alamat',
            'ppt_nohp.required' => 'Anda harus mengisi kolom No HP',
            'ppt_bagian.required' => 'Anda harus mengisi kolom Bagian',
        ];

        $validator = Validator::make($dataUpdate, $rules, $messages);

        if($validator->fails()) {
            return redirect('ppt')->withErrors($validator)->withInput();
        }

        // catch file when file is uploaded
        $time_for_file = time();

        if($request->file('ppt_ktp') != null) {
            $file_ktp = $request->file('ppt_ktp');
            $file_name = 'uploads/ppt/' . 'ktp_' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_ktp->getClientOriginalName();

            $file_ktp->move(public_path('uploads/ppt'), $file_name);
            $dataUpdate['ppt_ktp'] = 'uploads/ppt/' . $file_name;
        }

        $update = PPTModel::where('ppt_id', $id)->update($dataUpdate);

        return view('ppt.index');

    }
}
