<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (! $token = auth('api')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['mensaje' => 'Credenciales incorrectas'], 401);
            }
            $usuario = auth('api')->user();

            if($usuario->getRoleNames()[0] != 'Administrador'){
                return response()->json(['mensaje' => 'Rol sin acceso'], 401);
            }

            // $bitacora = new Acciones();
            // $bitacora->accion = 'Inició Sesión';
            // $bitacora->idpaciente = $paciente->id;
            // $bitacora->save();

            return $this->respondWithToken($token, $usuario);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }

    protected function respondWithToken($token, $usuario)
    {
        return response()->json([
            'mensaje' => 'Token generado exitosamente',
            'token' => $token,
            'data' => $usuario
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ], 200);
    }
}
