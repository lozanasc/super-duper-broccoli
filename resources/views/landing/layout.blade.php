<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Dumaguete_seal.svg/1200px-Dumaguete_seal.svg.png" type="image/x-icon">
  <link rel="stylesheet" href=" {{asset('css/app.css')}} ">
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script src=" {{ asset('js/app.js') }} "></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
  <title>ASSESSORS</title>
</head>
<body>
  <header class="text-gray-400 bg-gray-900 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
        <a href="{{ route('home') }}" class="mr-5 hover:text-white cursor-pointer
          @if(Route::current()->getName() === 'home')
            font-bold
            text-white
          @endif
        ">Home</a>
        <a href="{{ route('about') }}" class="mr-5 hover:text-white cursor-pointer
          @if(Route::current()->getName() === 'about')
            text-white
            font-bold
          @endif
        ">About</a>
        <a href="{{ route('services') }}" class="mr-5 hover:text-white cursor-pointer
          @if(Route::current()->getName() === 'services')
            text-white
            font-bold
          @endif
        ">Services</a>
        <a href="{{ route('contact') }}" class="hover:text-white cursor-pointer
          @if(Route::current()->getName() === 'contact')
            text-white
            font-bold
          @endif
        ">Contact</a>
      </nav>
      <a class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-white lg:items-center lg:justify-center mb-4 md:mb-0">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Dumaguete_seal.svg/1200px-Dumaguete_seal.svg.png" class="w-10 h-10 text-white p-2 bg-white rounded-full">
        <span class="ml-3 text-xl xl:block lg:hidden">ASSESSORS</span>
      </a>
      <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
        <a href="{{ route('register') }}" class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0">Sign Up
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"></path>
          </svg>
        </a>
      </div>
    </div>
  </header>
  {{-- *** Other pages rendered here... this is the base layout*** --}}
  @yield('root')
  <footer class="text-gray-600 body-font">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
      <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Dumaguete_seal.svg/1200px-Dumaguete_seal.svg.png" class="w-10 h-10 text-white p-2 bg-white rounded-full">
        <span class="ml-3 text-xl">ASSESSORS</span>
      </a>
      <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2022 Dumaguete City Assessor's Office
      </p>
      <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
        <a class="text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
            <circle cx="4" cy="4" r="2" stroke="none"></circle>
          </svg>
        </a>
      </span>
    </div>
  </footer>
</body>
</html>