<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Response;

class BitacoraController extends Controller
{


    public function index()
    {
        // $actividades = Activity::all();
        $actividades = DB::table('activity_log')
            ->join('users', 'activity_log.causer_id', '=', 'users.id')->select('activity_log.*', 'users.name')->get();
        // return $actividades;
        return view('bitacora.index', compact('actividades'));
    }

    public function downloadTxt(Request $request)
    {
        /* $txt = "";
      $datas = User::select('id','name','telefono')
                ->orderBy('id','desc')
                ->take(100)
                ->get();
      foreach($datas as $data){
      $txt .= $data['id'].'|'.$data['name'].'|'.$data['telefono'].PHP_EOL;
      }
      return $txt;
      $txtname = 'mytxt.txt';
         $headers = ['Content-type'=>'text/plain', 'test'=>'YoYo', 'Content-Disposition'=>sprintf('attachment; filename="%s"', $txtname),'X-BooYAH'=>'WorkyWorky','Content-Length'=>sizeof($datas)];
            return \Response::make($txt , 200, $headers ); */


        $content = "";
        $datas = Bitacora::all();
        $users = User::all();
        $DateAndTime = date('m-d-Y h:i:s a', time());
        /* $ip =$request->ip(); */

        /* $phoneNumbers = "Phone numbers \n"; */
        $content = "        		REGISTRO DE BITACORA        \n";

        $content .= "\n";
        $content .= "EMPRESA: ACTIVO FIJO CORP.                         NIT  :2995623 \n";
        $content .= 'FECHA =' .  $DateAndTime . '                      TELF :62152145 ';
        $content .= "                                                    \n";
        $content .= "\n";
        $content .= "ORDEN DE INFORMACION = ID_BITACORA|USUARIO|ACCION|APARTADO|ID AFECTADO|FECHA-HORA|DIRECCION-IP \n";
        $content .= "\n";
        $content .= "-----------------------------LOG----------------------------------\n";
        /* foreach ($datas as  $data) {
              $content .= $data->telefono;
              $content .= "\n";

            } */


        foreach ($datas as $data) {
            /* $hola = decrypt($data->accion); */

            foreach ($users as $user) {
                if ($data->id_user == $user->id) {
                    $content .= $data->id . '|' . $user->name . '|' . decrypt($data->accion) . '|' . decrypt($data->apartado)  . '|' . decrypt($data->afectado) . '|' . decrypt($data->fecha_h) . '|' . decrypt($data->ip) . PHP_EOL;
                }
            }


            /* $content .= "\n"; */
        }
        $content .= "----------------------------END_LOG-------------------------------\n";

        // file name to download
        $fileName = "LOG_BITACORA.log";

        // make a response, with the content, a 200 response code and the headers
        return Response::make($content, 200, [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
            'Content-Length' => strlen($content)
        ]);
    }
}
