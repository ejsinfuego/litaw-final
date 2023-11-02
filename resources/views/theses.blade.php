@include('components.nav-bar', ['courses' => 'courses'])
<style>
  .speech-bubble {
  background: #ddd;
  color: #333;
	font-size: 8px;
  margin-bottom: 1em;
	padding: 0 1em;
	position: relative;
	text-align: left;
	vertical-align: top;
	min-width: 7em;
  z-index: 5;
}

.speech-bubble.rounded {
	border-radius: .4em;
}
</style>
<div id="default-carousel" class="relative w-full h-96" data-carousel="slide">
  <!-- Carousel wrapper -->
  <div class="relative h-56 overflow-hidden  md:h-96">
    <!-- Item 1 -->
    <div class="hidden duration-100 ease-in-out bg-cover bg-no-repeat" data-carousel-item style="background-image: url({{ asset('/img/cas.jpg') }});">
      <img src="{{ asset('/img/')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
    </div>
    <!-- Item 2 -->
    <div class="hidden duration-100 ease-in-out bg-cover bg-no-repeat" data-carousel-item style="background-image: url({{ asset('/img/cbm1.jpg') }});">
      {{-- <img class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."> --}}
    </div>

    <div class="hidden duration-100 ease-in-out bg-cover bg-no-repeat" data-carousel-item style="background-image: url({{ asset('/img/coed.jpg') }});">
      {{-- <img class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."> --}}
    </div>

    <div class="hidden duration-100 ease-in-out bg-cover bg-no-repeat" data-carousel-item style="background-image: url({{ asset('/img/cet.jpg') }});">
      {{-- <img class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."> --}}
    </div>

  </div>

  <!-- Slider indicators -->
  <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="2"></button>
    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="3"></button>
    
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
  <div class="container mx-auto md:px-20 px-0">
    <div class="flex flex-col justify-center md:flex-row md:items-center mt-12">
      <div class="relative">
        <form method="GET" action="search/{title}">
        <select name="college" id="default" class="w-full md:w-48 py-2.5 px-2 text-sm font-medium text-gray-900  block w-40 p-2.5 border border-gray-300 md:rounded-l-md border border-gray-300 focus:ring-gray-500 focus:border-gray-500 placeholder-gray-500">
          <option class="focus:bg-gray-50 placeholder-gray-500" selected>All colleges</option>
          <option class="" value="arts and sciences">Arts and Science</option>
          <option class="" value="business and management">Business and Management</option>
          <option class="" value="education">Education</option>
          <option class="" value="engineering">Engineering and Technology</option>
        </select>
      </div>
      <div class="relative w-full mt-3 md:mt-0 md:w-auto">
       
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

  <div class="container mx-auto mx- px-4">
    <div class="grid grid-cols md:grid-cols-1 gap-6">
      <div class="mt-4 md:mt-0">

        <div class="text-xl flex space-x-4 border-b-4 border-navy-blue">
          <span class="py-2 text-gray-700 font-bold" data-content="recentTheses">Most Viewed Theses</span>
        </div>
       
        <div class="bg-white rounded-md flex flex-column z-10">
          @foreach ($highest_views as $views)
          <div class="my-2 py-3 border-b border-gray-300 flex flex-column">
          
            @php
              $thesis = App\Models\Theses::where('id', $views->theses_id)->get()->first();
              $view = DB::table('viewed_theses')->where('theses_id', $views->theses_id)->get()->count();
            @endphp
            <div class="flex justify-center">
            <div onmouseover="popup()" onmouseout="hidePopup()" class="px-2">
            <img data-pdf-thumbnail-file="/storage/{{$thesis->filename}}" data-pdf-thumbnail-height="300" class="shadow-lg">
            </div>
            <div>
            <h3 class="text-md font-semibold text-gray-700">
              <a href='view/{{$thesis->id}}'>{{Str::title($thesis->title)}}</a>  
            </h3>
            <p class="text-gray-600 text-sm mt-1">Views: {{$view}}</p>
            <p class="text-gray-600 text-sm mt-1"><em>Author(s): 
                @foreach ($thesis->authors as $author )
                {{$author->author}}
                  
                @endforeach</p>
                <p class="text-gray-600 text-sm mt-1">Year: {{$thesis->year->year}} </p>  
                <p class="text-gray-600 text-sm mt-1">
              Course: {{Str::title($thesis->course->course)}}</em></p>                
              <p class="text-gray-600 text-sm mt-1"> College: {{$thesis->college->college}} </p> 
                </div>
          </div>
            
          </div>
      
          @endforeach
          
        </div>   
      
      </div>
    </div>
  </div>
        

<section class="md:mx-24 mx:none py-10">
  <div class="container mx-auto mx- px-4">
    <div class="grid grid-cols md:grid-cols-1 gap-6">
      <div class="mt-4 md:mt-0">

        <div class="text-xl flex space-x-4 border-b-4 border-navy-blue">
          <span class="py-2 text-gray-700 font-bold" data-content="recentTheses">Recent Theses</span>
        </div>

        

      
      @foreach ($recent_theses as $thesis)
      {{-- pop over when hover --}}
     <div class="absolute">
            <div id="myPopup" class="myPopup speech-bubble rounded z-2000 w-1/4" hidden>
                <p>{{$thesis->abstract}}</p>
            </div>
            </div>
        <div class="bg-white rounded-md flex flex-column z-10">
          <div class="my-2 py-3 border-b border-gray-300 flex flex-column">
            
          <div class="flex justify-center">
            <div onmouseover="popup()" onmouseout="hidePopup()" class="px-2">
            <img data-pdf-thumbnail-file="/storage/{{$thesis->filename}}" data-pdf-thumbnail-height="300" class="shadow-lg">
            </div>
            
            <div>
            <h3 class="text-md font-semibold text-gray-700">
              <a href='view/{{$thesis->id}}'>{{Str::title($thesis->title)}}</a>  
            </h3>
            <p class="text-gray-600 text-sm mt-1"><em>Author(s): 
                @foreach ($thesis->authors as $author )
                {{$author->author}}
                  
                @endforeach</p>
                <p class="text-gray-600 text-sm mt-1">Year: {{$thesis->year->year}} </p>  
                <p class="text-gray-600 text-sm mt-1">
              Course: {{Str::title($thesis->course->course)}}</em></p>                
              <p class="text-gray-600 text-sm mt-1"> College: {{$thesis->college->college}} </p> 
                </div>
          </div>
            
          </div>
        

      @endforeach
        </div>   
      
    </div>
  </div>
</div>

{{-- <div class="container mx-auto px-4 mt-8">
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
</div> --}}
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