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
    
  </div>
<div class="p-9 rounded-lg border border-gray-200 shadow-md justify-content-center flex">
<section class="py-8 w-max">
  <div>
    <h3>Total Number of Theses Currently Submitted
    </h3>
    <p class="text-center">  (by your College)</p>
    <canvas id="myChart" style="flex flex-row"></canvas> 
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>

    const courses = @json($courses);
    const counts = @json($counts_of_theses);

    const ctx = document.getElementById('myChart');

    const programs = courses.map(course => course.course);

  
    new Chart(ctx, {
    type: 'pie',
    data: {
      
      labels: programs, // Our labels
      datasets: [{
        label: 'Number of Theses We Have',
        data: counts,
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

<x-footer></x-footer>