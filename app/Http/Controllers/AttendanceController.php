<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
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
        //
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
