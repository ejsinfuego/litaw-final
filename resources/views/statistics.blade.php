<x-nav-bar></x-nav-bar>
<div class="flex flex-wrap justify-center">
<x-section-title title="Data Overview" description="Check overview theses data">
 
</x-section-title></div>

<div class="flex m-10 justify-center">
  <div class="flex justify-items-start md:w-1/4 lg:w-56 p-4 md:ml-4">
    <div class="justify-start">
        <hr class="my-12 mb-2 border-gray-400">
    <div class="mt-4">
      <ul class="flex flex-wrap justify-content-center mt-2">
        <div class="flex mx-2 pl-1">
          <i class="fa fa-address-book mb-1 text-xl text-gray-500" aria-hidden="true"></i>
        </div>
        <div class="flex">
          <a href="{{ route('moderator.index')}}" class="text-gray-600 text-md hover:underline"><h2 class="text-sm font-semibold text-gray-600 align-items-center mt-1">Theses</h2></a>
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
    <div hidden>
    <p id="it">
        {{$IT->count()}}
        </p>
        <p id="bacom">
          {{$BACOM->count()}}
        </p>
        <p id="math">
          {{$MATH->count()}}
        </p>
        <p id="geo">
          {{$GEO->count()}}
        </p>
        <p id="bio">
        {{$BIO->count()}}
        </p>
        <p id="comsci">
          {{$COMSCI->count()}}
        </p>
    </div>
   
    
    
     
     
  
    </div>
   
<div class="p-9 rounded-lg border border-gray-200 shadow-md justify-content-center">
<section class="py-8 w-max">
  <div>
    <h3>Total Number of Theses Currently Submitted
    </h3>
    <p class="text-center">  (by your College)</p>
    <canvas id="myChart"></canvas> 
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    const it = {{$IT->count()}};
    const bacom = {{$BACOM->count()}};
    const math = {{$MATH->count()}};
    const geo = {{$GEO->count()}};
    const bio = {{$BIO->count()}};
    const comsci = {{$COMSCI->count()}};
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
    type: 'pie',
    data: {
      
      labels: ['Bachelor of Science in Information Technology', 'Bachelor of Science in Computer Science', 'Bachelor of Science in Math', 'Bachelor of Arts in Communication', 'Bachelor of Science in Geology', 'Bachelor of Science in Biology'], // Our labels
      datasets: [{
        label: 'Number of Theses We Have',
        data: [it, comsci, math, bacom, geo, bio],
        backgroundColor: [
          'rgb(255, 99, 100)',
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)',
          'rgb(255, 205, 55)'
          ],
          hoverOffset: 4
      }]
    },
  });
  </script>
   
</section>
</div>

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

  
    const ctx = document.getElementById('pie');
    new Chart(ctx, {
    type: 'doughnut',
    data: {
      const data = {
  labels: [
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};
    },
  });

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