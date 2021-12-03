<?php

namespace App\Http\Controllers;

use App\Models\SuratMasukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuratMasukController extends Controller
{
    //
    public function index()
    {
        $data = [
            'sm' => SuratMasukModel::get()
        ];

        return view('suratmasuk.index', $data);
    }

    public function detail($id)
    {
        $data = [
            'sm' => SuratMasukModel::where('sm_id', $id)->first()
        ];

        if($data['sm'] == null) {
            return redirect('/suratmasuk')->with('error_message', 'Data yang Anda cari tidak ditemukan!');
        }

        return view('suratmasuk.detail', $data);
    }

    public function store(Request $request)
    {
        $data = [
            'sm_asal' => $request->sm_asal,
            'sm_no' => $request->sm_no,
            'sm_perihal' => $request->sm_perihal,
            'sm_tgl' => $request->sm_tgl,
            'sm_masuk' => $request->sm_masuk,
            'sm_tujuan' => $request->sm_tujuan,
            'sm_penerima' => $request->sm_penerima,
            'sm_desc' => $request->sm_desc
        ];

        // dd($data);
        $rules = [
            'sm_asal' => 'required',
            'sm_no' => 'required',
            'sm_perihal' => 'required',
            'sm_tgl' => 'required',
            'sm_masuk' => 'required',
            'sm_tujuan' => 'required',
            'sm_penerima' => 'required',
            'sm_desc' => 'required'
        ];

        $messages = [
            'sm_asal.required' => 'Asal Surat harus diisi',
            'sm_no.required' => 'No Surat harus diisi',
            'sm_perihal' => 'Perihal Surat harus diisi',
            'sm_tgl' => 'Tgl Surat harus diisi',
            'sm_masuk' => 'Tgl Masuk Surat harus diisi',
            'sm_tujuan' => 'Tujuan Surat harus diisi',
            'sm_penerima' => 'Penerima Surat harus diisi',
            'sm_desc' => 'Deskripsi Surat harus diisi'
        ];

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/suratmasuk')->withErrors($validator)->withInput();
        }

        if ($request->file('sm_file')) {
            $time_for_file = time();

            $file_sm = $request->file('sm_file');
            $file_name = 'uploads/suratmasuk/' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_sm->getClientOriginalExtension();
            $file_sm->move(public_path('uploads/suratmasuk/'), $file_name);

            $data['sm_file'] = $file_name;
        }

        SuratMasukModel::create($data);

        return redirect('/suratmasuk');
    }

    public function edit($id)
    {
        $data = [
            'id' => $id,
            'sm' => SuratMasukModel::where('sm_id', $id)->first()
        ];

        if ($data['sm'] == null) {
            return redirect('/suratmasuk')->with('error_message', 'Data yang Anda cari tidak ditemukan');
        }

        return view('suratmasuk.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // place update code here

        $data = [
            'sm_asal' => $request->sm_asal,
            'sm_no' => $request->sm_no,
            'sm_perihal' => $request->sm_perihal,
            'sm_tgl' => $request->sm_tgl,
            'sm_masuk' => $request->sm_masuk,
            'sm_tujuan' => $request->sm_tujuan,
            'sm_penerima' => $request->sm_penerima,
            'sm_desc' => $request->sm_desc
        ];

        // dd($data);
        $rules = [
            'sm_asal' => 'required',
            'sm_no' => 'required',
            'sm_perihal' => 'required',
            'sm_tgl' => 'required',
            'sm_masuk' => 'required',
            'sm_tujuan' => 'required',
            'sm_penerima' => 'required',
            'sm_desc' => 'required'
        ];

        $messages = [
            'sm_asal.required' => 'Asal Surat harus diisi',
            'sm_no.required' => 'No Surat harus diisi',
            'sm_perihal' => 'Perihal Surat harus diisi',
            'sm_tgl' => 'Tgl Surat harus diisi',
            'sm_masuk' => 'Tgl Masuk Surat harus diisi',
            'sm_tujuan' => 'Tujuan Surat harus diisi',
            'sm_penerima' => 'Penerima Surat harus diisi',
            'sm_desc' => 'Deskripsi Surat harus diisi'
        ];

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/suratmasuk')->withErrors($validator)->withInput();
        }

        $option_change = $request->ganti_file_surat;

        if ($option_change == null) {
            // file awalnya tidak ada

            // lalu kemudian user melakukan upload
            if ($request->file('sm_file')) {
                $time_for_file = time();

                $file_sm = $request->file('sm_file');
                $file_name = 'uploads/suratmasuk/' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_sm->getClientOriginalExtension();
                $file_sm->move(public_path('uploads/suratmasuk/'), $file_name);

                $data['sm_file'] = $file_name;

            }
        } else {
            if($option_change == 'hapus') {
                $dataupdate = SuratMasukModel::where('sm_id', $id)->first();
                $dataupdate->sm_file = null;

                try {
                    $dataupdate->save();
                } catch(\Exception $th) {
                    return redirect('/suratmasuk')->with('error_message', 'Gagal mengubah data surat masuk');
                }
        
                return redirect('/suratmasuk')->with('success_message', 'Sukses mengubah data surat masuk');
                

            } else if($option_change == 'ganti') {
                if ($request->file('update_file_sm')) {
                    $time_for_file = time();
    
                    $file_sm = $request->file('update_file_sm');
                    $file_name = 'uploads/suratmasuk/' . md5($time_for_file) . '_' . $time_for_file . '.' . $file_sm->getClientOriginalExtension();
                    $file_sm->move(public_path('uploads/suratmasuk/'), $file_name);
    
                    $data['sm_file'] = $file_name;
                }
            }
        }

        try {
            SuratMasukModel::where('sm_id', $id)->update($data);
        } catch(\Exception $th) {
            return redirect('/suratmasuk')->with('error_message', 'Gagal mengubah data surat masuk');
        }

        return redirect('/suratmasuk')->with('success_message', 'Sukses mengubah data surat masuk');
    }

    public function delete($id)
    {
        SuratMasukModel::where('sm_id', $id)->delete();

        return redirect('/suratmasuk');
    }
}
