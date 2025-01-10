<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <title>@yield('title')</title>
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

<body class="bg-slate-900 text-white dark:bg-white dark:text-black relative min-h-screen">
  <div class="flex min-h-screen">
    <div
      class="container hidden md:block w-fit min-w-56 bg-slate-800 text-white dark:bg-gray-200 dark:text-black min-h-full">
      <div class="fixed w-5 min-w-56">

        <h1 class="text-3xl my-5 p-4">Tableau de bordd</h1>
        <ul>
          @yield('aside')
        </ul>
      </div>
    </div>
    @yield('content')
  </div>
</body>

</html>
