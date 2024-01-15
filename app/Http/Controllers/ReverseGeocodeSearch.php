<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;

class ReverseGeocodeSearch extends Controller
{
    public function index()
    {

    }

    public function action(Request $request)
    {
        //get latitude an longtitude from maps and get formatted data
        if ($request->ajax()) {

            $lat = $request->get('lat');
            $lng = $request->get('lng');
            $data = null;
            $data = $this->getDetail($lat, $lng);
            echo json_encode($data['results']['0']['formatted_address']);
        }
    }

    public function getDetail($lat, $lng)
    {
        $query = json_decode(file_get_contents(Helper::get_reverse_geocode($lat, $lng)), true);
        return $query;
    }

    public function getCoordinate($query)
    {
        //get coordinate from text search 
        $query = str_replace(' ', '+', $query);
        $query = json_decode(file_get_contents(Helper::get_geocode($query)), true)[0];
        return $query;
    }
}
