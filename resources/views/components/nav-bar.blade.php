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
    <script src="{{asset('pdfThumbnails/pdfThumbnails.js')}}" data-pdfjs-src="{{asset('pdfThumbnails/pdf.js/build/pdf.js')}}"></script>

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
  function toggleSignUpForm() {
    const signUpForm = document.getElementById('studentSignUpForm');
    hideLoginModal();
    signUpForm.classList.toggle('hidden');
  }
  function hideSignUpModal() {
  const modal = document.getElementById('studentSignUpForm');
  modal.classList.add('hidden');
}

function showTerms(){
    const terms = document.getElementById("terms");
    terms.classList.toggle('hidden');
  }
  
  function hideTerms(){
    const terms = document.getElementById('terms');
    terms.classList.add('hidden');
  }

  function guestModal(){
    const guest = document.getElementById('guestModal');
    guest.classList.toggle('hidden')
  }

</script>
<style>
  .popup {
      display: none;
  }
  .group:hover .popup {
      display: block;
  }
</style>
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
                  <a onclick="showTerms()" class="block py-2 pl-3 pr-4 text-white md:p-0">About</a>
              </li>
              <li>
              @hasanyrole('contentModerator|admin')
                  <a href="{{route('moderator.index')}}" class="block py-2 pl-3 pr-4 text-white md:p-0">Theses Manager</a>
              @else
              <a href="{{route('theses')}}" class="block py-2 pl-3 pr-4 text-white md:p-0">Theses </a>
              </li>
              @endhasanyrole
              {{-- <li>
                  <a href="/journal.html" class="block py-2 pl-3 pr-4 text-white md:p-0">Journals</a>
              </li> --}}
              {{-- <li>
                  <a href="/statistics.html" class="block py-2 pl-3 pr-4 text-white md:p-0">Statistics</a>
              </li> --}}
              <li>
                @guest
                <a href="#" onclick="toggleLoginModal()" class="block py-2 pl-3 pr-4 text-white md:p-0">Submit Manuscript</a>
                @else
                <a href="/submit" class="block py-2 pl-3 pr-4 text-white md:p-0">Submit Manuscript</a>
                @endguest
              </li> 
          </ul>               
      </div>
      
      @auth
      <div class="ml-5">
      <p class="text-white">Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p> 
      </div> 
      @endauth
     
      @guest
      <li id="loginNavItem" class="hidden md:block list-none">       
        <div class="md:flex items-center justify-end">
            <a href="#" onclick="toggleLoginModal()" class="block py-2 px-1 font-medium w-24 text-white bg-orange-600 hover:bg-transparent hover:border-white border-orange-600 inline-flex items-center justify-center space-x-1 rounded-lg border">
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

<div id="guestModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
  <div class="absolute inset-0 bg-black opacity-50"></div>
  <div class="relative w-full max-w-md max-h-full">
  
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal" onclick="guestRequestModal()">
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
        <h3 class="mb-4 text-xl font-medium text-gray-900">Submit a request to access this file</h3>
        <x-validation-errors class="mb-4" />
          <div class="relative z-0 w-full mb-6 group top-4">
            <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
          </div>

          <div class="relative z-0 w-full mb-6 group top-4">
              <input type="text" name="first_name" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Name</label>
          </div>

          <div class="relative z-0 w-full mb-6 group top-4">
            <input type="text" name="last_name" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
        </div>

        <div class="relative z-0 w-full mb-6 group top-4">
          <textarea type="text" name="notes" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required /></textarea>
          <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Notes</label>
      </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            <div class="flex items-center justify-center mt-2">
              <p class="text-sm text-gray-600 dark:text-gray-400"><a href="#" onclick="toggleSignUpForm()" class="text-blue-600 dark:text-blue-500 hover:underline"> Create Account</a> or  <a href="#" onclick="toggleLoginModal()" class="text-blue-600 dark:text-blue-500 hover:underline"> Login </a> to get an access to all resources.</p>
            </div> 
            
          </form>
      </div>
    </div>
  </div>

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
        <h3 class="mb-4 text-xl font-medium text-gray-900">Sign in to our platform</h3>
        <x-validation-errors class="mb-4" />
          <div class="relative z-0 w-full mb-6 group top-4">
            <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
          </div>

          <div class="relative z-0 w-full mb-6 group top-4">
              <input type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
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
              <p class="text-sm text-gray-600 dark:text-gray-400">Not Registered? <a href="#" onclick="toggleSignUpForm()" class="text-blue-600 dark:text-blue-500 hover:underline">Create Account</a></p>
            </div> 
            
          </form>
      </div>
    </div>
  </div>

  <div id="terms" class="fixed overflow-auto inset-0 flex items-center justify-center z-50 hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative w-full max-w-xxl max-h-full">
    
      <div class="relative w- bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal" onclick="hideTerms()">
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
        <div class="bg-white border rounded-md shadow-md p-8 w-54">
          <h3 class="mb-4 text-xl font-medium text-gray-900">About Us</h3>
          <p class="text-gray-700 py-3">Welcome to the LITAW: Local Indexing of Theses and Academic Works. This is an unofficial digital repository of theses Partido State University where students can look for Local Related Studies and Literature for their thesis writing.<br></p>
          <div class="text-gray-600 justify-center px-2">
            <h3 class="mb-4 text-xl font-medium text-gray-900">Terms and Conditions</h3>
<p>Last Updated: October 18, 2023</p>

<p class="py-3">
By accessing and using this Repository, you agree to be bound by the following Terms and Conditions. If you do not agree to these terms, please do not use the Repository.</p>

<p>1. Use of the Repository</p>

<p class="pl-5">1.1. The Repository is a digital platform designed to store, access, and disseminate theses and related academic content.
</p>
<p class="pl-5">
1.2. Users may access and use the Repository for personal, educational, research, and non-commercial purposes.  
</p>

