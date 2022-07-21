<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Exports\UserExport;
use App\Models\Empresa;
use Maatwebsite\Excel\Facades\Excel;
class UserController extends Controller
{

    public function indexAPI()
    {
        return User::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->getRoleNames()[0]);
    $users = User::all();
     return view('users.index', compact('users'));     
    }
   
    public function export()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }
    //return (new UserController)->download('invoices.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'roles' => 'required',

        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->foto = $request->foto;
        $usuario->edad = $request->edad;
        $usuario->sexo = $request->sexo;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;


        $roles = Role::all();
        foreach ($roles as $rol) {
            if ($rol->id == $request->roles) {
                $usuario->cargo = $rol->name;
            }
        }
        $usuario->password = bcrypt(($request->password));
        $usuario->save();
        $usuario->roles()->sync($request->roles);

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Registró');
        $bita->apartado = encrypt('Usuario');
        $afectado = $usuario->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $rol = DB::table('model_has_roles')->where('model_id', $user->id)->first();
        $rol_name = DB::table('roles')->where('id', $rol->role_id)->first();
        return view('users.edit', compact('user', 'roles', 'rol', 'rol_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => "unique:users,name,$user->id",
            'roles' => 'required',
            // 'empleados'=> 'required',
        ]);

        $usuario = User::find($user->id);
        if ($usuario->name <> $request->name) {
            $usuario->name = $request->name;
        }
        if ($request->password <> '') {
            $usuario->password = bcrypt(($request->password));
        }

        $usuario->email = $request->email;
        $usuario->foto = $request->foto;
        $usuario->edad = $request->edad;
        $usuario->sexo = $request->sexo;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;

        $roles = Role::all();
        foreach ($roles as $rol) {
            if ($rol->id == $request->roles) {
                $usuario->cargo = $rol->name;
            }
        }
        $usuario->roles()->sync($request->roles);


        $usuario->save();

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Editó');
        $bita->apartado = encrypt('Usuario');
        $afectado = $usuario->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */


        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Eliminó');
        $bita->apartado = encrypt('Usuario');
        $afectado = $user->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
        User::destroy($user->id);
        return redirect('users');
    }


    public function show2()
    {
        $user = User::find(auth()->user()->id);
        return view('perfil.edit', compact('user'));
    }

    public function edit2(User $user)
    {
        $roles = Role::all();
        return view('perfil.edit', compact('user', 'roles'));
    }

    public function update2(Request $request)
    {
        $user = User::find(auth()->user()->id);
        //actualiza nombre
        if ($user->name <> $request->name) {
            $user->name = $request->name;
        }
        //actualiza email
        if ($user->email <> $request->email) {
            $user->email = $request->email;
        }
        //actualiza contraseña
        if ($request->password <> '') {
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        }

        $user->save();
        return redirect()->route('user.show');
    }



    public function reporte(Request $request)
    {
        $user_c = Auth::user()->id;
        $id = 1;
        $empresa = Empresa::where('id', $id)->first();
        $user = User::find($user_c);
        $i =$request->inicio;
        $f =$request->fin;
         $lol = $request;
        $users = User::whereBetween('created_at', [$request->inicio, $request->fin])->get();
        
        if($request->tipo == 'pdf'){

            $view = View::make('users.reporte', compact('users','user','i','f', 'lol', 'empresa'))->render();

            $pdf = App::make('dompdf.wrapper');
            $pdf->setOptions([
                'logOutputFile' => storage_path('logs/log.htm'),
                'tempDir' => storage_path('logs/')
            ]);
    
            $pdf->loadHTML($view);
            return $pdf->stream();
        }

       if($request->tipo == 'excel'){
        return Excel::download(new UserExport($request), 'users.xlsx');
       }
       if($request->tipo == 'html'){
        return  $view = View::make('users.reporte', compact('users','user','i','f', 'lol'))->render();
       }
    }
}
