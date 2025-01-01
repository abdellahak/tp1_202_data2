<div>
  <!DOCTYPE html>
  <html lang="en" class="dark">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
      const deleteRouteBaseUrl = "{{ url('produits') }}";
    </script>
  </head>

  <body class="bg-slate-900 text-white dark:bg-white dark:text-black relative">
    <div class="flex">
      <div class="container hidden md:block w-fit min-w-56 bg-slate-800 text-white dark:bg-gray-200 dark:text-black">
        <div class="fixed w-5 min-w-56">

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
              <a href="{{-- route('commandes.index') --}}"
                class="w-full hover:bg-slate-700 dark:hover:bg-gray-300 block p-3 text-md"><i
                  class="fa-solid fa-cart-shopping mx-2"></i>Commandes</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="w-full mx-auto bg-slate-900 dark:bg-gray-100 flex flex-col h-screen">
        <div class="flex justify-between items-center mb-4 p-4 dark:bg-white bg-gray-800 w-full">
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
        <div class="container flex flex-col md:flex-row gap-2 p-4 pt-0">
          <div class="flex flex-row items-center">
            <p class="bg-slate-800 dark:bg-gray-200 w-full md:w-fit px-2 py-2 rounded-l-lg ">Le nombre des produits est
              : </p>
            <p
              class="bg-blue-600 dark:bg-blue-600 text-white rounded-r-lg font-semibold px-2 py-2 min-w-14 md:min-w-fit text-center">
              {{ count($produits) }}
            </p>
          </div>
          <div class="flex flex-row items-center">
            <p class="bg-slate-800 dark:bg-gray-200 w-full md:w-fit px-2 py-2 rounded-l-lg ">Le total de quantité des
              produits est
              : </p>
            <p
              class="bg-blue-600 dark:bg-blue-600 text-white rounded-r-lg font-semibold px-2 py-2 min-w-14 md:min-w-fit text-center">
              {{ $produits->reduce(fn($total, $item) => ($total += $item->quantite), 0) }}
            </p>
          </div>
        </div>

        <div
          class="p-4 overflow-y-auto relative pt-0 scrollbar dark:scrollbar-thumb-gray-300 dark:scrollbar-track-gray-100 scrollbar-thumb-gray-700 scrollbar-track-gray-900">
          <table class="min-w-full shadow-md">
            <thead class="bg-slate-800 text-white dark:bg-gray-200 dark:text-black rounded-lg sticky top-0">
              <tr>
                <th class="py-2 px-4 text-start">Id</th>
                <th class="py-2 px-4 text-start">Nom</th>
                <th class="py-2 px-4 text-start">Prix</th>
                <th class="py-2 px-4 text-start">Quantite</th>
                <th class="py-2 px-4 text-start">Description</th>
                <th class="py-2 px-4 text-start">Categorie</th>
                <th class="py-2 px-4 text-center" colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($produits as $item)
                <tr class="hover:bg-slate-700 dark:hover:bg-gray-300" id="item-{{ $item->id }}">
                  <td class="py-2 px-4">{{ $item->id }}</td>
                  <td class="py-2 px-4">{{ $item->nom }}</td>
                  <td class="py-2 px-4">{{ $item->prix }}</td>
                  <td class="py-2 px-4">{{ $item->quantite }}</td>
                  <td class="py-2 px-4">{{ $item->description }}</td>
                  <td class="py-2 px-4">{{ $item->categorie->nom }}</td>
                  <td class="py-2 px-4 text-center">
                    <a href="{{ route('produits.show', $item->id) }}" class="text-blue-500 hover:underline"
                      title="Details">
                      <i class="fa-solid fa-circle-info"></i>
                    </a>
                  </td>
                  <td class="py-2 px-4 text-center">
                    <a href="{{ route('produits.edit', $item->id) }}" class="text-yellow-500 hover:underline"
                      title="Modifier">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                  </td>
                  <td class="py-2 px-4 text-center">
                    <button type="button" data-id="{{ $item->id }}" class="deleteButton" title="Supprimer">
                      <i class="fa-solid fa-trash text-red-500"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="w-full h-full fixed top-0 left-0 hidden justify-center items-center" id="deleteModalDiv">


            <div
              class="relative transform overflow-hidden rounded-lg dark:bg-white bg-gray-800 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
              <div class="dark:bg-white bg-gray-800 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div
                    class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full dark:bg-red-100 bg-red-200 sm:mx-0 sm:size-10">
                    <svg class="size-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" aria-hidden="true" data-slot="icon">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                  </div>
                  <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-base font-semibold dark:text-gray-900 text-gray-100" id="modal-title">Supprimer le
                      produit</h3>
                    <div class="mt-2">
                      <p class="text-sm dark:text-gray-500 text-gray-300">Êtes-vous sûr de vouloir supprimer ce produit
                        ? Cette action est irréversible.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="dark:bg-gray-50 bg-gray-700 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <form action="" method="POST" class="deleteForm m-0" id="">
                  @csrf
                  @method('DELETE')
                  <button type="submit" id="deleteConfirm"
                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Supprimer</button>
                </form>
                <button type="button" id="deleteAnnuler"
                  class="mt-3 inline-flex w-full justify-center rounded-md dark:bg-white bg-gray-800 px-3 py-2 text-sm font-semibold dark:text-gray-900 text-gray-100 shadow-sm ring-1 ring-inset dark:ring-gray-300 ring-gray-600 dark:hover:bg-gray-50 hover:bg-gray-700 sm:mt-0 sm:w-auto">Annuler</button>
              </div>
            </div>


            {{--  --}}
          </div>
        </div>
      </div>
    </div>

    <script>
      // const deleteButtons = document.querySelectorAll('.deleteButton');
      // const deleteModalDiv = document.querySelector('#deleteModalDiv');
      // const deleteAnnuler = document.querySelector('#deleteAnnuler');

      // deleteButtons.forEach(button => {
      //   button.addEventListener('click', (event) => {
      //     event.preventDefault();
      //     const productId = button.dataset.id;
      //     deleteModalDiv.querySelector('.deleteForm').action = `{{ route('produits.destroy', '') }}/${productId}`;
      //     deleteModalDiv.classList.remove('hidden');
      //     deleteModalDiv.classList.add('flex');
      //   });
      // });

      // deleteAnnuler.addEventListener('click', () => {
      //   deleteModalDiv.classList.remove('flex');
      //   deleteModalDiv.classList.add('hidden');
      // });
    </script>
  </body>

  </html>
</div>
