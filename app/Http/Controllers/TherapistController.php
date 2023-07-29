<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Therapists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class TherapistController extends Controller
{
    
    public function RegisterTherapist(Request $request)
    {
        $createdByUserId = Session::get('user_id');
        $createdByUser = User::find($createdByUserId);

        if (!$createdByUser) {
            return redirect()->route('therapists.list')->with('error', 'The provided user ID does not exist.');
        }

        $emailExists = User::where('email', $request->input('email'))->exists();
        if ($emailExists) {
            return redirect()->route('therapists.list')->with('error', 'Email already exists. Cannot create Therapist.');
        }

        // Generate a random password for the therapist to enable them to login for the first time
        $password = Str::random(8);

        $therapist = Therapists::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone_number'),
            'id_number' => $request->input('id_number'),
            'gender' => $request->input('gender'),
            'contact_person' => $request->input('contact_person'),
            'town' => $request->input('town'),
            'skills' => $request->input('skills'),
            'email' => $request->input('email'),
            'created_by' => $createdByUserId,
            'password' => Hash::make($password),
        ]);

        $user = User::create([
            'name' => $therapist->name,
            'email' => $therapist->email,
            'password' => Hash::make($password),
            'role' => 'therapist',
        ]);

        $token = $therapist->createToken('therapist-token')->plainTextToken;

        $user->therapist_id = $therapist->id;
        $user->save();

        // Fetch the actual createdByUser data
        $createdByUser = DB::table('users')->where('id', $createdByUserId)->first();
        return redirect()->route('therapists.list')->with([
            'successMessage' => 'Therapist created successfully. Please use the following password for your first login: ' . $password,
            'createdByUser' => $createdByUser,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($therapistId)
    {
        // Fetch the therapist data
        $therapist = Therapists::find($therapistId);

        if (!$therapist) {
            return redirect()->route('therapists.list')->with('error', 'Therapist not found.');
        }

        return view('Admin.therapists', ['therapist' => $therapist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Therapists $therapist)
    {
        // dd($therapist);
        return view('Admin.therapists-edit', ['therapist' => $therapist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Therapists $therapist)
    {

        $therapistData = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone_number'),
            'id_number' => $request->input('id_number'),
            'gender' => $request->input('gender'),
            'contact_person' => $request->input('contact_person'),
            'town' => $request->input('town'),
            'skills' => $request->input('skills'),
            'email' => $request->input('email'),
        ];

        $therapist->update($therapistData);
        return redirect()->route('therapists.list')->with('successMessage', 'Therapist updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($therapistId)
    {

        $therapist = Therapists::find($therapistId);

        if (!$therapist) {
            return redirect()->route('therapists.list')->with('error', 'Therapist not found.');
        }

        $therapistName = $therapist->name;

        $therapist->delete();

        return redirect()->route('therapists.list')->with('successMessage', "Therapist '{$therapistName}' has been deleted successfully.");
    }
}
