<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\User;
use App\Models\UsersInfo;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $attendances = Attendance::with(['registered_by', 'cycle'])->latest();
        // return view('attendances.index', compact('attendances'));
        $attendances = Attendance::with('user_who_registered') // Cargar el usuario que subió la asistencia
            ->whereNull('deleted_at') // Excluir eliminadas
            ->get(); // Ordenar por fecha más reciente
        return view('show_assistance', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attendances.new');
    }

    public function buscarEstudiantes(Request $request)
    {
        // $query = $request->input('q');
        $estudiantes = User::query();

        // Convertir tanto el nombre a buscar como los nombres de la base de datos a minúsculas para una comparación exacta
        // $estudiantes = User::all()->where('name', 'like', '%' . strtolower($request->input('q')) . '%');

        if ($request->has('q')) {
            $search = $request->input('q');

            $query = UsersInfo::query();
            $query->whereAny(["first_name", "last_name", "middle_name", "second_last_name"], 'like', '%' . $search . '%');

            $query->orWhereHas('user', function($query) use ($search) {
                $query->whereAny(["unique_code", "name"], 'like', '%' . $search . '%');
            });
            $query->with('user');
            return $query->get();
        }
        else {
            return UsersInfo::all();
        }
        // Verificar si se encontraron resultados
        if ($estudiantes->isEmpty()) {
            return response()->json(['message' => 'No se encontraron estudiantes'], 404);
        }

        return response()->json($estudiantes->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        $data = $request->validate([
            'cycle_id' => 'required|exists:cycles,id',
            'type' => 'required|in:class,office_hour',
            'class_number' => 'nullable|integer',
            'office_hour_week' => 'nullable|integer',
            'hours_attended' => 'nullable|numeric',
            'present' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        $data['registered_by'] = request()->user()->id;
        
        $attendance = Attendance::create($data);
        $attendance->students()->sync($request->student_ids);

        return back()->with('success', 'Attendance recorded successfully');
    }


    public function guardarAsistencia(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'clase_id' => 'required',
            'actividad_id' => 'required',
            'estudiantes' => 'required|array'
        ]);

        dd($request->estudiantes);

        // foreach ($request->estudiantes as $estudiante) {
        //     Attendance::create([
        //         'user_id' => $estudiante['id'],
        //         'fecha' => $request->fecha,
        //         'class_number' => $request->clase_id,
        //         'actividad_id' => $request->actividad_id,
        //         'asistencia' => $estudiante['asistencia'],
        //         'nota' => $estudiante['nota'] ?? null
        //     ]);
        // }

        return response()->json(['success' => true, 'message' => 'Asistencia guardada exitosamente.']);
    }

    public function eliminarAsistencia($id)
    {
        $asistencia = Attendance::findOrFail($id);
        return response()->json(['success' => true, 'message' => 'Registro eliminado.']);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $attendance = Attendance::with('user_who_registered')->findOrFail($id);

        return view('attendances.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    public function blockDetails(Request $request, $date, $block)
    {
        // $block = $request->query('block');
        // $date = $request->query('date');
        $userId = request()->user()->id;

        $attendances = Attendance::with('registered_by')
            ->where('schedule', $block)
            ->whereDate('created_at', $date)
            ->where('user_id', '!=', $userId) // Solo asistencias de otro usuario
            ->whereNull('deleted_at')
            ->get();

        return view('attendances.block-details', compact('attendances', 'block', 'date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        if ($attendance->registered_by !== request()->user()->id) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar esta asistencia.');
        }

        $attendance->delete();

        return redirect()->route('attendances.index')->with('success', 'Asistencia eliminada correctamente.');
    }
}
