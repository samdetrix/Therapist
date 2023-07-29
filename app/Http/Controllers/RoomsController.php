<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Therapists;
use App\Models\Rooms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $therapists = Therapists::orderByDesc('created_at')->get();

        $rooms = Rooms::with(['createdBy', 'therapist'])
            ->orderByDesc('created_at')
            ->get();

        return view('Admin.rooms', compact('therapists', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $therapists = Therapists::all();
        $users = User::all();

        return view('rooms.create', compact('therapists', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = new Rooms();
        $room->name = $request->room_name;
        $room->building_name = $request->building_name;
        $room->therapist_id = $request->therapist_id;
        $room->created_by = Session::get('user_id');
        $room->save();

        return redirect()->route('rooms.index')->with('successMessage', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rooms $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rooms $room)
    {
        $therapists = Therapists::all();
        $users = User::all();
        $current_therapist = $room->therapist_id;

        return view('Admin.rooms-edit', compact('room', 'therapists', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rooms $room)
    {



        $roomsData = [
            'name' => $request->input('room_name'),
            'building_name' => $request->input('building_name'),
            'therapist_id' => $request->input('therapist_id'),
            'created_by' => Session::get('user_id'),
        ];

        $room->update($roomsData);
        return redirect()->route('rooms.index')->with('successMessage', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($roomID)
    {

        $room = Rooms::find($roomID);

        if (!$room) {
            return redirect()->route('rooms.index')->with('error', 'Room not found.');
        }

        $roomName = $room->name;

        $room->delete();

        return redirect()->route('rooms.index')->with('success', "Room '{$roomName}' has been deleted successfully.");
    }
}
