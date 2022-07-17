<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use App\Models\Ubicacion;
use App\Models\User;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function index()
    {
        $resp = Responsable::all();
        $user = User::all();
        $ubis = Ubicacion::all();

        return view('responsable.index', compact('resp', 'user', 'ubis'));
    }
}
