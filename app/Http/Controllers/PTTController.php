<?php

namespace App\Http\Controllers;

use App\Models\PPTModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PTTController extends Controller
{
    //
    public function index()
    {
        $data = [
            'ptt' => PTTModel::get()
        ];

        return view('ptt.index', $data);
    }

    public function store(Request $request)
    {
        $data = [
            'ppt_nama' => $request->ppt_nama,
            'ppt_pendidikan' => $request->ppt_pendidikan,
            'ppt_tempatlhr' => $request->ppt_tempatlhr,
            'ppt_alamat' => $request->ppt_alamat,
            'ppt_nohp' => $request->ppt_nohp,
            'ppt_bagian' => $request->ppt_bagian,
            'ppt_ktp' => $request->ppt_ktp,
            'ppt_tgllhr' => $request->ppt_tgllhr
        ];

        $rules = [
            'ppt_nama' => 'required',
            'ppt_pendidikan' => 'required',
            'ppt_tempatlhr' => 'required',
            'ppt_alamat' => 'required',
            'ppt_nohp' => 'required',
            'ppt_bagian' => 'required',
            'ppt_ktp' => 'required|mimes:jpg,png,pdf',
            'ppt_tgllhr' => 'required'
        ];

        $messages = [
            'ppt_nama.required' => 'Anda harus mengisi kolom Nama',
            'ppt_pendidikan.required' => 'Anda harus mengisi kolom Pendidikan',
            'ppt_tempatlhr.required' => 'Anda harus mengisi kolom Tempat Lahir',
            'ppt_alamat.required' => 'Anda harus mengisi kolom Alamat',
            'ppt_nohp.required' => 'Anda harus mengisi kolom No HP',
            'ppt_bagian.required' => 'Anda harus mengisi kolom Bagian',
            'ppt_ktp.required' => 'Anda harus mengupload file KTP',
            'ppt_tgllhr.required' => 'Anda harus mengisi kolom tanggal lahir',
            'ppt_ktp.mimes' => 'File KTP yang Anda upload harus berformat JPG/PNG/PDF'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return redirect('/ptt')->withErrors($validator)->withInput();
        }

        // catch file
        $time_for_file = time();

        if ($request->file('ppt_ktp') != null) {
            $file_ktp = $request->file('ppt_ktp');
            $nama_file = 'uploads/ppt/' .  'ktp_' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_ktp->getClientOriginalExtension();
            $data['ppt_ktp'] = $nama_file;
            $file_ktp->move(public_path('uploads/ppt/'), $nama_file);
        }

        
        try {
            PPTModel::create($data); 
        } catch(\Exception $e) {
            return redirect('/ptt')->with('error_message', 'Maaf terdapat kesalahan saat proses penambahan data');
            dd('error query');
        }

        return redirect('/ptt')->with('success_message', 'Data PTT baru berhasil ditambahkan');
    }
}
