<?php

namespace App\Models;

class Proyecto
{
    // Cargar los proyectos desde la sesión o iniciar los valores por defecto
    private static function getSessionProyectos()
    {
        if (!session()->has('proyectos')) {
            session([
                'proyectos' => [
                    [
                        "id" => 1,
                        "nombre" => "Sistema Contable",
                        "fecha_inicio" => "2024-01-01",
                        "estado" => "En desarrollo",
                        "responsable" => "María Torres",
                        "monto" => 5000000
                    ],
                    [
                        "id" => 2,
                        "nombre" => "Aplicación Móvil",
                        "fecha_inicio" => "2024-03-15",
                        "estado" => "Finalizado",
                        "responsable" => "Luis Gómez",
                        "monto" => 7200000
                    ]
                ]
            ]);
        }
        return session('proyectos');
    }

    public static function getAll()
    {
        return self::getSessionProyectos();
    }

    public static function findProyecto($id)
    {
        $proyectos = self::getSessionProyectos();
        foreach ($proyectos as $proyecto) {
            if ($proyecto['id'] == $id) return $proyecto;
        }
        return null;
    }

    public static function createProyecto($data)
    {
        $proyectos = self::getSessionProyectos();
        $nuevoId = count($proyectos) > 0 ? max(array_column($proyectos, 'id')) + 1 : 1;
        $data['id'] = $nuevoId;
        $proyectos[] = $data;
        session(['proyectos' => $proyectos]);
        return $data;
    }

    public static function updateProyecto($id, $data)
    {
        $proyectos = self::getSessionProyectos();
        foreach ($proyectos as &$proyecto) {
            if ($proyecto['id'] == $id) {
                $proyecto = array_merge($proyecto, $data);
                session(['proyectos' => $proyectos]);
                return true;
            }
        }
        return false;
    }

    public static function deleteProyecto($id)
    {
        $proyectos = self::getSessionProyectos();
        foreach ($proyectos as $index => $proyecto) {
            if ($proyecto['id'] == $id) {
                unset($proyectos[$index]);
                session(['proyectos' => array_values($proyectos)]);
                return true;
            }
        }
        return false;
    }
}