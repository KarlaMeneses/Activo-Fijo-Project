<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (! $token = auth('api')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['mensaje' => 'Credenciales incorrectas'], 401);
            }
            $paciente = auth('api')->user();

            // $bitacora = new Bitacora();
            // $bitacora->accion = 'Inició Sesión';
            // $bitacora->idpaciente = $paciente->id;
            // $bitacora->save();

            return $this->respondWithToken($token, $paciente);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }

    // public function me()
    // {
    //     return response()->json(auth()->user());
    // }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Cierre de sesión exitoso'], 200);
    }

    // public function refresh()
    // {
    //     return $this->respondWithToken(auth('api')->refresh());
    // }

    public function obtenerPaciente()
    {
        try {
            $paciente = auth('api')->user();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $paciente], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }
}
