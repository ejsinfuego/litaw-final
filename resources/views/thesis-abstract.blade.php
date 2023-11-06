<x-nav-bar></x-nav-bar>
            <div class="container mx-auto mt-2">
              <div class="md:flex mx-4 md:mx-10">
                <div class="md:w-3/4 bg-white rounded-lg py-2 mr-4 mb-4 md:mb-0 mt-10">
                    <h1 class="text-2xl font-semibold text-gray-700">{{ $theses->title }} </h1>

                    <hr class="my-7 border-gray-400">
                    @hasrole('contentModerator')
                      <p class="py-1">Status
                        @if($theses->approved == 0)
                        <span class="text-red-500">Pending</span>
                        @else
                        <span class="text-green-500">Approved</span> 
                        @endif
                        </p>
                    @endhasrole
                    <p class="text-gray-600 text-md mt-0 mb-4">Author(s): @foreach ($theses->authors as $author )
                    <strong>{{$author->author}}</strong> |    
                    @endforeach</p>
                    <p class="text-gray-400 text-sm mb-4">Year Published: {{$theses->year->year}}</p>
                    <p class="text-gray-400 text-sm mb-4">Date Upload: {{date('M d, Y',strtotime($theses->created_at))}}</p>
                    <h2 class="text-lg font-semibold text-gray-600 mb-1">Abstract</h2>
                    <p class="text-gray-600 text-md p-2 text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$theses->abstract}}</p>
                    <p class="text-gray-600 text-md italic p-2">Keywords: {{$theses->metakeys}}</p>
                    <div class="border">
                      <img data-pdf-thumbnail-file="/storage/{{$theses->filename}}">
                    </div>
                      <div class="flex items-center justify-end mt-8">
                        @guest
                        <button class="bg-blue-600 font-semibold text-white px-4 py-2 rounded mr-2"><a target="_blank" onclick="toggleLoginModal()" class="text-white-700 mr-4">Full Text PDF</a></button>
                        @else
                          <button class="bg-blue-600 font-semibold text-white px-4 py-2 rounded mr-2"><a href="/storage/{{$theses->filename}}" target="_blank" class="text-white-700 mr-4">Full Text PDF</a></button>
                        @endguest
                        @hasrole('contentModerator')
                        <button class="bg-blue-600 font-semibold text-white px-4 py-2 rounded mr-2"><a href="{{route('theses.edit', $theses->id)}}"class="text-white-700">Edit</a></button>
                        @endhasrole
                        @guest
                            <button class="bg-transparent hover:bg-red-500 text-red-500 font-semibold hover:text-white px-4 py-2 border border-red-500 hover:border-transparent rounded" onclick="toggleLoginModal()">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 inline-block mr-2">
                                <path d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z" />
                              </svg> 
                              Like
                            </button>
                          @else
                          @hasanyrole('registeredUser')
                          <a href="{{ route('theses.like', $theses->id) }}" class="bg-transparent hover:bg-red-500 text-red-500 font-semibold hover:text-white px-4 py-2 border border-red-500 hover:border-transparent rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 inline-block mr-2">
                              <path d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z" />
                            </svg>
                            @foreach ($likes as $like)
                              @if($like->theses_id != $theses->id and $like->user_id != Auth::user()->id)
                              Like
                              @else
                              Unlike
                              @endif
                            @endforeach 
                          </a>
                          @endhasanyrole
                        @endguest
                      </div>
                     

                    <hr class="my-4 border-gray-400">
                    <div class="mt-6">
                      <h2 class="text-xl font-semibold text-gray-600">Comments</h2>
                      <div class="mt-4">
                      @if($comments->count() > 0)
                      @foreach ($comments as $comment)
                      <div class="border p-4 rounded mb-2 text-gray-600">
                          <strong>{{$comment->user->first_name}} {{$comment->user->last_name}}</strong>
                          <p class="text-gray-600 text-sm">{{$comment->comment}}</p>
                      </div>
                      @endforeach
                      @else
                      <div class="border p-4 rounded mb-2 text-gray-600">
                          <strong>No comments yet.</strong>
                      </div>
                      @endif
                    
                      </div>
                      
                      <div class="mt-6">
                        <h3 class="text-lg font-semibold text-md text-gray-600">Leave a Comment</h3>
                        <form method="POST" class="mt-4" id="commentForm" action="{{ route('theses.comment', $theses->id) }}">
                          @csrf
                          @method('PATCH')
                          <div class="mb-4"> 
                            @hasrole('registeredUser')
                            <label for="comment" class="block text-md text-gray-600 font-semibold">Comment:</label>
                            <input type="hidden" name="thesis_id" value="{{$theses->id}}">
                           
                            <div class="relative">
                              <textarea id="comment" name="comment" rows="4" class="textarea input-bordered border focus:ring-0 focus:border-gray-600 border-gray-400 px-4 py-2 pr-12 mt-2 w-full" placeholder="Type your comment here..."></textarea>
                              
                              @auth
                                 <button type="submit" class="absolute right-2 bottom-2 bg-transparent text-gray-600 px-3 py-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                  <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                                </svg>
                              </button>
                              @endauth 
                              
                              <a href="#" onclick="toggleLoginModal()" class="absolute right-2 bottom-2 bg-transparent text-gray-600 px-3 py-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                  <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                                </svg>
                              </a>
                            </div>
                            @else
                            <div class="div">
                              <div class="p">
                                You are not allowed to comment
                              </div>
                            </div>
                            @endhasrole
                          </div>
                        </form>
                      </div>

                    </div>
                </div>
              <div class="md:w-1/4 p-4">
                  <h2 class="text-lg font-semibold text-gray-600">Paper Statistics</h2>
                  <div class="mt-4 grid grid-cols-3 gap-4">
                <div>
                  <p class="text-gray-600 text-md"><i class="fa fa-eye" aria-hidden="true"></i></p>
                  <p class="text-gray-600 text-md">{{$views}}</p>
                    </div>

                <div>
                <p class="text-gray-600 text-md"><i class="fa fa-heart" aria-hidden="true"></i></p>
                <p class="text-gray-600 text-md">{{$likes->count()}}</p>
                    </div>
            </div>
                  <hr class="my-12 mb-2 border-gray-400">

                  <div>
                    <h2 class="text-lg font-semibold text-gray-600 mt-4">College</h2>
                    <p class="text-gray-600 text-md">College of {{Str::ucfirst($theses->college->college)}}</p>
                  </div>
            
                  <div class="mt-4">
                    <h2 class="text-lg font-semibold text-gray-600">Course</h2>
                    <a href="{{ route('course', $theses->course_id) }}" class="text-gray-600 text-md">{{$theses->course->course}}</a>
                  </div>
                  <div class="mt-4">
                    <h3 class="text-md font-semibold text-gray-600">Metakeys</h3>
                    <div class="flex flex-wrap gap-2">
                      @foreach (explode(',', $theses->metakeys) as $metakey)
                      <a href="#" class="px-2 py-1 bg-gray-100 text-gray-600 text-md rounded-md hover:bg-gray-200">{{$metakey}}</a> 
                      @endforeach
                    </div>
                  </div>
                  <hr class="my-12 mb-2 border-gray-400">
                    <div class="mt-4">
                      <h2 class="text-lg font-semibold text-gray-600">Recent Submissions</h2>
                      @foreach ($recent_theses as $latest)
                        @if ($latest->id != $theses->id)
                        <ul class="space-y-4 mt-2">
                          <a href="\view/{{$latest->id}}" class="text-gray-600 text-md hover:underline font-semibold">{{Str::title($latest->title)}}</a>
                        </ul>
                        @endif
                      @endforeach
                    </div>
                  </div>
              </div>
              </div>
                </div>
                </div>
              </div>
          </div>

          <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden" id="popupOverlay">
            <div class="bg-white p-6 rounded shadow-lg">
              <span class="absolute top-0 right-0 p-2 cursor-pointer" onclick="closePopup()">&times;</span>
              <p class="text-center" id="popupMessage"></p>

              <div class="flex justify-center mt-4">
                <button type="button" onclick="closePopup()" class="bg-orange-600 hover:bg-orange-500 text-white px-4 py-2 rounded">Okay</button>
              </div>
            </div>
            
          </div>

