<?php

namespace App\Http\Controllers;

use App\Helper;
use Illuminate\Http\Request;

class GeocodeSearch extends Controller
{
    public function index()
    {
    }

    public function action(Request $request)
    {

        if ($request->ajax()) {
            $query = $request->get('query');
            $data = null;
            if ($query != '') {
                $data = $this->getCoordinate($query);
            }
            $data[] = array('query' => $query);

            if (isset($data['results'][0])) {
                // Access the first element in the results array
                echo json_encode($data['results']['0']);
            } else {
                // Handle the case where there are no results
                echo json_encode($data);
            }
            //['formatted_address'] 
        }
    }

    public function getCoordinate($query)
    {
        $query = str_replace(' ', '+', $query);
        $query = json_decode(file_get_contents(Helper::get_geocode($query)), true); //"Undefined offset: 0"
        return $query;
    }
}
