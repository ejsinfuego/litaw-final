<x-nav-bar></x-nav-bar>
<div id="default-carousel" class="relative w-full" data-carousel="slide">
  <!-- Carousel wrapper -->
  <div class="relative h-56 overflow-hidden  md:h-96">
    <!-- Item 1 -->
    <div class="hidden duration-100 ease-in-out" data-carousel-item>
      <img src="/assets/img/bee.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
    </div>
    <!-- Item 2 -->
    <div class="hidden duration-100 ease-in-out" data-carousel-item>
      <img src="/assets/img/CAP2-PR1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
    </div>
  </div>
  <!-- Slider indicators -->
  <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
  </div>
  <!-- Slider controls -->
  <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
      <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
      </svg>
      <span class="sr-only">Previous</span>
    </span>
  </button>
  <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
      <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
      </svg>
      <span class="sr-only">Next</span>
    </span>
  </button>
</div>


  <main class="relative max-w-screen overflow-x-hidden" style="height: 480px;">
    <div class="bg-cover bg-no-repeat bg-center md:h-full h-full" style="background-image: url({{ asset('/img/bg.jpg') }});">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="container mx-auto md:h-96 flex flex-col items-center justify-center relative pt-14 md:pt-12 z-10">
            <h1 class="text-2xl md:text-4xl font-regular text-white text-center px-8 md:px-35 pt-4">Discover Academic Excellence In Our University's Repository</h1>
            <p class="text-md md:text-md font-light text-white text-center px-4 md:px-44 mb-1 my-4">Welcome to our digital repository, where knowledge meets innovation. Discover meticulously curated theses and academic works spanning various disciplines, harnessing the power of knowledge dissemination for generations to come.</p>
            <div class="flex flex-col md:flex-row md:items-center mt-12">
              <div class="relative">
                <select id="default" class="w-full md:w-48 py-2.5 px-2 text-sm font-medium text-gray-900  block w-40 p-2.5 border border-gray-300 md:rounded-l-md border border-gray-300 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700/50 dark:border-gray-600 dark:text-white">
                  <option class="focus:bg-gray-50" selected>All colleges</option>
                  <option class="" value="US">Arts and Science</option>
                  <option class="" value="CA">Business and Management</option>
                  <option class="" value="FR">Education</option>
                  <option class="" value="DE">Engineering and Technology</option>
                </select>
              </div>
              
              <div class="relative w-full mt-3 md:mt-0 md:w-auto">
                <form method="GET" action="search/{title}">
                <x-input name="searchTitle" placeholder="{{ $placeholder = 'Search'}}" type="search" id="search-dropdown" required></x-input>
                <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 md:rounded-r-lg border border-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                </form>
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                  </svg>
                  <span class="sr-only">Search</span>
                </button>
              </div>
            </div>             
        </div>
    </div>
</main>
<section class="py-8">
  <div class="container mx-auto px-4 md:px-0">
    <h2 class="text-4xl font-bold mb-4 text-center text-gray-700">COLLEGES</h2>
    <p class="text-center text-gray-600">Select colleges to browse thesis and academic works</p>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-8 md:px-20 px-0">
      <a href="categories/{{$cas}}" class="bg-white college-container border px-4 py-4 shadow-md rounded-md hover:border hover:border-gray-300">
        <div class="college-content pt-8 flex flex-col items-center">
          <div class="college-image w-44 justify-center">
            <img src="{{ asset('/img/CAS-logo.png') }}" alt="CAS">
          </div>
          <h3 class="text-lg font-bold text-gray-700 pt-8 pb-2">Arts and Science</h3>
          <p class="text-gray-600 college-description text-sm px-2 text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Produce globally competitive graduates equipped with high ethical standard of professionalism in the field of Arts and Sciences.</p> <!-- Added py-2 class for padding -->
        </div>
      </a>
      

      <a href="categories/{{$cbm}}" class="bg-white college-container border px-4 py-4 shadow-md rounded-md hover:border hover:border-gray-300">
        <div class="college-content py-3 flex flex-col items-center">
          <div class="college-image w-52 justify-center">
          <img src="{{ asset('/img/cbm_logo_new.png')}}" alt="CBM">
        </div>
        </div>
        <div class="college-content py-3">
          <h3 class="bg-white text-lg font-bold text-gray-700 py-2 text-center">Business and Management</h3>
          <p class="text-gray-600 college-description text-sm px-2 text-justify">&nbsp;&nbsp;&nbsp;&nbsp;Produce globally competitive, value-laden professionals/entrepreneurs who can create social, environmental, and economic impact through research and community services.</p>
        </div>
      </a>
      

      <a href="categories/{{$coed}}" class="bg-white college-container border px-4 py-4 shadow-md rounded-md hover:border hover:border-gray-300 ">
        <div class="college-content py-1 flex flex-col items-center">
          <div class="college-image w-52 justify-center">
          <img src="{{ asset('/img/COED-logo.png') }}" alt="COED">
        </div>
        </div> 
        <div class="college-content py-2">
          <h3 class="text-lg font-bold text-gray-700 py-2 text-center">Education</h3>
          <p class="text-gray-600 college-description text-sm text-justify px-2">The College of Education shall be the center for training, research and extension programs in Teacher Education for effective, morally, socially, culturally and environmentally-responsible Teacher Education leaders committed to pursuing academic excellence.</p>
        </div>
      </a>
      
      <a href="categories/{{$cet}}" class="bg-white college-container border px-4 py-4 shadow-md rounded-md hover:border hover:border-gray-300">
        <div class="college-content py-2 flex flex-col items-center">
          <div class="college-image w-52 justify-center">
          <img src="{{ asset('/img/CET-logo.png')}}"alt="CET">
        </div>
      </div> 
        <div class="college-content py-2">
          <h3 class="text-lg font-bold text-gray-700 py-2 text-center">Engineering and Technology</h3>
          <p class="text-gray-600 college-description text-sm text-justify">A center for Engineering and Industrial Technology Education aimed at producing globally competitive graduates equipped with high ethical standards of professionalism</p>
        </div>
      </a>
      </div>
    </div>
  </div>
