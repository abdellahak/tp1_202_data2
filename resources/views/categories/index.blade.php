<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <title>Categories</title>
    <script>
         // Check if dark mode is enabled from localStorage
         const storedTheme = localStorage.getItem('theme');
        if (storedTheme) {
            document.documentElement.classList.toggle('dark', storedTheme === 'dark');
        }

        // Function to toggle dark mode
        function toggleDarkMode() {
            const isDarkMode = document.documentElement.classList.toggle('dark');
            // Save the theme in localStorage
            localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
        }
    </script>
</head>
<body class="bg-slate-900 text-white dark:bg-white dark:text-black">
    <div class="flex">
        <div class="container hidden md:block w-1/6 min-w-56 bg-slate-800 text-white dark:bg-gray-200 dark:text-black">
            <h1 class="text-3xl my-5 p-4">Tableau de bord</h1>
            <ul>
                <li class="my-1">
                    <a href="{{route('clients.index')}}" class="w-full hover:bg-slate-700 dark:hover:bg-gray-300 block p-3 text-md"><i class="fa-regular fa-user mx-2"></i>Clients</a>
                </li>
                <li class="my-1">
                    <a href="{{route('categories.index')}}" class="w-full bg-slate-700 dark:bg-gray-300 block p-3 text-md border-r-4 border-r-solid border-r-blue-600"><i class="fa-solid fa-code-fork mx-2"></i>Categories</a>
                </li>
                <li class="my-1">
                    <a href="{{route('produits.index')}}" class="w-full hover:bg-slate-700 dark:hover:bg-gray-300 block p-3 text-md"><i class="fa-solid fa-store mx-2"></i>Produits</a>
                </li>
            </ul>
        </div>
        <div class="container mx-auto p-4 bg-slate-900 dark:bg-white">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Liste des categories</h1>
                <div class="flex flex-col gap-2 md:flex-row">
                    <a href="{{route('categories.create')}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 block">Ajouter une nouvelle categorie</a>
                    <button onclick="toggleDarkMode()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 block">
                        <i class="fa-solid fa-moon"></i>
                    </button>
                </div>
            </div>
            
            <p class="mb-4 bg-slate-600 dark:bg-gray-300 w-fit p-1 rounded-md">Le nombre des categories est : <span class="font-semibold">{{count($categories)}}</span></p>
        
            <div class="overflow-x-auto">
                <table class="min-w-full shadow-md overflow-hidden">
                    <thead class="bg-slate-800 text-white dark:bg-gray-200 dark:text-black rounded-lg">
                        <tr>
                            <th class="py-2 px-4">Id</th>
                            <th class="py-2 px-4">Nom</th>
                            <th class="py-2 px-4">Description</th>
                            <th class="py-2 px-4" colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $item)
                            <tr class="hover:bg-slate-800 dark:hover:bg-gray-300">
                                <td class="py-2 px-4">{{$item->id}}</td>
                                <td class="py-2 px-4">{{$item->nom}}</td>
                                <td class="py-2 px-4">{{$item->description}}</td>
                                <td class="py-2 px-4 text-center">
                                    <a href="{{route('categories.show', $item->id)}}" class="text-blue-500 hover:underline">Details</a>
                                </td>
                                <td class="py-2 px-4 text-center">
                                    <a href="{{route('categories.edit', $item->id)}}" class="text-yellow-500 hover:underline">Modifier</a>
                                </td>
                                <td class="py-2 px-4 text-center">
                                    <form action="{{route('categories.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Supprimer" class="text-red-500 hover:underline cursor-pointer">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
