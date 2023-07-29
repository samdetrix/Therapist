<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\Client;
use App\Models\Rooms;
use App\Models\Therapists;
use Illuminate\Support\Facades\Session;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointments::with('client', 'therapist', 'therapist.createdBy')
            ->orderByDesc('created_at')
            ->get();
    
        $rooms = Rooms::with('therapist')
            ->orderByDesc('created_at')
            ->get();
    
        return view('Admin.appointments', compact('appointments', 'rooms'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $therapists = Therapists::all();

        return view('appointments.create', compact('clients', 'therapists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(Session::get('user_id'));
        $therapist = Therapists::find($request->input('therapist_id'));
        $client = Client::find($request->input('client_id'));


        if (!$therapist || !$client) {
            return redirect()->route('appointments.index')->with('error', 'Please enter valid therapist and client IDs.');
        }

        $newAppointment = Appointments::create([
            'therapist_id' => $request->input('therapist_id'),
            'client_id' => $request->input('client_id'),
            'start_time' => $request->input('appointment_time'),
            'created_by' => Session::get('user_id'),
        ]);


        return redirect()->route('appointments.index')->with('successMessage', 'Appointment created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Appointments $appointment)
    {
        return view('Admin.appointments', compact('appointment'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointments $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointments $appointment)
    {
        $therapist = Therapists::find($request->input('therapist_id'));
        $client = Client::find($request->input('client_id'));

        if (!$therapist || !$client) {
            return redirect()->route('appointments.edit', $appointment->id)
                ->with('error', 'Please enter valid therapist and client IDs.');
        }

        $appointment->therapist_id = $therapist->id;
        $appointment->client_id = $client->id;
        $appointment->start_time = $request->input('start_time');
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointments $appointment)
    {
    //    dd($appointment->ongoing);
        if ($appointment->ongoing == 1) {
            $appointment->delete();
            return redirect()->route('appointments.index')->with('successMessage', 'Appointment cancelled successfully.');
        } else {
            return redirect()->route('appointments.index')->with('errorMessage', 'Cannot Cancel an ongoing appointment.');
        }
    }


    public function UpdateAppointmentStatus(Request $request)
    {
        $therapistId = Session::get('therapist');
        $appointmentId = $request->input('appointment_id');

        $appointment = Appointments::find($appointmentId);

        if ($appointment) {
            if ($appointment->therapist_id == $therapistId) {
                $appointment->ongoing = !$appointment->ongoing;
                $appointment->save();

                return redirect()->back()->with('successMessage', 'Appointment status updated successfully.');
            } else {
                return redirect()->back()->with('error', 'You are not authorized to update the status of this appointment.');
            }
        } else {
            return redirect()->back()->with('error', 'Appointment not found.');
        }
    }
}
