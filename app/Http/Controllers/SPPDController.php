<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\JenisPerjalananModel;
use App\Models\ProvinceModel;
use App\Models\RekeningModel;
use App\Models\SPPDModel;
use Illuminate\Http\Request;

class SPPDController extends Controller
{
    //
    public function index() {
        $data = [
            'sppd' => SPPDModel::get()
        ];

        return view('sppd.index', $data);
    }

    public function create() {
        $data = [
            'province' => ProvinceModel::get(),
            'city' => CityModel::get(),
            'jenis_perjalanan' => JenisPerjalananModel::get(),
            'rekening' => RekeningModel::get()
        ];
        return view('sppd.create', $data);
    }

    public function store(Request $request) {
        dd($request->all());
    }
}
