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
<div id="default-carousel" class="relative w-full h-auto md:h-96" data-carousel="slide">
  <!-- Carousel wrapper -->
  <div class="relative h-56 overflow-hidden  md:h-96">
    <!-- Item 1 -->
    <div class="hidden duration-100 ease-in-out bg-cover bg-no-repeat" data-carousel-item style="background-image: url({{ asset('img/cas.jpg') }});">
      <img src="{{ asset('img/cas.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
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
  <div class="container mx-auto md:px-20 px-10">
    <div class="flex flex-col justify-center md:flex-row md:items-center mt-12">
      <div class="relative">
        <select id="default" class="w-full md:w-48 py-2.5 px-2 text-sm font-medium text-gray-900  block w-40 p-2.5 border border-gray-300 md:rounded-l-md border border-gray-300 focus:ring-gray-500 focus:border-gray-500 placeholder-gray-500">
          <option class="focus:bg-gray-50 placeholder-gray-500" selected>All colleges</option>
          <option class="" value="US">Arts and Science</option>
          <option class="" value="CA">Business and Management</option>
          <option class="" value="FR">Education</option>
          <option class="" value="DE">Engineering and Technology</option>
        </select>
      </div>
      
      <div class="relative mt-3 md:mt-0 md:w-auto">
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
</main>

<section class="py-8 md:text-base text-xs">

  <div class="container mx-auto px-4 md:px-0">
    <h2 class="text-4xl font-bold mb-4 text-center text-gray-700">COLLEGES</h2>
    
    <p class="text-center text-gray-600">Select colleges to browse thesis and academic works</p>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-8 md:px-20 px-0">
      <a href="categories/{{$cas->id}}" class="bg-white college-container border px- py-4 shadow-md rounded-md hover:border hover:border-gray-300">
        <div class="college-content pt-8 flex flex-col items-center">
          <div class="college-image justify-center px-5">
            <img src="{{ asset('/img/CAS-logo.png') }}" alt="CAS" class="px-4">
          </div>
        </div>
          <div class="college-content py-3">
            <h3 class="text-lg font-bold text-gray-700 py-2 text-center">
          Arts and Science</h3>
          <p class="text-gray-600 college-description text-sm px-4 text-justify text-wrap">&nbsp;&nbsp;Produce globally competitive graduates equipped with high ethical standard of professionalism in the field of Arts and Sciences.</p> <!-- Added py-2 class for padding -->
        </div>
      </a>
      

      <a href="categories/{{$cbm->id}}" class="bg-white college-container border px-4 py-4 shadow-md rounded-md hover:border hover:border-gray-300">
        <div class="college-content py-3 flex flex-col items-center">
          <div class="college-image justify-center">
          <img src="{{ asset('/img/cbm_logo_new.png')}}" alt="CBM">
        </div>
        </div>
        <div class="college-content py-3">
          <h3 class="bg-white font-bold text-gray-700 py-2 text-center">Business and Management</h3>
          <p class="text-sm text-gray-600 college-description px-2 text-justify text-wrap">&nbsp;&nbsp;Produce globally competitive, value-laden professionals or entrepreneurs who can create social, environmental, and economic impact through research and community services.</p>
        </div>
      </a>
      

      <a href="categories/{{$coed->id}}" class="bg-white college-container border px-4 py-4 shadow-md rounded-md hover:border hover:border-gray-300 ">
        <div class="college-content py-1 flex flex-col items-center">
          <div class="college-image justify-center">
          <img src="{{ asset('/img/COED-logo.png') }}" alt="COED">
        </div>
        </div> 
        <div class="college-content py-2">
          <h3 class="text-base font-bold text-gray-700 py-2 text-center">Education</h3>
          <p class="text-gray-600 college-description text-sm text-justify px-2">&nbsp;&nbsp;The College of Education shall be the center for training, research and extension programs in Teacher Education for effective, morally, socially, culturally and environmentally-responsible Teacher Education leaders committed to pursuing academic excellence.</p>
        </div>
      </a>
      
      <a href="categories/{{$cet->id}}" class="bg-white college-container border px-4 py-4 shadow-md rounded-md hover:border hover:border-gray-300">
        <div class="college-content py-2 flex flex-col items-center">
          <div class="college-image justify-center">
          <img src="{{ asset('/img/CET-logo.png')}}"alt="CET" class="px-3">
        </div>
      </div> 
        <div class="college-content py-2">
          <h3 class="text-lg font-bold text-gray-700 py-2 text-center">Engineering and Technology</h3>
          <p class="text-gray-600 college-description text-sm text-justify">&nbsp;&nbsp;A center for Engineering and Industrial Technology Education aimed at producing globally competitive graduates equipped with high ethical standards of professionalism</p>
        </div>
      </a>
      </div>
    </div>
