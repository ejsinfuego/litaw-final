<x-nav-bar></x-nav-bar>
<div class="flex flex-wrap justify-center">
<x-section-title title="User Management" description="Check users of your platform">
 
</x-section-title></div>

<div class="flex m-10">
  <div class="md:w/4 lg:flex-block p-4 md:ml-4">

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
<section class="py-8 w-max">
  <!-- Content for the left section -->
  <!-- ... Your content for the left section goes here ... -->
  <div class="w-max p-9 rounded-lg border border-gray-200 shadow-md">
  <table id="sortTable" class="w-full border-separate bg-white text-left text-sm text-gray-500 pt-5">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">College</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Course</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th>
        @if (empty($users))
        @else
         <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
        @endif
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
      @foreach ($users as $user)
      <tr class="hover:bg-gray-50">
         <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
          <div class="relative h-10 w-max">
          </div>
          <div class="px-6 py-4 w-auto">
            <p>
               <a href="/view/{{$user->id}}" class="font-medium text-gray-700">{{Str::title($user->first_name)}} {{Str::title($user->last_name)}}</a>
            </p>
           
          </div>
        </td>
        <td class="px-6 py-4">
          <div class="w-max">
            <p>
              {{$user->email}}
            </p>
          </div>
         
        </td>
        <td class="px-6 py-4">{{$user->college}}</td>
        <td class="px-6 py-4">
          {{-- status --}}
          {{$user->course}}

          {{-- <div class="flex gap-2">
            @foreach(explode(',', $thesis->metakeys) as $keys )
            <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">  {{$keys}} </span>
            @endforeach            
          </div> --}}
        </td>
        <td class="px-6 py-4">@if ($user->role=='admin')
          Admin
          @elseif ($user->role == 'contentModerator')
          Content Moderator
          @elseif($user->role == 'registeredUser')
          Student
          @else
          Guest
        @endif</td>
        @if(empty($users))
        @else
        <td class="px-6 py-4">
          <div class="flex flex-wrap">
          {{-- @if($user->approved == 0)
          <div class="mr-5 flex justify-content-center gap-4">
          <form method="get" action="theses/approve/{{$thesis->id}}">
            <input name="id" type="hidden" value="{{$thesis->id}}"/> --}}
          </div>
          <div class="flex justify-end gap-4">
            @if($user->hasAnyRole('contentModerator', 'registeredUser'))
            <span class="inline-flex items-center gap-1 rounded-full bg-red-300 px-2 py-1 p text-xs font-semibold text-red-500">  <a x-data="{ tooltip: 'Edite' }" href="{{route('moderator.ban', $user->id)}}">
             BAN</i> </span>
            </a>
            @else
            <span class="inline-flex items-center gap-1 rounded-full bg-green-300 px-2 py-1 p text-xs font-semibold text-green-500">  <a x-data="{ tooltip: 'Edite' }" href="{{route('moderator.unban', $user->id)}}">
              UNBAN</i> </span>
            @endif
          </div>         
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