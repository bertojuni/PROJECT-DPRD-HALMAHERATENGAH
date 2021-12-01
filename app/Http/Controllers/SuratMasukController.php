<?php

namespace App\Http\Controllers;

use App\Models\SuratMasukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuratMasukController extends Controller
{
    //
    public function index() {
        $data = [
            'sm' => SuratMasukModel::get()
        ];

        return view('suratmasuk.index', $data);
    }

    public function detail($id) {
        $data = [
            'sm' => SuratMasukModel::where('sm_id', $id)->first()
        ];

        return view('suratmasuk.detail', $data);
    }

    public function store(Request $request) {
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
        if($validator->fails()) {
            return redirect('/suratmasuk')->withErrors($validator)->withInput();
        }

        SuratMasukModel::create($data);

        return redirect('/suratmasuk');
    }

    public function edit($id) {
        $data = [
            'sm' => SuratMasukModel::where('sm_id', $id)->first()
        ];

        if($data == null) {
            return redirect('/suratmasuk')->with('error_message', 'Data yang Anda cari tidak ditemukan');
        }

        return view('suratmasuk.edit', $data);
    }

    public function update(Request $request, $id) {
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
        if($validator->fails()) {
            return redirect('/suratmasuk')->withErrors($validator)->withInput();
        }

        SuratMasukModel::where('sm_id', $id)->update($data);

        return redirect('/suratmasuk');
    }

    public function delete($id) {
        SuratMasukModel::where('sm_id', $id)->delete();

        return redirect('/suratmasuk');
    }

}
