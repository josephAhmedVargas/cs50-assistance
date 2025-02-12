<?php

namespace App\Http\Controllers;

use App\Models\UsersInfo;
use App\Http\Requests\StoreUsersInfoRequest;
use App\Http\Requests\UpdateUsersInfoRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreUsersInfoRequest $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'identification_number' => 'required|string|unique:users_infos,identification_number',
            'residence' => 'required|string',
            'birth_date' => 'required|date',
            'phone' => 'required|string',
            'education_level' => 'required|string',
            'institution_name' => 'required|string',
            'institution_address' => 'required|string',
            'career' => 'required|string',
            'tshirt_size' => 'required|string',
        ]);

        $user = User::findOrFail($data['user_id']);
        $year = now()->format('y'); // Últimos dos dígitos del año
        $cycle = "Y{$year}C1";

        $usernameBase = strtolower(substr($data['first_name'], 0, 1) . $data['last_name']);
        
        $existingUsernames = User::where('unique_code', 'like', "$cycle-$usernameBase%")->pluck('unique_code')->toArray();
        
        if (in_array("$cycle-$usernameBase", $existingUsernames)) {
            $middleInitial = isset($data['middle_name']) ? substr($data['middle_name'], 0, 3) : '';
            $usernameBase = strtolower(substr($data['first_name'], 0, 1) . $middleInitial . $data['last_name']);
        }

        $uniqueUsername = "$cycle-$usernameBase";

        $user->unique_code = $uniqueUsername;
        $user->save();

        UsersInfo::create($data);
        return response()->json(['message' => 'User information saved successfully', 'unique_code' => $uniqueUsername]);
    }

    /**
     * Display the specified resource.
     */
    public function show(UsersInfo $usersInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsersInfo $usersInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersInfoRequest $request, UsersInfo $usersInfo)
    {
        // dd($request->all());
    }

    public function actualizar(Request $request, $usersInfoId)
    {

        $usersInfo = UsersInfo::where('user_id', $usersInfoId)->first();
        $usersInfo->update($request->all());

        return back()->with('success', 'User information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsersInfo $usersInfo)
    {
        //
    }
}
