<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Produit N°{{$produit->id}}</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <a href="{{route('produits.index')}}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-700">Retourner à la liste</a>
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Détails de la Produit N° {{$produit->id}}</h1>
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="py-2 px-4 font-semibold text-gray-700">Attribut</th>
                <th class="py-2 px-4 font-semibold text-gray-700">Valeur</th>
            </tr>
            </thead>
            <tbody>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Nom :</td>
                <td class="py-2 px-4 text-gray-700">{{$produit->nom}}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Prix :</td>
                <td class="py-2 px-4 text-gray-700">{{$produit->prix}}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Quantite :</td>
                <td class="py-2 px-4 text-gray-700">{{$produit->quantite}}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Description :</td>
                <td class="py-2 px-4 text-gray-700">{{$produit->description}}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Categorie :</td>
                <td class="py-2 px-4 text-gray-700">{{$produit->categorie->nom}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</body>
</html>