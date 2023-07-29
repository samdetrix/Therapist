<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Therapists;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderByDesc('created_at')->get();
        $therapists = Therapists::orderByDesc('created_at')->get();
    
        return view('Admin.clients', compact('clients', 'therapists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.add-client');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request_data = $request->all();
        // dd($request_data);
        $client = Client::create([
            'client_name' => $request->input('name'),
            'created_by' => auth()->user()->id,
            'identification_number' => $request->input('id_number'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'next_of_kin_name' => $request->input('next_of_kin_name'),
            'next_of_kin_number' => $request->input('next_of_kin_number'),
        ]);

        return redirect()->route('clients.index')->with('successMessage', 'Client created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        // dd($client);
        return view('Admin.clients-edit', compact('client'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        

        $clientData=[
            'client_name' => $request->input('name'),
            'created_by' => auth()->user()->id,
            'identification_number' => $request->input('id_number'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'next_of_kin_name' => $request->input('next_of_kin_name'),
            'next_of_kin_number' => $request->input('next_of_kin_number'),
        ];
        $client->update($clientData);

        return redirect()->route('clients.index')->with('successMessage', 'Client Details Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
