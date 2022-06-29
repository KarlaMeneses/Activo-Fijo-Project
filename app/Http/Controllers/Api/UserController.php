<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CURLFile;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (! $token = auth('api')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['mensaje' => 'Credenciales incorrectas'], 401);
            }
            $usuario = auth('api')->user();

            if($usuario->getRoleNames()[0] == 'Administrador'){
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
        $usuario->rol_name = $usuario->roles[0]->name;
        return response()->json([
            'mensaje' => 'Token generado exitosamente',
            'token' => $token,
            'data' => $usuario
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ], 200);
    }

    public function obtenerUser()
    {
        try {
            $user = auth('api')->user();
            $user->rol_name = $user->roles[0]->name;
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function actualizarFoto(Request $request)
    {
        try {
            DB::beginTransaction();
            if($request->hasFile('foto')){
                $extension = $request->foto->extension();
                if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                    $nombreArchivo = round(microtime(true)) . '.' . $extension;
                    $response = $this->guardarArriba($request, $nombreArchivo);

                    $user = User::find(1);
                    $name = str_replace("/","%2F",$response->name);
                    $user->foto = "https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/$name?alt=media&token=$response->downloadTokens";
                    $user->update();
                }
            }
            
            DB::commit();
            return response()->json(['mensaje' => 'Consulta Exitosa'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    private function makeCurlFile($file){
        $mime = mime_content_type($file);
        $info = pathinfo($file);
        $name = $info['basename'];
        $output = new CURLFile($file, $mime, $name);
        return $output;
    }

    private function guardarArriba(Request $request, $nombreArchivo)
    {
        $url = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o?uploadType=media&name=';
        $ubicacion = 'usuario/';
        $curlFile = $this->makeCurlFile((string)$request->file('foto'));
        $fields = [
            'name' => $curlFile
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.$ubicacion.$nombreArchivo);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($httpcode == 200)
        {
            return json_decode($response);
        }else{
            throw new \Exception("Ocurrió un error al momento de subir la imagen a Firebase Storage");
        }
    }
}
