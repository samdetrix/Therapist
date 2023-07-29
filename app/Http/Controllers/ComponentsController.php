<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Therapists;
use App\Models\User;
use App\Models\Appointments;
use Illuminate\Support\Facades\Session;



class ComponentsController extends Controller
{
    public function LoadSignInPage()
    {
        return view('Authentication.auth-register');
    }
    public function LoadAdminDashboard()
    {
        return view('Dashboard.dashboard');
    }
    public function LoadLoginPage()
    {

        return view('Authentication.auth-login');
    }
    public function LoadTherapists()
    {
        $therapists = Therapists::orderByDesc('created_at')->get();

        foreach ($therapists as $therapist) {
            $createdByUser = User::find($therapist->created_by);
            $therapist->createdByUser = $createdByUser;
        }

        return view('Admin.therapists', ['therapists' => $therapists]);
    }
    public function AddTherapists()
    {


        return view('Admin.add-therapist');
    }
    public function TherapistDashboard()
    {
        return view('Therapist.therapist-dashboard');
    }
    public function LoadTherapyAppointments()
    {

        $therapistId = Session::get('therapist');

        $appointments = Appointments::where('therapist_id', $therapistId)
            ->orderBy('created_at', 'desc')
            ->get();

        // dd($appointments);

        return view('Therapist.therapist-appointments', compact('appointments'));
    }
}