</section>

 <div class="container flex flex-col mx-auto px-4 md:px-0 bg-white college-container border py-4 shadow-md rounded-md hover:border hover:border-gray-300">
<div class="col-lg-2 h-auto md:w-1/2 mx-auto w-auto px-4 md:px-0 mb-5">
  <canvas class="" id="myChart"></canvas>
</div>
<div class="col flex justify-center mt-5">
<button onclick="perYear()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mx-2">
  Change Category per Year
</button>

<button onclick="perCollege()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mx-2">
  Change Category per College
</button>
<button onclick="perCourse()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md mx-2">
  Change Category per Course
</button>
</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    
    
  function popup(){
    let popup = document.getElementByClass('myPopup');
    popup.removeAttribute('hidden');
  }

  function hidePopup(){
    let popup = document.classList('myPopup');
    popup.setAttribute('hidden', true);
  }

  const ctx = document.getElementById('myChart');
  const colleges = @json($colleges);

  const counts = @json($counts);


  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: colleges, // Our labels
      datasets: [{
        label: 'Number of Theses We Have',
        data: counts,
        backgroundColor: [
          'rgb(255, 99, 100)',
          'rgb(23,114,69)',
          'rgb(255, 205, 86)',
          'rgb(54, 162, 235)'
          ],
          hoverOffset: 10
      }]
    },
    options : {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'left',
          labels: {
            font: {
              weight: 500
            },
            padding: 5,
           
          }, 
          fullSize: true,
          padding: 5,
        },
        title : {
          font:{
             size: 20,
             padding: 20,
          },
          display: true,
          text: 'Visual Statistics of Theses'
        },
      subtitle : {
        display: true,
        text: 'Click the legend to hide or show the data. Hover on the chart to see the exact number of theses per category.'
      }
      },
        
      interaction: {
        mode: 'point',
      },
      
    }
  });

  //show pop when hover
  function perYear(){
      const years_count = @json($years_count);
      const years = @json($years);
    

      //update the chart
      var newData = {
        labels: years, // Our labels
        datasets: [{
          label: 'Number of Theses We Have',
          data: years_count,
          backgroundColor: [
            'rgb(255, 99, 100)',
            'rgb(23,114,69)',
            'rgb(255, 205, 86)',
            'rgb(54, 162, 235)'
            ],
            hoverOffset: 10
        }]
      };

      myChart.data = newData;
      myChart.update();
    }

    function perCollege(){
      const colleges = @json($colleges);

      const counts = @json($counts);
  
      const college = [];

      //update the chart
      var newData = {
        labels: colleges, // Our labels
        datasets: [{
          label: 'Number of Theses We Have',
          data: counts,
          backgroundColor: [
            'rgb(255, 99, 100)',
            'rgb(23,114,69)',
            'rgb(255, 205, 86)',
            'rgb(54, 162, 235)'
            ],
            hoverOffset: 10
        }]
      };

      myChart.data = newData;
      myChart.update();
    }

    function perCourse(){
      const courses = @json($courses);

      const course_counts = @json($course_count);
      console.log(courses);

      //update the chart
      var newData = {
        labels: courses, // Our labels
        datasets: [{
          label: 'Number of Theses We Have',
          data: course_counts,
          backgroundColor: [
          'rgb(255, 87, 51)',
          'rgb(71, 209, 71)',
          'rgb(255, 215, 0)',
          'rgb(255, 105, 180)',
          'rgb(0, 191, 255)',
          'rgb(255, 165, 0)',
          'rgb(255, 0, 0)',
          'rgb(0, 0, 255)',
          'rgb(255, 0, 255)',
          'rgb(0, 255, 255)',
          'rgb(0, 128, 0)',
          'rgb(128, 0, 128)',
          'rgb(128, 0, 0)',
          'rgb(128, 128, 0)',
          'rgb(0, 128, 128)',
          'rgb(0, 0, 128)',
          'rgb(128, 128, 128)',
          'rgb(192, 192, 192)',
          'rgb(255, 255, 255)',
          'rgb(0, 0, 0)',
          'rgb(255, 99, 100)',
          'rgb(23,114,69)',
          'rgb(255, 205, 86)',
          'rgb(54, 162, 235)'
          
            ],
            hoverOffset: 10
        }]
      };

      myChart.data = newData;
      myChart.update();
    }
</script>

  <div class="container md:mx-auto px-4">
    <div class="grid grid-cols md:grid-cols-1 gap-6">
      <div class="mt-4 md:mt-0">

        <div class="text-xl flex space-x-4 border-b-4 border-navy-blue">
          <span class="py-2 text-gray-700 font-bold" data-content="recentTheses">Most Viewed Theses</span>
        </div>
       
        <div class="bg-white rounded-md md:flex md:flex-column z-10">
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




<x-footer></x-footer>