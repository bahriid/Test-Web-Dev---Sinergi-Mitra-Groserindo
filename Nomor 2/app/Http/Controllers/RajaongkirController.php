<?php

namespace App\Http\Controllers;

use App\Utilities\Helpers;
use Illuminate\Http\Request;

class RajaongkirController extends Controller
{
    public function index()
    {
        return view('customer/index');
    }

}
