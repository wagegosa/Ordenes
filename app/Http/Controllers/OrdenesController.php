<?php

namespace App\Http\Controllers;

use App\Ordenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\OrdenesImport;

class OrdenesController extends Controller
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
            $ordenes = DB::table('ordenes')
                ->select(
                    'id',
                    'fechaInicio',
                    'solicitante',
                    'area',
                    'tipoTrabajo',
                    'tipoEstado'
                )
                ->orderBy('fechaInicio', 'ASC')
                ->get();
            // Devuelve el resultado de la consulta y lo muestra en una tabla dinámica vía ajax.
            return DataTables::of($ordenes)
                ->addColumn('btn', 'ordenes.actions')
                ->rawColumns(['btn'])
                ->make(true);
        }

        // Retorna la vista index.
        return view('ordenes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorna la vista de registro.
        return view('ordenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $todos = $request->all();
        // dd($todos);
        // exit;

        // Valida el formulario.
        $request->validate([
            'solicitante' => 'required|max:191',
            'area' => 'required|max:191',
            'fechaInicio' => 'required',
            'tipoTrabajo' => 'required',
            'descripcion' => 'required',
            'tipoMantenimiento' => 'required'
        ]);

        // dd($request->all());
        // exit;

        // Captura los campos provenientes del formulario.
        $ordenes = new Ordenes([
            'solicitante' => trim(mb_strtoupper($request->get('solicitante'))), 'fechaInicio' => trim(mb_strtoupper($request->get('fechaInicio'))), 'area' => trim(mb_strtoupper($request->get('area'))), 'tipoTrabajo' => $request->get('tipoTrabajo'), 'descripcion' => trim(mb_strtoupper($request->get('descripcion'))), 'tipoMantenimiento' => $request->get('tipoMantenimiento')
        ]);

        // Inserta en la base de datos.
        $ordenes->save();
        // Redirecciona a la vista index.
        return redirect('ordenes')->with('success', '¡Orden de Trabajo guardada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Busca el campo en el base de datos.
        $orden = Ordenes::find($id);
        // Retorna la vista de información detallada.
        return view('ordenes.show', compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Busca el campo en la base de datos.
        $orden = Ordenes::find($id);
        return view('ordenes.edit', compact('orden'));
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
        // dd($request->all());
        $monto = $request->get('monto');
        $monto2 = str_replace('.', '', $monto);

        $orden = Ordenes::findOrFail($id);
        $idOrden = $orden->id;

        $orden->solicitante = trim(mb_strtoupper($request->get('solicitante')));
        $orden->fechaFin = trim($request->get('fechaFin'));
        $orden->tipoMantenimiento = trim($request->get('tipoMantenimiento'));
        $orden->tipoTrabajo = trim($request->get('tipoTrabajo'));
        $orden->tipoEstado = trim($request->get('tipoEstado'));
        $orden->monto = $monto2;
        $orden->observacion = trim(mb_strtoupper($request->get('observaciones')));

        // Guarda lo cambios en la base de datos.
        $orden->save();
        // Redirecciona a la vista show.
        return redirect()->route('ordenes.show', $idOrden)->with('success', 'Orden de Trabajo actualizada!');
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

    // Importar archivo de Excel
    public function importExcel(Request $request)
    {
        $todos = $request->all();
        dd($todos);
        exit;

        $file = $request->file('file');

        Excel::import(new OrdenesImport, $file);

        // Retorna a la vista anterior.
        return back()->with('message', '!Impoetación de Ordenes de Trabajo completada¡');
    }
}
