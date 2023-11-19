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
        <ul class="flex flex-nowrap justify-content-center mt-2">
          <div class="flex flex-nowrap mx-2">
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
  <div class="w-auto p-9 rounded-lg border border-gray-200 shadow-md">
  <table id="" class="table-auto border-spacing-x-2 bg-white text-left text-sm text-gray-500 pt-5 border-collapse border sortTable">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">College</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Course</th>
        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Status</th>
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
               <a class="font-medium text-gray-700">{{Str::title($user->first_name)}} {{Str::title($user->last_name)}}</a>
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
        <td class="px-6 py-4">
          @if($user->ban == null)
          <p class="text-green-500">No</p>
          @else
          <p class="text-red-500">Yes : {{$user->ban}}</p>
          @endif
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
        
        <td class="px-6 py-4">
        @if(empty($users))
        @else
        
          <div class="flex flex-wrap"  class="banField">
          {{-- @if($user->approved == 0)
          <div class="mr-5 flex justify-content-center gap-4">
          <form method="get" action="theses/approve/{{$thesis->id}}">
            <input name="id" type="hidden" value="{{$thesis->id}}"/> --}}
          </div>
          <div class="flex justify-end gap-4">
            @if($user->hasAnyRole('contentModerator', 'registeredUser'))
            <form method="POST" action="{{ route('moderator.ban', $user->id)}}" class="" id="loginForm">
              @csrf
              @method('PATCH')
            <input name="id" type="hidden" value="{{$user->id}}"/>
            <span class="inline-flex items-center gap-1 rounded-full bg-red-300 px-2 py-1 p text-xs font-semibold text-red-500">
            <a id="banUser" class="banUser" x-data="{ tooltip: 'Edited' }">
             BAN</i></span></a>
            </form>
            @else
            <span class="inline-flex items-center gap-1 rounded-full bg-green-300 px-2 py-1 p text-xs font-semibold text-green-500">  <a x-data="{ tooltip: 'Edite' }" href="{{route('moderator.unban', $user->id)}}">
              UNBAN</i> </span>
            @endif
          </div>         
          </div>
        @endif
      </td>
      </form>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
</section>
</div>


{{-- ban modal --}}
    
      {{-- <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal" onclick="banModal()">
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
      <form method="POST" action="{{ route('moderator.ban', $user->id)}}" class="bg-white border rounded-md shadow-md p-8" id="loginForm">
          @csrf
          @method('PATCH')
        <h3 class="mb-4 text-xl font-medium text-gray-900">Give reason why <i>{{$user->first_name}}</i> will be ban</h3>
        <x-validation-errors class="mb-4" />
          <div class="relative z-0 w-full mb-6 group top-4">
            <textarea name="reason" rid="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />


            </textarea>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">Submit</button>
          </form>
   --}}
{{-- end of ban modal --}}

<script>
  // function banModal(){
  //   const ban = document.getElementById('ban');
  //   ban.classList.toggle('hidden')
  // }

  $(document).ready(function(){
            $('.banUser').click(function(){
                //add only the textarea and submit button
                var reason = '<div id="banForm" class="bg-white"><textarea name="reason" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required /></textarea><button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">Submit</button></div>';

                //change the ban button to form below the banUser
                $(this).after(reason);
                //remove the ban button and the styles
                $(this).hide();
                
                
              
            });
            //if click outside the form it removes the form and bring back the ban button
            $(document).click(function(e) 
            {
                var container = $(".banUser");
                var form = $("#banForm");
                // if the target of the click isn't the container nor a descendant of the container
                if (!container.is(e.target) && container.has(e.target).length === 0 && !form.is(e.target) && form.has(e.target).length === 0)
                {
                    form.remove();
                    container.show();
                }
            });
        });
</script>


<x-footer></x-footer>