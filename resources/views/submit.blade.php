<x-nav-bar></x-nav-bar>

<div class="container mx-auto mt-8">

    <p class="mb-2 text-gray-500 dark:text-gray-400 text-sm mb-6 md:mx-16 mx-6"><em>Before submitting your manuscript, please remember to include accurate keywords and metakeys to enhance the discoverability of your work. It is important to meticulously proofread your manuscript for any spelling, grammar, or punctuation errors and ensure that the content you are submitting is entirely your own creation.</em></p>
 
<form method="POST" action="{{ route('theses.store') }}" enctype="multipart/form-data" class="md:mx-16 mx-6 mb-8">
  @csrf
  <div class="bg-gray-100 font-bold text-gray-600 border p-5 border-b-0 border-gray-300">
    <h2>Manuscript Information</h2>
  </div>

  <div class="p-5 border border-gray-300 dark:border-gray-700 dark:bg-gray-900">
    
    <div class="grid grid-cols-2 gap-4">
      <div>
          <label for="title" class="block mb-1 text-gray-500 dark:text-gray-400">Title</label>
          <textarea for="title" type="text" placeholder="Title" id="title" name="title" class="w-full py-2 px-3 border border-gray-400 focus:ring-0 focus:border-gray-600"></textarea>
          <x-input-error for='title' :messages="$errors->get('title')" class="mt-2" ></x-input-error>

      </div>

      <div>
        <label for="course" class="block mb-1 text-gray-500 dark:text-gray-400">Course</label>
          <select id="course_id" name="course_id" class="w-full py-2 px-3 border border-gray-400 focus:ring-0 focus:border-gray-600">
            <option value="">Select</option>
            @foreach ($courses as $course)
            <option value="{{$course->id}}">{{($course->course)}}</option>
            @endforeach
          </select>
      </div>

      <div>
        <label for="college" class="block mb-1 text-gray-500 dark:text-gray-400">College</label>
            <select id="college" name="college_id" class="w-full py-2 px-3 border border-gray-400 focus:ring-0 focus:border-gray-600">
              <option value="">Select</option>
              @foreach ($colleges as $college)
            <option value="{{$college->id}}">College of {{Str::title($college->college)}}</option>
            @endforeach
            </select>
      </div>
      <div>
      <label for="college" class="block mb-1 text-gray-500 dark:text-gray-400">Years</label>
      <select id="college" name="year_id" class="w-full py-2 px-3 border border-gray-400 focus:ring-0 focus:border-gray-600">
        <option value="">Select</option>
        @foreach ($years as $year )
        <option value="{{$year->id}}">{{$year->year}}</option>
        @endforeach
      </select>
</div>
      <div>
          <label for="metakeys" class="block mb-1 text-gray-500 dark:text-gray-400">Metakeys</label>
          <input type="text" id="metakeys" name="metakeys" class="w-full py-2 px-3 border border-gray-400 focus:ring-0 focus:border-gray-600">
          <x-input-error for='metakeys' :messages="$errors->get('metakeys')" class="mt-2" ></x-input-error>
        </div>

      <div class="col-span-2">
        <label for="abstract" class="block mb-1 text-gray-500 dark:text-gray-400">Abstract</label>
        <textarea id="abstract" name="abstract" rows="4" class="w-full h-48 resize-y py-2 px-3 border border-gray-400 focus:ring-0 focus:border-gray-600"></textarea>
        <x-input-error for='abstract' :messages="$errors->get('abstract')" class="mt-2" ></x-input-error>

      </div>
      

    <div class="col-span-2">
      <h1 class="font-bold text-gray-600">Author(s)</h1>
    </div>

        <div class="author-fields col-span-2">
          <div class="grid grid-cols-2 gap-4">
              <div>
                  <label for="author1-first-name" class="block mb-1 text-gray-500 dark:text-gray-400">Complete Name (Last Name, First Name, M.I)</label>
                  <input type="text" name="authors[]" class="w-full py-2 px-3 border border-gray-400 focus:ring-0 focus:border-gray-600">
                </div>
              <div>
                  <label for="author1-last-name" class="block mb-1 text-gray-500 dark:text-gray-400">Complete Name (Last Name, First Name, M.I)</label>
                  <input type="text" name="authors[]" class="w-full py-2 px-3 border border-gray-400 focus:ring-0 focus:border-gray-600">
              </div>
          </div>
      </div>

      <div class="col-span-2 flex items-center justify-end">
        <button type="button" id="add-author-btn" class="bg-transparent text-sm text-gray-600 border border-gray-300 py-1 px-4 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block mb-1 text-blue-600">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
          Add Author
        </button>
    </div>

    <div id="additional-authors" class="col-span-2 grid grid-cols-2 gap-4"></div>
  </div>
  <div>
    <label for="file" class="block text-gray-700 font-semibold mb-2">Upload PDF file here</label>
      <input type="file" id="pdf" name="filename" accept=".pdf" class="-50 w-64" required>
  </div>

  <div class="col-span-2 mt-8">
    <label for="accept-terms" class="flex items-center text-sm">
      <input type="checkbox" id="accept-terms" name="accept-terms" class="form-checkbox h-4 w-4 text-blue-500" required>
      <span class="ml-2 text-gray-500 dark:text-gray-400">
        I have read, understood, and hereby accept the 
        <a onclick="showTerms()" href="#" class="text-blue-500 hover:underline">
          Litaw Terms and Conditions
        </a>
        on behalf of myself and every author of this manuscript
      </span>
    </label>

    <label for="originality" class="flex items-center text-sm mt-2">
      <input type="checkbox" id="originality" name="originality" class="form-checkbox h-4 w-4 text-blue-500" required>
      <span class="ml-2 text-gray-500 dark:text-gray-400">
        I certify that this manuscript is original and does not infringe upon the intellectual property rights of any third party.
      </span>
    </label>

  </div>

  <div class="col-span-2 flex justify-end mt-8">
      <button type="submit" class="bg-transparent text-blue-600 hover:text-white border border-blue-500 hover:border-blue-600 py-2 px-4 rounded hover:bg-blue-600 focus:outline-none">Submit Manuscript</button>
  </div>

  </div>
