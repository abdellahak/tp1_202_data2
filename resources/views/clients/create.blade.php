@extends('layouts.admin')
@section('title', 'Ajouter un client')
@section('aside')
        <li class="my-1">
          <a href="{{ route('clients.index') }}"
            class="w-full bg-slate-700 dark:bg-gray-300 block p-3 text-md border-r-4 border-r-solid border-r-blue-600"><i
              class="fa-regular fa-user mx-2"></i>Clients</a>
        </li>
        <li class="my-1">
          <a href="{{ route('categories.index') }}"
            class="w-full hover:bg-slate-700 dark:hover:bg-gray-300 block p-3 text-md"><i
              class="fa-solid fa-code-fork mx-2"></i>Categories</a>
        </li>
        <li class="my-1">
          <a href="{{ route('produits.index') }}"
            class="w-full hover:bg-slate-700 dark:hover:bg-gray-300 block p-3 text-md"><i
              class="fa-solid fa-store mx-2"></i>Produits</a>
        </li>
        <li class="my-1">
          <a href="{{ route('commandes.index') }}" class="w-full hover:bg-slate-700 dark:hover:bg-gray-300 block p-3 text-md"><i
              class="fa-solid fa-cart-shopping mx-2"></i>Commandes</a>
        </li>
@endsection
@section('content')
    <div class="mx-auto w-full bg-slate-900 dark:bg-gray-100">
      <div class="flex justify-between items-center mb-4 p-4 dark:bg-white bg-gray-800 w-full">
        <div class="flex flex-col gap-2 md:flex-row w-full">
          <a href="{{ route('clients.index') }}"
            class="dark:bg-gray-100 bg-gray-500 hover:bg-gray-700 dark:hover:bg-gray-300 text-white dark:text-black px-4 py-2 rounded block w-fit">
            <i class="fa-solid fa-arrow-left"></i>
          </a>
          <h1 class="text-2xl font-bold ">Ajouter un client</h1>
        </div>
        <div class="flex flex-col gap-2 md:flex-row">
          <button onclick="toggleDarkMode()"
            class="dark:bg-gray-100 bg-gray-500 text-white dark:text-black px-4 py-2 rounded hover:bg-gray-700 dark:hover:bg-gray-300 block">
            <i class="fa-solid fa-moon"></i>
          </button>
        </div>
      </div>
      <div class="max-w-2xl mx-auto p-6 dark:bg-white bg-slate-800 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6">Ajouter client:</h1>
        @if ($errors->any())
          <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{ route('clients.store') }}" method="POST">
          @csrf
          <div class="my-4">
            <label for="prenom" class="block dark:text-gray-700 text-gray-100 mb-1 text-lg ">Prenom :</label>
            <input type="text" id="nom" name="prenom"
              class="w-full mb-2 px-2 py-2 rounded focus:outline-none dark:text-black text-white bg-slate-700 dark:bg-gray-200 ">
          </div>
          <div class="my-4">
            <label for="nom" class="block dark:text-gray-700 text-gray-100 mb-1 text-lg ">Nom :</label>
            <input type="text" id="nom" name="nom"
              class="w-full mb-2 px-2 py-2 rounded focus:outline-none dark:text-black text-white bg-slate-700 dark:bg-gray-200 ">
          </div>
          <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
            <div class="mb-4">
              <label for="telephone" class="block dark:text-gray-700 text-gray-100 mb-1 text-lg ">Telephone :</label>
              <input type="tel" id="telephone" name="telephone"
                class="w-full mb-2 px-2 py-2 rounded focus:outline-none dark:text-black text-white bg-slate-700 dark:bg-gray-200 ">
            </div>
            <div class="mb-4">
              <label for="ville" class="block dark:text-gray-700 text-gray-100 mb-1 text-lg">Ville :</label>
              <select name="ville" id="ville"
                class="w-full mb-2 p-2 rounded focus:outline-none dark:text-black text-white bg-slate-700 dark:bg-gray-200 ">
                <option value="">Sélectionner une ville</option>
                @foreach ($villes as $item)
                  <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="mb-4">
            <label for="date_naissance" class="block dark:text-gray-700 text-gray-100 mb-1 text-lg">Date de naissance
              :</label>
            <input type="date" id="date_naissance" name="date_naissance"
              class="w-full mb-2 px-2 py-2 rounded focus:outline-none dark:text-black text-white bg-slate-700 dark:bg-gray-200 ">
          </div>
          <div class="text-right">
            <input type="submit" value="Ajouter"
              class="p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
          </div>
        </form>
      </div>
    </div>
@endsection