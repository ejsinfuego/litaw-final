<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <script>
        tailwind.config = {
          theme: {
            extend: { colors: {
                    "navy-blue": "#084D8B",
             },
             fontFamily: {
              'poppins': ['Poppins', 'sans-serif'],
             }
            }
          }
          
        }
  function toggleLoginNavItem() {
      var loginNavItem = document.getElementById("loginNavItem");
      loginNavItem.classList.toggle("hidden");
  }

  function toggleLoginModal() {
  const modal = document.getElementById('loginModal');
  modal.classList.toggle('hidden');
}

  function hideLoginModal() {
  const modal = document.getElementById('loginModal');
  modal.classList.add('hidden');
}
</script>
</head>

<body>
  <nav class="navbar-top relative bg-gradient-to-tr py-12 bg-center">
    <img src="{{ asset('img/nav-top.jpg')}}" alt="Navbar Image" class="absolute inset-0 w-full h-full object-cover opacity-50">
    <div class="absolute inset-0 bg-white opacity-30 bg-"></div>
    <div class="absolute left-0 top-0 h-full w-1/2 bg-gradient-to-r from-white to-transparent opacity-500"></div>

    <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-white to-transparent opacity-200">
      
    </div>
    <img src="{{ asset('img/litaw_logo.png')}}" alt="Navbar Image" class="absolute inset-0 lg:w-1/4 mx-2 w-80 lg:mx-16 object-cover opacity-100">
    
</nav>

<nav class="bg-navy-blue px-14 shadow-md font-sans font-semibold">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 transition duration-700 ease-in-out">
      <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white md:hidden" aria-controls="navbar-dropdown" aria-expanded="false" onclick="toggleLoginNavItem()">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>      
      <div class="hidden w-full md:flex md:w-auto md:items-center md:justify-center" id="navbar-dropdown">
          <ul class="flex flex-col md:p-0 mt-4 rounded-lg bg-navy-blue md:flex-row md:space-x-12 md:mt-0 md:border-0 md:bg-navy-blue dark:border-gray-700 justify-center"> <!-- Add justify-center class here -->
              <li>
                  <a href="{{route('dashboard')}}" class="block py-2 pl-3 pr-4 text-white md:p-0" aria-current="page">Home</a>
              </li>
              <li>
                  <a href="/about.html" class="block py-2 pl-3 pr-4 text-white md:p-0">About</a>
              </li>
              <li>
                  <a href="/Theses.html" class="block py-2 pl-3 pr-4 text-white md:p-0">Theses</a>
              </li>
              <li>
                  <a href="/journal.html" class="block py-2 pl-3 pr-4 text-white md:p-0">Journals</a>
              </li>
              <li>
                  <a href="/statistics.html" class="block py-2 pl-3 pr-4 text-white md:p-0">Statistics</a>
              </li>
              <li>
                @guest
                <a href="{{ route('login') }}" class="block py-2 pl-3 pr-4 text-white md:p-0">Submit Manuscript</a>
                @else
                <a href="/submit" class="block py-2 pl-3 pr-4 text-white md:p-0">Submit Manuscript</a>
                @endguest
              </li> 
          </ul>               
      </div>  
      @guest
      <li id="loginNavItem" class="hidden md:block list-none">       
        <div class="md:flex items-center justify-end">
            <a href="{{ route('login') }}" class="block py-1.5 px-1 font-medium w-24 text-white bg-orange-600 hover:bg-transparent hover:border-white border-orange-600 inline-flex items-center justify-center space-x-1 rounded-lg border">
                <span>Login</span>
            </a>               
        </div>  
    </li>
      @else
      <li id="loginNavItem" class="hidden md:block list-none">       
        <div class="md:flex items-center justify-end">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                     <i class="fa fa-sign-out"></i>{{ __('Logout') }}
             </x-dropdown-link>
     </form>
        </div>  
    </li>
      @endguest

  </div>
</nav>


<div id="loginModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
  <div class="absolute inset-0 bg-black opacity-50"></div>
  <div class="relative w-full max-w-md max-h-full">
  
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal" onclick="hideLoginModal()">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
      @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif
      <form method="POST" action="{{ route('login') }}" class="bg-white border rounded-md shadow-md p-8" id="loginForm">
            @csrf
        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h3>
        <x-validation-errors class="mb-4" />
          <div class="relative z-0 w-full mb-6 group">
            <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
          </div>

          <div class="relative z-0 w-full mb-6 group">
              <input type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
          </div>

          <div class="flex items-center justify-between mb-6">
              <div class="flex items-center">
                <input id="remember" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                  <label for="remember" class="ml-2 text-sm text-gray-900 dark:text-gray-300">Remember me</label>
              </div>

              <div class="text-sm">
                <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Forgot password?</a>
              </div>
          </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
            <div class="flex items-center justify-center mt-2">
              <p class="text-sm text-gray-600 dark:text-gray-400">Not Registered? <a href="" class="text-blue-600 dark:text-blue-500 hover:underline">Create Account</a></p>
            </div> 
            
          </form>
      </div>
    </div>
  </div>