<p class="pl-5">
1.3. Users are prohibited from using the Repository for any unlawful or malicious activities, including but not limited to hacking, distributing malware, or violating intellectual property rights.  
</p>

<p>
2. Copyright and Licensing  
</p>

<p class="pl-5">
2.1. All theses and related content made available on the Repository are subject to copyright protection and may be protected by licensing agreements.
</p>
<p class="pl-5">
2.2. Users may access, download, and use the content in accordance with the permissions and restrictions outlined in the associated licensing terms, which are provided alongside each thesis.  
</p>

<p class="pl-5">
 2.3. It is the responsibility of users to respect and comply with the applicable copyright and licensing terms. Any unauthorized use or distribution of content may result in legal action. 
</p>

<p>
3. User Responsibilities
</p>
<p class="pl-5">
  3.1. Users are solely responsible for the content they upload or submit to the Repository.<br>
  3.2. Users must ensure that any content they contribute to the Repository does not infringe upon the intellectual property rights, privacy, or other legal rights of others.<br>
  3.3. Users should not upload any content that is defamatory, offensive, discriminatory, or otherwise objectionable.
</p>
<p>
4. Privacy and Data Protection<br>
</p>
<p class="pl-5">
4.1. We collect and process personal data in accordance with our Privacy Policy, which can be accessed on our website. By using the Repository, you consent to the collection and use of your personal data as described in the Privacy Policy.
</p>

<p>5. Disclaimer<br>
</p>
<p class="pl-5">
5.1. We make no warranties or representations about the accuracy, completeness, or suitability of the content available in the Repository. Use the content at your own risk.<br>5.2. We are not responsible for any loss, damage, or harm that may result from your use of the Repository.

</p>


<p>
  6. Termination
<br>
</p>
<p class="pl-5">
6.1. We reserve the right to terminate or suspend access to the Repository at our discretion and without prior notice.
<br>
6.2. Upon termination, users must cease using the Repository and destroy any downloaded or printed materials from the Repository.
</p>
<p>
7. Changes to Terms and Conditions
<br>
</p>
<p class="pl-5">
7.1. We may update these Terms and Conditions at any time. The most current version will be posted on the Repository's website. It is your responsibility to review these terms periodically.
</p>
<p>
 8. Governing Law
<br>
</p>
<p class="pl-5">
8.1. These Terms and Conditions are governed by and construed in accordance with the laws of "Data Privacy Act of 2012". 
</p>

<p class="py-4">
 By using the Thesis Digital Repository, you acknowledge that you have read and understood these Terms and Conditions and agree to be bound by them. If you do not agree with these terms, please refrain from using the Repository.

For any questions or concerns regarding these Terms and Conditions, please contact us at litaw@gmail.com.
 
</p>
<p>
  LITAW: Local Indexing of Theses and Academic Works<br>
  litaw@gmail.com<br>
  Date: October 18, 2023
</p>




            </p>
          </div>
            </div>
        </div>
      </div>
    </div>

  <div id="studentSignUpForm" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative w-full max-w-md max-h-full">
    
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal" onclick="hideSignUpModal()">
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
        
        @php
        $courses = App\Models\Course::all();
        $colleges = App\Models\College::all();
        @endphp
        <form method="POST" action="{{route('register')}}" class="bg-white border rounded-md shadow-md p-8">
        @csrf
      <h3 class="mb-4 text-xl font-medium text-gray-900">Create an account</h3>
      <p class="mb-4 text-sm font-medium text-gray-900">Note: Items marked with * are required.</p>
      <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name<span class="text-red-500">*</span></label>
      </div>

      <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name<span class="text-red-500">*</span></label>
      </div>
      <div class="relative z-0 w-full mb-6 group">
        <input pattern="[0-9]*" name="student_id" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID Number<span class="text-red-500">*</span></label>
      </div>

      <div class="relative z-0 w-full mb-6 group">
        <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Institution email address<span class="text-red-500">*</span></label>
      </div>

      <div class="relative z-0 w-full mb-6 group">
        <select id="floating_email" name="college" class="lock py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
        <optgroup class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" label="Select College"></optgroup>
        @foreach ($colleges as $college )
        <option value="{{$college->id}}" class="text-gray-900">{{$college->college}}</option>
        @endforeach
        </select>
        <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" style="left: 2px;">College<span class="text-red-500">*</span></label>

      </div>
      <div class="relative z-0 w-full mb-6 group">
        <select id="floating_email" name="program" class="lock py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
        <optgroup class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" label="Select College"></optgroup>
        @foreach ($courses as $course)
        <option value="{{$course->id}}" class="text-gray-900">{{$course->course}}</option>
        @endforeach
        </select>
        <label for="program" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" style="left: 2px;">Programs<span class="text-red-500">*</span></label>

      </div>

      <div class="relative z-0 w-full mb-6 group">
        <input type="password" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password<span class="text-red-500">*</span></label>
      </div>

      <div class="relative z-0 w-full mb-6 group">
        <input type="password" name="password_confirmation" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="password_confirmation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password<span class="text-red-500">*</span></label>
      </div>
       
      <fieldset>
        <div class="flex items-center mb-4">
          <input checked id="checkbox-1" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
            <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree to the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a><span class="text-red-500">*</span></label>
        </div>
      </fieldset>

      <div class="flex items-center">
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
        </div>
        <div class="flex items-center justify-center mt-2">
          <p class="text-sm text-gray-600 dark:text-gray-400">
            Already have an account? <a id="loginLink" href="/login.html" class="text-blue-600 dark:text-blue-500 hover:underline">Sign in</a>
          </p>
       </div>
      </form>
              
            
        </div>
      </div>
    </div>
   
    

  


