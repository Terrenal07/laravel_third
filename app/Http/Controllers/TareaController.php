<?php

namespace App\Http\Controllers;
use App\Models\Tarea;

use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function destroy(Tarea $tarea)
{
    $tarea->delete();

    return redirect('/')
    ->with('success', 'Tarea eliminada exitosamente.');
}

public function update(Request $request, Tarea $tarea)
{
    // Valida los datos enviados en la solicitud
    
    $request->validate([
        'nombre' => 'nullable|string|max:255', // Puedes usar 'nullable' para permitir que el campo sea opcional
        'fecha_inicio' => 'nullable|date',
        'fecha_fin' => 'nullable|date',
        'asignado_a' => 'nullable|string|max:255',
    ]);

    // Crea un arreglo de datos para actualizar solo los campos que se proporcionaron en la solicitud
    $data = [];
    if ($request->filled('nombre')) {
        $data['nombre'] = $request->input('nombre');
    }
    if ($request->filled('fecha_inicio')) {
        $data['fecha_inicio'] = $request->input('fecha_inicio');
    }
    if ($request->filled('fecha_fin')) {
        $data['fecha_fin'] = $request->input('fecha_fin');
    }
    if ($request->filled('asignado_a')) {
        $data['asignado_a'] = $request->input('asignado_a');
    }

    // Actualiza los campos en la base de datos solo con los datos proporcionados
    $tarea->update($data);
    // Redirige de vuelta a la vista o a donde lo necesites después de la actualización
    return redirect('/')
    ->with('success', 'Tarea modificada exitosamente.');
}

public function create(Request $request)
{

    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
        'asignado_a' => 'required|string|max:255',
    ]);

    // Crear una nueva instancia de Tarea y asignar los valores
    $tarea = new Tarea([
        'nombre' => $request->input('nombre'),
        'fecha_inicio' => $request->input('fecha_inicio'),
        'fecha_fin' => $request->input('fecha_fin'),
        'asignado_a' => $request->input('asignado_a'),
    ]);

    // Guardar la tarea en la base de datos
    $tarea->save();
    
    return redirect('/')
    ->with('success', 'Tarea creada exitosamente.');
}

}
