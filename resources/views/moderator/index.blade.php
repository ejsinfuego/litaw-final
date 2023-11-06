<x-nav-bar></x-nav-bar>
<div class="flex flex-wrap justify-center text-center">
  <x-section-title title="Theses Submissions" description="This is where the pending theses submissions would go into"></x-section-title>
</div>

 

<div class="flex m-10">
  <div class="md:w-1/4 lg:w-56 p-4 md:ml-4">

    <hr class="my-12 mb-2 border-gray-400">
      <div class="mt-4">
        <ul class="flex flex-wrap justify-content-center mt-2">
          <div class="flex mx-2 pl-1">
            <i class="fa fa-address-book mb-1 text-xl text-gray-500" aria-hidden="true"></i>
          </div>
          <div class="flex">
            <a href="{{ route('moderator.index') }}" class="text-gray-600 text-md hover:underline"><h2 class="text-sm font-semibold text-gray-600 align-items-center mt-1">Theses</h2></a>
          </div>
          
        </ul>
          <ul class="flex flex-wrap justify-content-center mt-2">
            <div class="flex mx-2">
             <i class="fa fa-pie-chart text-gray-500 text-xl" aria-hidden="true"></i>
            </div>
            <div class="flex">
              <a href="{{ route('moderator.stats') }}" class="text-gray-600 text-md hover:underline"><h2 class="text-sm font-semibold text-gray-600 align-items-center mt-1">Data Overview</h2></a>
            </div>  
        </ul>
          <ul class="flex flex-wrap justify-content-center mt-2">
            <div class="flex mx-2">
             <i class="fa fa-user-circle text-xl text-gray-500" aria-hidden="true"></i>
            </div>
            <div class="flex">
              <a href="{{ route('moderator.users') }}" class="text-gray-600 text-md hover:underline"><h2 class="text-sm font-semibold text-gray-600 align-items-center mt-1">User</h2></a>
            </div>  
        </ul>
      </div>
      
  
    </div>
<section class="py-8 w-auto">
  <!-- Content for the left section -->
  <!-- ... Your content for the left section goes here ... -->
  <div class="w-auto p-9 rounded-lg border border-gray-200 shadow-md">
  <table id="sortTable" class="w-full border-separate bg-white text-left text-sm text-gray-500 pt-5">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Authors</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Year</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Submitted by</th>
        @if (empty($theses))
        @else
         <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
        @endif
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
      @foreach ($theses as $thesis)
      <tr class="hover:bg-gray-50">
         <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
          <div class="relative h-10 w-auto">
          </div>
          <div class="text-sm">
            <a href="/view/{{$thesis->id}}" class="font-medium text-gray-700">{{Str::title($thesis->title)}}</a>
          </div>
        </td>
        <td class="px-6 py-4">
          <div class="w-max">
            @foreach ($thesis->authors as $author )
            <p>
              • {{$author->author}}
            </p>
             
            @endforeach
          </div>
         
        </td>
        <td class="px-6 py-4">{{$thesis->year->year}}</td>
        <td class="px-6 py-4 w-8">
          {{-- status --}}
          @if ($thesis->approved == 0)
            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-blue-600 rounded-full">Pending</span>
          @else
            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-green-100 bg-green-600 rounded-full">Approved</span>
          @endif

          {{-- <div class="flex gap-2">
            @foreach(explode(',', $thesis->metakeys) as $keys )
            <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">  {{$keys}} </span>
            @endforeach            
          </div> --}}
        </td>
        <td class="px-6 py-4">{{$thesis->user->first_name}} {{$thesis->user->last_name}}</td>
        @if(empty($thesis))
        @else
        <td class="px-6 py-4 flex">
          <div class="flex flex-auto">
          @if($thesis->approved == 0)
          <div class="mr-5 flex justify-content-center gap-4">
          <form method="get" action="{{route('moderator.approve', $thesis->id)}}">
            <input name="id" type="hidden" value="{{$thesis->id}}"/>
            <span class="inline-flex items-center gap-1 bg-green-100 px-3 py-3 text-xs font-semibold text-blue-600"><button class="btn btn-primary text-green-500 font-bold">
              Approve
            </button></span>
          </div>
          @endif
          <div class="flex justify-end gap-4">
            <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 p text-xs font-semibold text-blue-600">  <a x-data="{ tooltip: 'Edite' }" href="{{route('theses.destroy', ['thesis' => $thesis->id])}}">
             <i class="fa fa-trash" aria-hidden="true"></i> </span>
            
            </a>
          </div>
          
          </form>
          </div>

        </td>
        @endif
      </tr>
        @endforeach
    </tbody>
  </table>
</div>
</section>
</div>



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

  $(document).ready(function() {
    $('#sortTable').DataTable( {
        "paging":   true,
        "ordering": false,
        "info":     false
    });
} );
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