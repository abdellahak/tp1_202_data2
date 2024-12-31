<div>
  <!DOCTYPE html>
  <html lang="en" class="dark">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <title>Produits</title>
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
            <a href="{{ route('clients.index') }}"
              class="w-full hover:bg-slate-700 dark:hover:bg-gray-300 block p-3 text-md"><i
                class="fa-regular fa-user mx-2"></i>Clients</a>
          </li>
          <li class="my-1">
            <a href="{{ route('categories.index') }}"
              class="w-full hover:bg-slate-700 dark:hover:bg-gray-300 block p-3 text-md"><i
                class="fa-solid fa-code-fork mx-2"></i>Categories</a>
          </li>
          <li class="my-1">
            <a href="{{ route('produits.index') }}"
              class="w-full bg-slate-700 dark:bg-gray-300 block p-3 text-md border-r-4 border-r-solid border-r-blue-600"><i
                class="fa-solid fa-store mx-2"></i>Produits</a>
          </li>
        </ul>
      </div>
      <div class="w-full mx-auto bg-slate-900 dark:bg-gray-100">
        <div class="flex justify-between items-center mb-4 p-4 dark:bg-white bg-slate-800 w-full">
          <h1 class="text-2xl font-bold">Liste des produits</h1>
          <div class="flex flex-col gap-2 md:flex-row">
            <a href="{{ route('produits.create') }}"
              class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 block">Ajouter Produit</a>
            <button onclick="toggleDarkMode()"
              class="dark:bg-gray-100 bg-gray-500 text-white dark:text-black px-4 py-2 rounded hover:bg-gray-700 dark:hover:bg-gray-300 block">
              <i class="fa-solid fa-moon"></i>
            </button>
          </div>
        </div>
        <div class="container flex flex-col md:flex-row gap-2 px-4">
          <div class="flex flex-row items-center">
            <p class="bg-slate-800 dark:bg-gray-200 w-fit px-2 py-2 rounded-l-lg ">Le nombre des produits est : </p>
            <p class="bg-blue-600 dark:bg-blue-600 text-white rounded-r-lg font-semibold px-2 py-2">
              {{ count($produits) }}
            </p>
          </div>
          <div class="flex flex-row items-center">
            <p class="bg-slate-800 dark:bg-gray-200 w-fit px-2 py-2 rounded-l-lg ">Le total de quantité des produits est
              : </p>
            <p class="bg-blue-600 dark:bg-blue-600 text-white rounded-r-lg font-semibold px-2 py-2">
              {{ $produits->reduce(fn($total, $item) => ($total += $item->quantite), 0) }}
            </p>
          </div>
        </div>

        <div class="p-4 overflow-x-auto">
          <table class="min-w-full shadow-md overflow-hidden">
            <thead class="bg-slate-800 text-white dark:bg-gray-200 dark:text-black rounded-lg">
              <tr>
                <th class="py-2 px-4 text-start">Id</th>
                <th class="py-2 px-4 text-start">Nom</th>
                <th class="py-2 px-4 text-start">Prix</th>
                <th class="py-2 px-4 text-start">Quantite</th>
                <th class="py-2 px-4 text-start">Description</th>
                <th class="py-2 px-4 text-start">Categorie</th>
                <th class="py-2 px-4 text-start" colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($produits as $item)
                <tr class="hover:bg-slate-700 dark:hover:bg-gray-300">
                  <td class="py-2 px-4">{{ $item->id }}</td>
                  <td class="py-2 px-4">{{ $item->nom }}</td>
                  <td class="py-2 px-4">{{ $item->prix }}</td>
                  <td class="py-2 px-4">{{ $item->quantite }}</td>
                  <td class="py-2 px-4">{{ $item->description }}</td>
                  <td class="py-2 px-4">{{ $item->categorie->nom }}</td>
                  <td class="py-2 px-4 text-center">
                    <a href="{{ route('produits.show', $item->id) }}" class="text-blue-500 hover:underline" title="Details">
                      <i class="fa-solid fa-circle-info"></i>
                    </a>
                  </td>
                  <td class="py-2 px-4 text-center">
                    <a href="{{ route('produits.edit', $item->id) }}" class="text-yellow-500 hover:underline" title="Modifier">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                  </td>
                  <td class="py-2 px-4 text-center">
                    <form action="" method="POST" style="margin: 0">
                      @csrf
                      @method('DELETE')
                      <button type="submit" title="Supprimer">
                        <i class="fa-solid fa-trash text-red-500"></i>
                      </button>
                      {{-- <input type="submit" value="Supprimer" class="text-red-500 hover:underline cursor-pointer"> --}}
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
</div>
