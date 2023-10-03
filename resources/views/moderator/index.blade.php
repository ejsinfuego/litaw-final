<x-nav-bar></x-nav-bar>
<x-section-title title="Pending Submissions" description="This is where the pending theses submissions would go into">
 
</x-section-title>
<div class="flex">
  <div class="md:w-1/4 lg:w-40 p-4 md:ml-4">

    <hr class="my-12 mb-2 border-gray-400">
  
      <div class="mt-4">
        
        <ul class="space-y-4 mt-2">
          <a href="#" class="text-gray-600 text-md hover:underline"><h2 class="text-sm font-semibold text-gray-600">Users Under Your College</h2></a>
        </ul>
        <ul class="space-y-4 mt-2">
          <a href="#" class="text-gray-600 text-md hover:underline"><h2 class="text-sm font-semibold text-gray-600">Pending Theses</h2></a>
        </ul>
        <ul class="space-y-4 mt-2">
          <a href="#" class="text-gray-600 text-md hover:underline"><h2 class="text-sm font-semibold text-gray-600">Data Overview</h2></a>
        </ul>
        <ul class="space-y-4 mt-2">
          <a href="#" class="text-gray-600 text-md hover:underline"><h2 class="text-sm font-semibold text-gray-600">Roles</h2></a>
        </ul>
      </div>
      
  
    </div>
<section class="py-8 w-max">
  <!-- Content for the left section -->
  <!-- ... Your content for the left section goes here ... -->
  <div class="w-max p-9 rounded-lg border border-gray-200 shadow-md">
  <table id="sortTable" class="w-full border-collapse bg-white text-left text-sm text-gray-500">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Authors</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Year</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Keywords</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
      <tr class="hover:bg-gray-50">
        @foreach ($theses as $thesis)
                  <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
          <div class="relative h-10 w-max">
       
          </div>
          <div class="text-sm w-56">
            <a href="/view/{{$thesis->id}}" class="font-medium text-gray-700">{{$thesis->title}}</a>
          </div>
        </td>
        <td class="px-6 py-4">
          <div class="w-max">
            @foreach ($thesis->authors as $author )
              {{$author->author}}
            @endforeach
          </div>
         
        </td>
        <td class="px-6 py-4">{{$thesis->year->year}}</td>
        <td class="px-6 py-4">
          <div class="flex gap-2">
            @foreach(explode(',', $thesis->metakeys) as $keys )
            <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">  {{$keys}} </span>
            @endforeach            
           
          </div>
        </td>
        <td class="px-6 py-4">
          <div class="flex justify-end gap-4">
          <form method="get" action="theses/approve/{{$thesis->id}}">
            <input name="id" type="hidden" value="{{$thesis->id}}"/>
            <button class="text-green-500">
              Approve
            </button>
          </form>
            <a x-data="{ tooltip: 'Edite' }" href="">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
              </svg>
            </a>
          </div>
        </td>
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