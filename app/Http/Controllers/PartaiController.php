<?php

namespace App\Http\Controllers;

use App\Models\PartaiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartaiController extends Controller
{
    //

    public function __construct()
    {
        $this->partai_model = new PartaiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Partai',
            'partai' => PartaiModel::get()
        ];

        return view('partai.index', $data);
    }

    public function store(Request $request)
    {
        $file_partai = $request->file('partai_logo');
        $nama_partai = $request->partai_nama;

        $data = [
            'partai_nama' => $nama_partai,
            'partai_logo' => $request->file('partai_logo')
        ];

        $rules = [
            'partai_nama' => 'required',
            'partai_logo' => 'required|mimes:png,jpg'
        ];

        $message = [
            'partai_nama.required' => 'Nama Partai harus diisi',
            'partai_logo.required' => 'Logo Partai harus Anda upload',
            'partai_logo.mimes' => 'File logo partai yang diupload harus berformat jpg, png'
        ];

        $validator = Validator::make($data, $rules, $message);

        if($validator->fails()) {
            return redirect('partai')->withErrors($validator)->withInput();
        }

        $nama_partai = str_replace(" ", "", $nama_partai);
        $nama_file = $nama_partai . '-' . time() . '.' . $file_partai->getClientOriginalExtension();

        $file_partai->move(public_path('/uploads/partai'),  $nama_file);
        $file_name = 'uploads/partai/' . $nama_file;

        $data = [
            'partai_nama' => $request->partai_nama,
            'partai_logo' => $file_name
        ];

        $this->partai_model->create($data);

        return redirect("/partai");
    }

    public function delete($id)
    {
        $data = $this->partai_model::where('partai_id', $id)->delete();

        return redirect("/partai");
    }

    public function edit($id)
    {
        $partai = $this->partai_model::where('partai_id', $id)->first();

        $data = [
            'id' => $id,
            'partai' => $partai
        ];

        return view('partai.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'partai_nama' => $request->partai_nama,
        ];


        $file_partai = $request->file('partai_logo');

        if ($file_partai) {
            $nama_partai = $request->partai_nama;

            $nama_partai = str_replace(" ", "", $nama_partai);
            $nama_file = $nama_partai . '-' . time() . '.' . $file_partai->getClientOriginalExtension();

            $file_partai->move(public_path('/uploads/partai'),  $nama_file);
            $file_name = 'uploads/partai/' . $nama_file;

            $data['partai_logo'] = $file_name;
        }

        $this->partai_model->where('partai_id', $id)->update($data);
        return redirect("/partai");
    }
}
