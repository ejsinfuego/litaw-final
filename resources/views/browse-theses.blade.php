

<x-nav-bar></x-nav-bar>

  
<div class="flex items-center justify-between md:ml-24 ml-6 mt-12">
<h1 class="inline text-3xl font-semibold text-gray-700">Search "<strong>{{$search}}</strong>"
  @if(request()->route()->getName() == 'search' and $college != null)
  on
  {{$college->college}}
  @endif
  @if(request()->route()->getName() == 'years' and $taon != null)
  on {{$taon->year}}
  @php
    $year_id = $taon->id;
  @endphp
  @else
  @php
  $year_id = '';
  @endphp
  @endif
</h1>
</div>

<div class="flex flex-col md:flex-row items-center justify-between ml-4 mr-4 mt-4 md:ml-24 lg:mr-24">
  <div class="flex md:flex-row  md:space-y-0 md:space-x-4 space-x-2">


    <!-- component -->
<style>
  .dropdown:hover > .dropdown-content {
    display: block;
  }
  </style>
  
  <div class="dropdown inline-block relative">
    <button class="bg-gray-100 border border-gray-300 text-gray-700 font-semibold py-1 px-4 rounded inline-flex items-center">
      <span>Sort by: </span>
    </button>
    <ul class="dropdown-content border bg-gray-200 border-gray-300 rounded-lg absolute hidden text-gray-700 pt-1">
          <li class="dropdown">
            <a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Year
            <i class="ml-2 fa fa-arrow-right"></i>

            </a>
              <ul class="dropdown-content absolute hidden text-gray-700 pl-5 ml-14 -mt-10 rounded-lg">
                <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('years', ["cat=year","search=".$search, "ascOrDesc=asc", "year=".$year_id])}}">Ascending</a>
                  <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('years', ["cat=year", "search=".$search, "ascOrDesc=desc", "year=".$year_id])}}">Descending</a>
              </ul>
          </li>
      <li class="dropdown">
        <a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Title
          <i class="ml-2 fa fa-arrow-right"></i>

        </a>
        
          <ul class="dropdown-content absolute hidden text-gray-700 pl-5 ml-14 -mt-10 rounded-lg">
            <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('years', ["search=".$search,"cat=title", "ascOrDesc=asc", 'year='.$year_id])}}">Ascending</a>
              <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('years', ["search=".$search,"cat=title", "ascOrDesc=desc", "year=".$year_id])}}">Descending</a>
          </ul>
      </li>
    </ul>
  </div>


      
    
  </div>

  <div class="search-bar-container py-4 mt-4 md:mt-0 flex">
    <form method="GET" action="{{ route('search')}}">
    <div class="flex">
      
      <input type="text" name="searchTitle" class="search-bar px-4 w-96 rounded-l-md border-gray-400 focus:ring-0 focus:border-gray-600 border py-1 px-4" placeholder="Search">
      <button type="submit" class="bg-navy-blue border border-navy-blue text-white px-2 py-2 rounded-r-md">
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
        <div class="thesis-container">
        <li class="py-2 border-b border-gray-400 thesis">
        <a href='../view/{{$thesis->id}}' class="text-gray-600 font-medium text-md title">{{ $thesis->title}}</a>
        <br>
        <p class="text-gray-600 text-sm mt-1 inline"><em>Author(s): 
        @foreach ($thesis->authors as $author )
        {{$author->author}}
        @endforeach | Year: </em></p>
        <p class="text-gray-600 text-sm mt-1 inline year"><em>
        {{$thesis->year}}
        </em></p>
        <p class="text-gray-600 text-sm mt-1 inline"><em>
         | Course: {{Str::title($thesis->course)}}
        </em></p>
      </li>
      </div>
        @endforeach
     @else
     <li class="py-2 border-b border-gray-400 thesis">
      <a class="text-gray-600 font-medium text-md title">Sorry, it seems like we don't have resource for that yet.</a>
    </li>
     @endif
    </ul>
  </div>

</div>

<div class="lg:col-span-3 bg-gray-100 md:border p-4">
  <div>
    <h2 class="text-base font-semibold text-gray-600 mb-2">Filter</h2>
    <hr class="border-gray-300">
    <ul class="space-y-4 mt-2">
    @if($years->isNotEmpty())
    @foreach ($years as $year)
      <li>
      <a href="{{route('years', ['search='.$search ,'year='.$year->id]) }}" class="text-gray-600 text-md hover:underline">{{$year->year}}</a>
    </li>
    @endforeach
    </ul>  
    @endif
    <h2 class="text-base font-semibold text-gray-600 mt-4 mb-2">Check programs that has highest contributions</h2>
    <hr class="border-gray-300"> 
    <ul class="space-y-4 mt-2 text-base">
      @foreach ($courses as $course)
      <li>
        <a href="\course/{{$course->id}}" class="text-gray-600 text-base hover:underline">{{Str::title($course->course)}}</a>
      </li>
      @endforeach
    </ul>

    
  </div>
</div>
</div>
</div>
</div>


<x-footer></x-footer>