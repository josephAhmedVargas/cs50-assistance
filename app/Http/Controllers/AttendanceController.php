<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with(['registered_by', 'cycle'])->latest();
        return view('attendances.index', compact('attendances'));
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
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
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
        //
    }
}
