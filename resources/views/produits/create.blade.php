<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <title>Ajouter un produit</title>
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

<body class="bg-gray-100 text-white dark:bg-white dark:text-black min-h-screen">
  <div class="flex min-h-screen bg-gray-100">
    <div
      class="container hidden md:block w-1/6 min-w-56 min-h-full bg-slate-800 text-white dark:bg-gray-200 dark:text-black">
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
        <li class="my-1">
          <a href="{{ route('commandes.index') }}" class="w-full hover:bg-slate-700 dark:hover:bg-gray-300 block p-3 text-md"><i
              class="fa-solid fa-cart-shopping mx-2"></i>Commandes</a>
        </li>
      </ul>
    </div>
    <div class="mx-auto w-full bg-slate-900 dark:bg-gray-100">
      <div class="flex justify-between items-center mb-4 p-4 dark:bg-white bg-gray-800 w-full">
        <div class="flex flex-col gap-2 md:flex-row w-full">
          <a href="{{ route('produits.index') }}"
            class="dark:bg-gray-100 bg-gray-500 hover:bg-gray-700 dark:hover:bg-gray-300 text-white dark:text-black px-4 py-2 rounded block w-fit">
            <i class="fa-solid fa-arrow-left"></i>
          </a>
          <h1 class="text-2xl font-bold ">Ajouter un produit</h1>
        </div>
        <div class="flex flex-col gap-2 md:flex-row">
          <button onclick="toggleDarkMode()"
            class="dark:bg-gray-100 bg-gray-500 text-white dark:text-black px-4 py-2 rounded hover:bg-gray-700 dark:hover:bg-gray-300 block">
            <i class="fa-solid fa-moon"></i>
          </button>
        </div>
      </div>
      <div class="max-w-2xl mx-auto p-6 dark:bg-white bg-slate-800 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6">Ajouter produit:</h1>
        @if ($errors->any())
          <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{ route('produits.store') }}" method="POST">
          @csrf
          <div class="my-4">
            <label for="nom" class="block dark:text-gray-700 text-gray-100 mb-1 text-lg ">Nom :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}"
              class="w-full mb-2 px-2 py-2 rounded focus:outline-none dark:text-black text-white bg-slate-700 dark:bg-gray-200 ">
          </div>
          <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
            <div class="mb-4">
              <label for="prix" class="block dark:text-gray-700 text-gray-100 mb-1 text-lg ">Prix :</label>
              <input type="number" id="prix" name="prix"
                class="w-full mb-2 px-2 py-2 rounded focus:outline-none dark:text-black text-white bg-slate-700 dark:bg-gray-200 ">
            </div>
            <div class="mb-4">
              <label for="quantite" class="block dark:text-gray-700 text-gray-100 mb-1 text-lg">Quantité :</label>
              <input type="number" id="quantite" name="quantite"
                class="w-full mb-2 px-2 py-2 rounded focus:outline-none dark:text-black text-white bg-slate-700 dark:bg-gray-200 ">
            </div>
          </div>
          <div class="mb-4">
            <label for="categorie_id" class="block dark:text-gray-700 text-gray-100 mb-1 text-lg">Catégorie :</label>
            <select name="categorie_id" id="categorie_id"
              class="w-full mb-2 p-2 rounded focus:outline-none dark:text-black text-white bg-slate-700 dark:bg-gray-200 ">
              <option value="">Sélectionner une catégorie</option>
              @foreach ($categories as $item)
                <option value="{{$item->id}}">{{ $item->nom }}</option>
              @endforeach
            </select>
          </div>
          <div class="border-b border-slate-700 dark:border-gray-900/10 pb-2 mb-2">
            <label for="description" class="block dark:text-gray-700 text-gray-100 mb-1 text-lg">Description :</label>
            <textarea name="description" id="description" cols="30" rows="3"
              class="w-full mb-2 p-2 rounded focus:outline-none dark:text-black text-white bg-slate-700 dark:bg-gray-200 ">{{ old('description') }}</textarea>
          </div>
          <div class="text-right">
            <input type="submit" value="Ajouter"
              class="p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
