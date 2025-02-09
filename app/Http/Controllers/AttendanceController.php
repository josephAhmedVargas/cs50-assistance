<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\User;
use App\Models\UsersInfo;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
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
            $query->with('user', 'group');
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
            'schedule' => 'required|string',
            'student_ids' => 'required|array', // Validar que sea un arreglo
            'student_ids.*' => 'exists:users,id', // Validar que cada ID exista en la tabla users
            'selected_students' => 'required|array', // Validar que sea un arreglo
            'selected_students.*.id' => 'required|exists:users,id', // Validar que cada ID exista
            'selected_students.*.asistencia' => 'required|string|in:Asistio,No Asistio', // Validar asistencia
            'selected_students.*.nota' => 'nullable|string', // Validar nota

        ]);

        $attendanceData = [
            'cycle_id' => $data['cycle_id'],
            'type' => $data['type'],
            'class_number' => $data['class_number'],
            'office_hour_week' => $data['office_hour_week'],
            'hours_attended' => $data['hours_attended'],
            'schedule' => $data['schedule'],
            'registered_by' => request()->user()->id,
        ];
        
        $attendance = Attendance::create($attendanceData);

        $attendanceDataForStudents = [];
        foreach ($request->selected_students as $student) {
            $attendanceDataForStudents[$student['id']] = [
                'hours_attended' => $data['hours_attended'], // Puede ser null
                'present' => $student['asistencia'] === 'Asistio', // true si asistió, false si no
                'notes' => $student['nota'] ?? null // Nota del estudiante, puede ser null
            ];
        }

        // Usar attach para agregar datos adicionales
        $attendance->students()->attach($attendanceDataForStudents);

        return back()->with('success', 'Attendance recorded successfully');
    }


    public function guardarAsistencia(Request $request)
    {
        // $data = $request->validate([
        //     'cycle_id' => 'required|exists:cycles,id',
        //     'type' => 'required|in:class,office_hour',
        //     'class_number' => 'nullable|integer',
        //     'office_hour_week' => 'nullable|integer',
        //     'hours_attended' => 'nullable|numeric',
        //     'schedule' => 'required|string',
        //     'student_ids' => 'required|array', // Validar que sea un arreglo
        //     'student_ids.*' => 'exists:users,id', // Validar que cada ID exista en la tabla users
        //     'selected_students' => 'required|array', // Validar que sea un arreglo
        //     'selected_students.*.id' => 'required|exists:users,id', // Validar que cada ID exista
        //     'selected_students.*.asistencia' => 'required|string|in:Asistio,No Asistio', // Validar asistencia
        //     'selected_students.*.nota' => 'nullable|string', // Validar nota

        // ]);

        // $attendanceData = [
        //     'cycle_id' => $data['cycle_id'],
        //     'type' => $data['type'],
        //     'class_number' => $data['class_number'],
        //     'office_hour_week' => $data['office_hour_week'],
        //     'hours_attended' => $data['hours_attended'],
        //     'schedule' => $data['schedule'],
        //     'registered_by' => request()->user()->id,
        // ];
        
        // $attendance = Attendance::create($attendanceData);

        // $attendanceDataForStudents = [];
        // foreach ($request->selected_students as $student) {
        //     $attendanceDataForStudents[$student['id']] = [
        //         'hours_attended' => $data['hours_attended'], // Puede ser null
        //         'present' => $student['asistencia'] === 'Asistio', // true si asistió, false si no
        //         'notes' => $student['nota'] ?? null // Nota del estudiante, puede ser null
        //     ];
        // }

        // // Usar attach para agregar datos adicionales
        // $attendance->students()->attach($attendanceDataForStudents);

        // return back()->with('success', 'Attendance recorded successfully');
        try {
            Log::debug('Datos recibidos en la petición:', $request->all());
    
            // ✅ Decodificar `selected_students` de JSON a array
            $selectedStudents = json_decode($request->input('selected_students'), true);
            if (!is_array($selectedStudents)) {
                throw new Exception("El campo selected_students no es un array válido.");
            }
    
            Log::debug('selected_students decodificado:', $selectedStudents);
    
            // ✅ Validar los datos
            $data = $request->validate([
                'cycle_id' => 'required|exists:cycles,id',
                'type' => 'required|in:class,office_hour',
                'class_number' => 'nullable|integer',
                'office_hour_week' => 'nullable|integer',
                'hours_attended' => 'nullable|numeric',
                'schedule' => 'required|string',
                'fechaBloque' => 'required|date',
            ]);

            // ✅ Crear el registro de asistencia
            $attendance = Attendance::create([
                'cycle_id' => $data['cycle_id'],
                'type' => $data['type'],
                'class_number' => $data['class_number'],
                'office_hour_week' => $data['office_hour_week'] ?? null,
                'hours_attended' => $data['hours_attended'] ?? null,
                'schedule' => $data['schedule'],
                'registered_by' => request()->user()->id,
            ]);
    
            Log::debug('Asistencia creada con ID:', ['attendance_id' => $attendance->id]);
    
            // ✅ Insertar datos en la tabla pivote `attendance_students`
            $attendanceDataForStudents = [];
            foreach ($selectedStudents as $student) {
                $attendanceDataForStudents[$student['id']] = [
                    'hours_attended' => $student['horas_atendidas'] ?? null,
                    'present' => $student['asistencia'] === 'Asistio',
                    'notes' => $student['nota'] ?? null,
                ];
            }
    
            Log::debug('Datos de estudiantes para attach:', $attendanceDataForStudents);
    
            if (!empty($attendanceDataForStudents)) {
                $attendance->students()->attach($attendanceDataForStudents);
            } else {
                Log::warning('No se recibieron estudiantes válidos para registrar.');
            }
            return back()->with('success', 'Attendance recorded successfully');
        } catch (Exception $e) {
            Log::error('Error al registrar asistencia:', ['message' => $e->getMessage()]);
            return back()->withErrors('Hubo un error al registrar la asistencia.');
        }
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
        // DB::transaction(function () use ($request, $data, $selectedStudents) {
        //     $formattedDate = Carbon::parse($data['fechaBloque'])->format('Y-m-d');

        //     Log::debug("Buscando asistencia con fecha: ". $formattedDate);

        //     // ✅ Buscar si ya existe la asistencia con los mismos parámetros
        //     $attendance = Attendance::where('cycle_id', $data['cycle_id'])
        //         ->where('type', $data['type'])
        //         ->where('schedule', $data['schedule'])
        //         ->when($data['class_number'] !== null, function ($query) use ($data) {
        //             return $query->where('class_number', $data['class_number']);
        //         })
        //         ->when($data['office_hour_week'] !== null, function ($query) use ($data) {
        //             return $query->where('office_hour_week', $data['office_hour_week']);
        //         })
        //         ->whereDate('created_at', $formattedDate)
        //         ->first();

        //     Log::debug('Asistencia encontrada:'. $attendance);

        //     if (!$attendance) {
        //         $attendance = Attendance::create([
        //             'cycle_id' => $data['cycle_id'],
        //             'type' => $data['type'],
        //             'class_number' => $data['class_number'],
        //             'office_hour_week' => $data['office_hour_week'] ?? null,
        //             'hours_attended' => $data['hours_attended'] ?? null,
        //             'schedule' => $data['schedule'],
        //             'registered_by' => request()->user()->id,
        //             'created_at' => $formattedDate, // Asegurar que la fecha coincida
        //             'updated_at' => now(),
        //         ]);

        //         Log::debug('Asistencia creada: ' . $attendance->id);
        //     } else {
        //         Log::debug('Asistencia existente: ' . $attendance->id);
        //         // ✅ Actualizar `registered_by` concatenando el nuevo usuario
                
        //         $newUserId = request()->user()->id;
        //         $attendance->registered_by = $newUserId;
        //         $attendance->save();
        //         Log::debug('registered_by actualizado: ' . $attendance->registered_by);
                
        //     }

        //     $attendanceDataForStudents = [];
        //     foreach ($selectedStudents as $student) {
        //         $attendanceDataForStudents[$student['id']] = [
        //             'hours_attended' => $student['horas_atendidas'] ?? null,
        //             'present' => $student['asistencia'] === 'Asistio',
        //             'notes' => $student['nota'] ?? null,
        //             'registered_by' => request()->user()->id,
        //         ];
        //     }

        //     if (!empty($attendanceDataForStudents)) {
        //         $attendance->students()->syncWithoutDetaching($attendanceDataForStudents);
        //     } else {
        //         Log::warning('No se recibieron estudiantes válidos para registrar.');
        //     }
    
            
            
        // });

        // return redirect()->route('attendances.create')->with('success', 'Asistencia registrada correctamente.');

    }

    public function blockDetails(Request $request, $date, $block)
    {
        $attendances = Attendance::with(['user_who_registered', 'students.info', 'students.group'])
            ->where('schedule', $block)
            ->whereDate('created_at', $date)
            ->whereNull('deleted_at')
            ->get();

        if ($attendances->isEmpty()) {
            Log::warning("No se encontraron asistencias para la fecha $date y bloque $block");
        }
        return response()->json(['attendances' => $attendances]);
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
