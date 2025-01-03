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
        
        $villes = [
            'Casablanca', 'Fès', 'Marrakech', 'Tanger', 'Rabat', 'Agadir', 'Meknès', 'Oujda', 'Kenitra', 'Tétouan',
            'Safi', 'Khouribga', 'El Jadida', 'Nador', 'Béni Mellal', 'Taza', 'Mohammédia', 'Ksar El Kébir', 'Settat',
            'Salé', 'Laâyoune', 'Kénitra', 'Berkane', 'Errachidia', 'Inezgane', 'Taroudant', 'Ouarzazate', 'Al Hoceïma',
            'Tiznit', 'Sidi Kacem', 'Guelmim', 'Bouskoura', 'Dakhla', 'Essaouira', 'Guercif', 'Sidi Slimane', 'Youssoufia',
            'Tan-Tan', 'Azrou', 'Midelt', 'Larache', 'Martil', 'Fnideq', 'Sefrou', 'Boujdour', 'Zagora', 'Oulad Teima',
            'Beni Ansar', 'Taourirt', 'Sidi Bennour', 'Bouznika', 'Benslimane', 'Ait Melloul', 'Berkane', 'Tinghir', 'Chichaoua',
            'El Kelaa des Sraghna', 'Sidi Ifni', 'Azemmour', 'Aknoul', 'Ait Ourir', 'Ait Baha', 'Ait Ishaq', 'Ait Youssef Ou Ali'
        ];
        return view('clients.create', compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Client::create($request->all());
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);
        $villes = [
            'Casablanca', 'Fès', 'Marrakech', 'Tanger', 'Rabat', 'Agadir', 'Meknès', 'Oujda', 'Kenitra', 'Tétouan',
            'Safi', 'Khouribga', 'El Jadida', 'Nador', 'Béni Mellal', 'Taza', 'Mohammédia', 'Ksar El Kébir', 'Settat',
            'Salé', 'Laâyoune', 'Kénitra', 'Berkane', 'Errachidia', 'Inezgane', 'Taroudant', 'Ouarzazate', 'Al Hoceïma',
            'Tiznit', 'Sidi Kacem', 'Guelmim', 'Bouskoura', 'Dakhla', 'Essaouira', 'Guercif', 'Sidi Slimane', 'Youssoufia',
            'Tan-Tan', 'Azrou', 'Midelt', 'Larache', 'Martil', 'Fnideq', 'Sefrou', 'Boujdour', 'Zagora', 'Oulad Teima',
            'Beni Ansar', 'Taourirt', 'Sidi Bennour', 'Bouznika', 'Benslimane', 'Ait Melloul', 'Berkane', 'Tinghir', 'Chichaoua',
            'El Kelaa des Sraghna', 'Sidi Ifni', 'Azemmour', 'Aknoul', 'Ait Ourir', 'Ait Baha', 'Ait Ishaq', 'Ait Youssef Ou Ali'
        ];
        return view('clients.edit', compact('client', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        $client->update($request->all());
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        if($client){
            $client->delete();
            return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
            
        };
        return response()->json(['success' => false, 'message' => 'Item not found.']);
    }
}
