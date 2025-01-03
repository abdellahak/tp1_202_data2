<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::all();
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits = Produit::all();
        $clients = Client::all();
        return view('commandes.create', compact('produits', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'produit_id' => 'required',
            'quantite' => 'required|numeric'
        ]);
        Commande::create($request->all());
        return redirect()->route('commandes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commande = Commande::find($id);
        return view('commandes.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commande = Commande::find($id);
        $produits = Produit::all();
        $clients = Client::all();
        return view('commandes.edit', compact('commande', 'produits', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commande = Commande::find($id);
        $request->validate([
            'client_id' => 'required',
            'produit_id' => 'required',
            'quantite' => 'required|numeric'
        ]);
        $commande->update($request->all());
        return redirect()->route('commandes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commande = Commande::find($id);
        if($commande){
            $commande->delete();
            return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
            
        };
        return redirect()->route('commandes.index');
    }
}
