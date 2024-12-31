<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Détails de la catégorie N° {{$categorie->id}}</h1>
        <p class="text-gray-700 mb-4">
            <strong class="font-semibold">Nom : </strong> {{$categorie->nom}}<br>
            <strong class="font-semibold">Description : </strong> {{$categorie->description}}
        </p>
        <a href="{{route('categories.index')}}" class="text-blue-500 hover:text-blue-700">Retourner à la liste</a>
    </div>
</body>
</html>
