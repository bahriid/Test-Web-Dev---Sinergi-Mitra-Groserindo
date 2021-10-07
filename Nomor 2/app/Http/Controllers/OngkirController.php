<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function index()
    {
        $data['province'] = Http::accept('application/json')
        ->withHeaders(['key' => '549310b2cc9b06f93b1e239668dc8ee1'])
        ->get('https://api.rajaongkir.com/starter/province');

        $data['city'] = Http::accept('application/json')
        ->withHeaders(['key' => '549310b2cc9b06f93b1e239668dc8ee1'])
        ->get('https://api.rajaongkir.com/starter/city?province=5');

        $data['cost'] = null;
        return view('welcome')->with('data', $data);
    }

    public function getCity($id)
    {
        $city = Http::accept('application/json')
        ->withHeaders(['key' => '549310b2cc9b06f93b1e239668dc8ee1'])
        ->get('https://api.rajaongkir.com/starter/city?province='.$id);

        return $city;
    }

    public function countCost(Request $request)
    {
        $data['cost'] = Http::withHeaders([
            'key' => '549310b2cc9b06f93b1e239668dc8ee1',
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'destination' => $request['city'],
            'weight' => $request['weight'],
            'origin' => $request['origin'],
            'courier' => $request['courier'],
        ]);

        $data['province'] = Http::accept('application/json')
        ->withHeaders(['key' => '549310b2cc9b06f93b1e239668dc8ee1'])
        ->get('https://api.rajaongkir.com/starter/province');

        $data['city'] = Http::accept('application/json')
        ->withHeaders(['key' => '549310b2cc9b06f93b1e239668dc8ee1'])
        ->get('https://api.rajaongkir.com/starter/city?province=5');

        // return json_decode($data['cost']);
        return view('welcome')->with('data', $data);
    }
}
