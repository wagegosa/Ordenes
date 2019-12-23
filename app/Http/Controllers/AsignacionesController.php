<?php

namespace App\Http\Controllers;

use App\Asignaciones;
use App\Ordenes;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Valida si el resultado proviene de una consulta ajax.
        if ($request->ajax()) {
            // Consulta los registros en la base de datos.
            $asignaciones = DB::table('asignaciones AS t1')
                ->join('ordenes AS t2', 't1.orden_id', '=', 't2.id')
                ->join('users AS t3', 't1.user_id', '=', 't3.id')
                ->select(
                    't1.id',
                    't2.id AS numOrden',
                    't2.solicitante',
                    't3.name',
                    't2.tipoEstado'
                )
                ->orderBy('t2.id', 'ASC')
                ->get();
            // Devuelve el resultado de la consulta y lo muestra en una tabla dinámica vía ajax.
            return DataTables::of($asignaciones)
                ->addColumn('btn', 'asignaciones.actions')
                ->rawColumns(['btn'])
                ->make(true);
        }

        return view('asignaciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Consulta el usuario logueado.
        $user_id = Auth::user()->id;

        // Consulta las ordenes de trabajo.
        $ordenes = DB::table('ordenes')
            ->select(
                DB::raw("CONCAT('Orden Nro.: ',id,', ',solicitante) as numOrden"),
                'id'
            )
            ->where('tipoEstado', '=', 'Pendiente')
            ->orderBy('id', 'DESC')
            ->get();

        // Consulta los empleados.
        $usuarios = User::select('id', 'name')
            ->where('id', '!=', $user_id)
            ->orderBy('name', 'ASC')
            ->get();

        // Retorna la vista de registro.
        return view('asignaciones.create', compact('ordenes', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validación del formulario.
        $request->validate([
            'orden_id' => 'required', 'user_id' => 'required'
        ]);

        // $todos = $request->all();
        // dd($todos);
        // exit;
        // Captura los campos provenientes del formulario.
        $asignaciones = new Asignaciones([
            'orden_id' => $request->get('orden_id'),
            'user_id' => $request->get('user_id')
        ]);

        // Inserta en la base de datos.
        $asignaciones->save();
        // Redirecciona a la vista index.
        return redirect('asignaciones')->with('success', '!Asignación guardada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
