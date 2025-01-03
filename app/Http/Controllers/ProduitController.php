<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        
        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=> 'required|unique:produits,nom,',
            'prix'=> 'required|numeric',
            'quantite'=> 'required|numeric',
            'categorie_id'=> 'required|exists:categories,id'
        ]);
        Produit::create($request->all());
        return redirect()->route('produits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = Produit::find($id);
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $produit = Produit::find($id);
        $categories = Categorie::all();
        return view('produits.edit', compact('produit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produit = Produit::find($id);
        $request->validate([
            'nom'=> 'required|unique:produits,nom,'.$produit->id,
            'prix'=> 'required|numeric',
            'quantite'=> 'required|numeric',
            'categorie_id'=> 'required|exists:categories,id'
        ]);
        $produit->update($request->all());
        return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Produit::destroy($id);
        $produit = Produit::find($id);
        if($produit){
            $produit->delete();
            return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
            
        };
        return response()->json(['success' => false, 'message' => 'Item not found.']);
    }
}