</form>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>










<!--Toggle navigation and Login modal-->
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








<!--Choosing course-->
<script>
  function updateCourseOptions() {
      const collegeSelect = document.getElementById('college');
      const courseSelect = document.getElementById('course');

      const selectedCollege = collegeSelect.value;

      courseSelect.innerHTML = '<option value="">Select</option>';
      courseSelect.disabled = true;

      switch (selectedCollege) {
          case 'arts_and_science':
              addCourseOption('Bachelor of Arts in Communication');
              addCourseOption('Bachelor of Science in Biology');
              addCourseOption('Bachelor of Science in Computer Science');
              addCourseOption('Bachelor of Science in Geology');
              addCourseOption('Bachelor of Science in Information Technology')
              addCourseOption('Bachelor of Science in Mathematics')
              break;
          case 'education':
              addCourseOption('Bachelor of Secondary Education Major in English');
              addCourseOption('Bachelor of Secondary Education Major in Filipino');
              addCourseOption('Bachelor of Secondary Education Major in Mathematics');
              addCourseOption('Bachelor of Secondary Education Major in MAPEH');
              addCourseOption('Bachelor of Secondary Education Major in Biological Science');
              addCourseOption('Bachelor of Secondary Education Major in Social Science');
              addCourseOption('Bachelor of Secondary Education Major in Values Education');
              addCourseOption('Bachelor of Elementary Education');
              break;
          case 'business_and_management':
              addCourseOption('Bachelor of Science in Accountancy');
              addCourseOption('Bachelor of Science in Business Administration Major in Financial Management');
              addCourseOption('Bachelor of Science in Entrepreneurship');
              addCourseOption('Bachelor of Science in Office Administration');
              addCourseOption('Bachelor of Science in Economics');
              break;
          case 'engineering':
              addCourseOption('Bachelor in Science in Civil Engineering');
              addCourseOption('Bachelor in Science in Sanitary Engineering');
              addCourseOption('Bachelor of Automotive Technology');
              addCourseOption('Bachelor in Electrical Technology');
              addCourseOption('BSET Major in Automotive Technology');
              addCourseOption('BSET Major in Refrigeration and Airconditioning Technology');
              addCourseOption('BSET Major in Electrical Engineering Technology');
              break;
          default:
              courseSelect.innerHTML = '<option value=""></option>';
              courseSelect.disabled = true;
              break;
      }
  }

  function addCourseOption(name, value) {
      const courseSelect = document.getElementById('course');
      const option = document.createElement('option');
      option.text = name;
      option.value = value;
      courseSelect.appendChild(option);
      courseSelect.disabled = false;
  }

  const collegeSelect = document.getElementById('college');
  collegeSelect.addEventListener('change', updateCourseOptions);
</script>








<!--To add another fields for author-->
<script>
  const addAuthorBtn = document.getElementById('add-author-btn');
  const additionalAuthors = document.getElementById('additional-authors');
  let authorCount = 1;

  addAuthorBtn.addEventListener('click', () => {
      const newAuthorFields = document.createElement('div');
      newAuthorFields.classList.add('author-fields', 'col-span-2', 'grid', 'grid-cols-2', 'gap-4');
      newAuthorFields.innerHTML = `
          <div>
              <label for="author${authorCount + 1}-first-name" class="block mb-1 text-gray-500 dark:text-gray-400">Complete Name (Last Name, First Name, M.I)</label>
                  <input type="text" name="authors[]" class="w-full py-2 px-3 border border-gray-400 focus:ring-0 focus:border-gray-600">
          </div>

          <button type="button" class="col-span-2 mx-auto items-center justify-end remove-author-btn text-gray-600 py-2 px-3 bg-gray-200 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
         </button>
  `;
      additionalAuthors.appendChild(newAuthorFields);
      authorCount++;

      const removeAuthorBtns = document.querySelectorAll('.remove-author-btn');
      removeAuthorBtns.forEach((btn) => {
          btn.addEventListener('click', () => {
              additionalAuthors.removeChild(btn.parentNode);
          });
      });
  });
</script>

</body>
</html>