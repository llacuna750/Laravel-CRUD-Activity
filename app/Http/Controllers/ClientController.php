<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()); 

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'dob' => 'required|date',
        ]);

        $newClient = Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
