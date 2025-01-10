<?php

use App\Models\Commande;

$commandes = Commande::with('produits')->get();

// foreach ($commandes as $commande) {
//   $totalProduitPrix = 0;
//   foreach($commande->produits as $produit){
//     $totalProduitPrix += $produit->prix * $produit->pivot->quantite;
//   }
//   $commande->montant = $totalProduitPrix;
//   $commande->save();
// }


Commande::first();