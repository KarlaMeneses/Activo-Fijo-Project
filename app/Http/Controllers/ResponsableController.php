<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Responsable;
use App\Models\Ubicacion;
use App\Models\User;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function index()
    {
        $res = Activofijo::all();
        return view('responsable.index', compact('res'));
    }
}
