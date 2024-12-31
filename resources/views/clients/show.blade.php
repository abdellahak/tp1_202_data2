<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Client N°{{$client->id}}</title>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Détails de la client N° {{$client->id}}</h1>
        <p class="text-gray-700 mb-4">
            <strong class="font-semibold">Prenom : </strong> {{$client->prenom}}<br>
            <strong class="font-semibold">Nom : </strong> {{$client->nom}}<br>
            <strong class="font-semibold">Telephone : </strong> {{$client->telephone}}<br>
            <strong class="font-semibold">Ville : </strong> {{$client->ville}}<br>
            <strong class="font-semibold">Date de naissance : </strong> {{$client->date_naissance}}
        </p>
        <a href="{{route('clients.index')}}" class="text-blue-500 hover:text-blue-700">Retourner à la liste</a>
    </div>
</body>
</html>