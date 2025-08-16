<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Http;

class ProyectoController extends Controller
{
    // Mostrar todos los proyectos
    public function index()
    {
        $proyectos = Proyecto::getAll();
        return view('proyectos.index', ['proyectos' => $proyectos]);
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('proyectos.create');
    }

    // Guardar nuevo proyecto
    public function store(Request $request)
    {
        Proyecto::createProyecto($request->all());
        return redirect('/proyectos')->with('mensaje', 'Proyecto creado exitosamente');
    }

    // Mostrar proyecto por ID
    public function show($id)
    {
        $proyecto = Proyecto::findProyecto($id);
        return $proyecto
            ? view('proyectos.show', ['proyecto' => $proyecto])
            : abort(404, 'Proyecto no encontrado');
    }

    // Mostrar formulario de edición
public function edit($id)
{
    $proyecto = Proyecto::findProyecto($id);
    return $proyecto
        ? view('proyectos.edit', ['proyecto' => $proyecto])
        : abort(404, 'Proyecto no encontrado');
}


    // Actualizar proyecto
public function update(Request $request, $id)
{
    $actualizado = Proyecto::updateProyecto($id, $request->all());

    return $actualizado
        ? redirect('/proyectos')->with('mensaje', 'Proyecto actualizado correctamente')
        : redirect('/proyectos')->with('error', 'Proyecto no encontrado');
}

    // Eliminar proyecto
    public function destroy($id)
    {
        $eliminado = Proyecto::deleteProyecto($id);
        return $eliminado
            ? redirect('/proyectos')->with('mensaje', 'Proyecto eliminado')
            : redirect('/proyectos')->with('error', 'No se pudo eliminar el proyecto');
    }

    //mostrar UF al dia
    public function mostrarUF()
{
    $response = Http::get('https://mindicador.cl/api');
    
    if ($response->successful()) {
        $data = $response->json();
        $uf = $data['uf']['valor'];
        return view('uf', ['uf' => $uf]);
    } else {
        return view('uf', ['uf' => 'Error al obtener UF']);
    }
}
}