<footer class="bg-navy-blue shadow dark:bg-gray-900 mt-12">
  <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
      <div class="sm:flex sm:items-center sm:justify-between">
          <a href="#" class="flex items-center mb-4 sm:mb-0">
              <img src="/assets/img/logo.png" class="h-8 mr-3" alt="LITAW Logo" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">LITAW</span>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
    
    <script>
      function likeThesis() {
      const isLoggedIn = false;

        if (isLoggedIn) {
   
        } else {
  
          showLikePopup();
         }
      }

      function submitComment() {
      const isLoggedIn = false;

      if (isLoggedIn) {
    
      } else {
    
      showCommentPopup();
      }
    }

      function showLikePopup() {
      document.getElementById("popupOverlay").classList.remove("hidden");
      document.getElementById("popupMessage").innerText = "Please log in to like the thesis.";
    }

      function showCommentPopup() {
      document.getElementById("popupOverlay").classList.remove("hidden");
      document.getElementById("popupMessage").innerText = "Please log in to submit a comment.";
      }

      function closePopup() {
      document.getElementById("popupOverlay").classList.add("hidden");
      }
    </script>

    <script>
    function copyCitations() {
 
    const citationsText = document.querySelector(".text-justify").innerText;

    const tempTextArea = document.createElement("textarea");
    tempTextArea.value = citationsText;


    document.body.appendChild(tempTextArea);

    tempTextArea.select();
    tempTextArea.setSelectionRange(0, 99999); 

    document.execCommand("copy");

    document.body.removeChild(tempTextArea);
    alert("Copied to clipboard!");
  }

  </script>

</body>
</html>