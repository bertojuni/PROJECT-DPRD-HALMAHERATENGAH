<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\ProvinceModel;
use App\Models\SubdistrictModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getAllProvince() {
        $data = ProvinceModel::get();

        return response([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function getProvince($id) {
        $data = ProvinceModel::where('province_id', $id)->first();

        return response([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function getAllCity() {
        $data = CityModel::get();

        return response([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function getCityByID($id) {
        $data = CityModel::where('city_id', $id)->first();

        return response([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function getCityByIDProvince($id) {
        $data = CityModel::where('province_id', $id)->get();

        return response([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function getAllSubdistrict() {
        $data = SubdistrictModel::get();

        return response([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function getSubdistrictByID($id) {
        $data = SubdistrictModel::where('subdistrict_id', $id)->first();

        return response([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function getSubdistrictByIDCity($id) {
        $data = SubdistrictModel::where('city_id', $id)->get();

        return response([
            'status' => 'success',
            'data' => $data
        ]);
    }

}