</section>

<section class="md:mx-24 mx:none py-10">
  <div class="container mx-auto mx- px-4">
    <div class="grid grid-cols md:grid-cols-1 gap-6">
      <div class="mt-4 md:mt-0">

        <div class="text-xl flex space-x-4 border-b-4 border-navy-blue">
          <span class="py-2 text-gray-700 font-bold" data-content="recentTheses">Recent Theses</span>
        </div>

      
      @foreach ($theses as $thesis)
        <div class="bg-white rounded-md">
          <div class="my-2 py-3 border-b border-gray-300">
            <h3 class="text-md font-semibold text-gray-700">
              <a href='view/{{$thesis->id}}'>{{$thesis->title}}</a>
            </h3>
            <p class="text-gray-600 text-sm mt-1"><em>Author(s): 
              @foreach ($thesis->authors as $author )
              {{$author->author}}
                
              @endforeach| Year: {{$thesis->year->year}} | Course: Bachelor {{Str::title($thesis->course->course)}}</em></p>
          </div>
      @endforeach
      </div>   

    </div>
  </div>
</div>

<div class="container mx-auto px-4 mt-8">
  <div class="grid grid-cols md:grid-cols-1 gap-6">
    <div class="mt-4 md:mt-0">

      <div class="text-xl flex space-x-4 border-b-4 border-navy-blue">
        <span class="py-2 text-gray-700 font-bold" data-content="recentTheses">Recent Journal</span>
      </div>

    <div class="bg-white rounded-md">
      <div class="my-2 py-3 border-b border-gray-300">
          <h3 class="text-md font-semibold text-gray-700">
            <a href="view.html">Promoting Gender Equality in the Workplace: An Examination of Diversity and Inclusion Initiatives in Corporate Settings</a>
          </h3>
          <p class="text-gray-600 text-sm mt-1"><em>Author(s): Gina Claveria | Year: 2023 | Course: Bachelor of Science in Information Technology</em></p>
        </div>

      <div class="my-2 py-3 border-b border-gray-300">
          <h3 class="text-md font-semibold text-gray-700">
            <a href="view.html">Promoting Gender Equality in the Workplace: An Examination of Diversity and Inclusion Initiatives in Corporate Settings</a>
          </h3>
          <p class="text-gray-600 text-sm mt-1"><em>Author(s): Gina Claveria | Year: 2023 | Course: Bachelor of Science in Information Technology</em></p>
        </div>
        
    </div>   
  </div>
</div>
</div>
</section>






<footer class="bg-navy-blue shadow dark:bg-gray-900 mt-12">
  <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
      <div class="sm:flex sm:items-center sm:justify-between">
          <a href="#" class="flex items-center mb-4 sm:mb-0">
              <img src="/img/logo_footer.png" class="h-8 mr-3" alt="LITAW Logo" />
          </a>
          <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 text-white">
              <li>
                  <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
              </li>
              <li>
                  <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
              </li>
              <li>
                  <a href="#" class="mr-4 hover:underline md:mr-6 ">Terms and Conditions</a>
              </li>
              <li>
                  <a href="#" class="hover:underline">Contact</a>
              </li>
          </ul>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center text-white">© 2023 <a href="https://litaw.com/" class="hover:underline">LITAW</a>. All Rights Reserved.</span>
  </div>
</footer>












<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>

<!--navigation toggle and login modal-->
<script>
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

</body>
</html>