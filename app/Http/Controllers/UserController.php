<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function RegisterUser(Request $request)
    {

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => strtolower($request->input('role')),
        ]);
        $token = $user->createToken('api-token')->plainTextToken;
        $request->session()->put('token', $token);
        // dd($token);
        Session::put('user_id', $user->id);
        Session::put('username', $user->name);
        Session::put('role', $user->role);


        if ($user->role === "admin") {

            return view('Therapist.therapist-dashboard')->with([
                'success' => 'User created successfully.',
                'user' => $user,
            ]);
        } else {
            return view('Dashboard.dashboard')->with([
                'success' => 'User created successfully.',
                'user' => $user,
            ]);
        }
    }
    public function LoginUser(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = User::where('email', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user, $request->has('remember'));

            $request->session()->put('username', $user->name);
            $request->session()->put('user_id', $user->id);
            $request->session()->put('role', $user->role);

            $token = $user->createToken('api-token')->plainTextToken;
            $request->session()->put('token', $token);

            if ($user->therapist_id !== null) {
                $request->session()->put('therapist', $user->therapist_id);
            }

            if ($user->role === "Admin") {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful');
            } else {
                return redirect()->route('therapist.dashboard')->with('success', 'Login successful');
            }
        }

        return redirect()->route('login.page')->with('error', 'Invalid email or password.');
    }
    public function Logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login.page')->with('success', 'Logout successful');
    }
}
