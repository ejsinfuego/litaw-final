<x-nav-bar></x-nav-bar>
<div class="flex items-center justify-between md:ml-24 ml-6 mt-12">
<h1 class="inline text-3xl font-semibold text-gray-700">Browse Resources from <strong>
    {{$taon->year}}
</strong></h1>
</div>

<div class="flex flex-col md:flex-row items-center justify-between ml-4 mr-4 mt-4 md:ml-24 lg:mr-24">
  <div class="flex md:flex-row  md:space-y-0 md:space-x-4 space-x-2">
    <div>
      <select class="input input-select border-gray-400 rounded-md focus:ring-0 focus:border-gray-600 border py-1 px-4">
        <option value="relevance">Sort by: Relevance</option>
        <option value="title">Recent</option>
        <option value="title">Oldest</option>
        <option value="title">Most Viewed</option>
        <option value="title">Most Cited</option>
        <option value="author">Title A-Z</option>
        <option value="year">Title Z-A</option>
    </select>
    </div>

    <div>
      <select class="input input-select border-gray-400 rounded-md focus:ring-0 focus:border-gray-600 border py-1 px-4">
        <option value="relevance">Show 10 per page</option>
        <option value="title">Show 10 per page</option>
        <option value="title">Show 25 per page</option>
        <option value="title">Show 50 per page</option>
        <option value="title">Show 75 per page</option>
        <option value="title">Show 100 per page</option>
    </select>
    </div>
  </div>

  <div class="search-bar-container py-4 mt-4 md:mt-0 flex">
    <form method="GET" action="\search/{title}">
    <div class="flex">
      
      <input type="text" name="searchTitle" class="search-bar px-4 w-96 rounded-l-md border-gray-400 focus:ring-0 focus:border-gray-600 border py-1 px-4" placeholder="Search">
      <button type="button" class="bg-navy-blue border border-navy-blue text-white px-2 py-2 rounded-r-md">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
            </svg>
      </button>
    </div>
  </div>
</form>
</div>

<hr class="md:mx-24 mx-6 border-2 border-navy-blue">

<div class="md:px-24 mt-4 grid grid-cols-1 md:grid-cols-12 gap-8">
<div class="lg:col-span-9  md:p-0 px-6">
  <div class="bg-white">
    <ul class="space-y-4">
      @if($theses->isNotEmpty())
        @foreach ($theses as $thesis)
        <li class="py-2 border-b border-gray-400">
        <a href='../view/{{$thesis->id}}' class="text-gray-600 font-medium text-md">{{ $thesis->title}}</a>
        <p class="text-gray-600 text-sm mt-1"><em>Author(s): 
        @foreach ($thesis->authors as $author )
        {{$author->author}}
        @endforeach | Year: {{$thesis->year->year}} | Course: {{Str::title($thesis->course->course)}}</em></p>
      </li>
        @endforeach
     @endif
    </ul>
  </div>

  {{-- <div class="join col-span-12 py-1 flex justify-center mt-4">
    <ul class="flex justify-center md:justify-start text-sm mt-2 md:mt-0">
      <li>
        <a href="#" class="flex items-center justify-center px-2 md:px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300  hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
      </li>
      <li>
        <a href="#" class="flex items-center justify-center px-2 md:px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
      </li>
      <li>
        <a href="#" class="flex items-center justify-center px-2 md:px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
      </li>
      <li>
        <a href="#" aria-current="page" class="flex items-center justify-center px-2 md:px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
      </li>
      <li>
        <a href="#" class="flex items-center justify-center px-2 md:px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
      </li>
      <li>
        <a href="#" class="flex items-center justify-center px-2 md:px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
      </li>
      <li>
        <a href="#" class="flex items-center justify-center px-2 md:px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
      </li>
    </ul>
  </div> --}}
</div>

<div class="lg:col-span-3 bg-gray-100 md:border p-4">
  <div>
    <h2 class="text-lg font-semibold text-gray-600 mb-2">Year</h2>
    <hr class="border-gray-300">
    <ul class="space-y-4 mt-2">
    @if($years->isNotEmpty())
    @foreach ($years as $year)
      <li>
      <a href='{{route('years', [$key ,'year='.$year->id])}}' class="text-gray-600 text-md hover:underline">{{$year->year}}</a>
    </li>
    @endforeach
    </ul>  
    @endif
    <h2 class="text-lg font-semibold text-gray-600 mt-4 mb-2">Courses</h2>
    <hr class="border-gray-300"> 
    <ul class="space-y-4 mt-2">
      @foreach ($courses as $course)
      <li>
        <a href="\course/{{$course->id}}" class="text-gray-600 text-md hover:underline">{{Str::title($course->course)}}</a>
      </li>
      @endforeach
    </ul>


    <h2 class="text-lg font-semibold text-gray-600 mt-4 mb-2">Author</h2>
    
  </div>
</div>
</div>
</div>
</div>


<x-footer></x-footer>