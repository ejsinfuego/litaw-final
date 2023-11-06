<footer class="bg-navy-blue shadow dark:bg-gray-900 mt-12">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="#" class="flex items-center mb-4 sm:mb-0">
                <img src="{{asset('img/logo_footer.png')}}" class="h-8 mr-3" alt="LITAW Logo" />
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
  
  
  
  
  
  <!--navigation toggle and login modal-->
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



var years = document.querySelectorAll(".year");

const descOrAsc = document.getElementById("orderType"); 

const filter = document.getElementById('filter');

filter.addEventListener('change', function(){
  var years = filter.value;
  console.log(years);
})

descOrAsc.addEventListener('change', function(){
  const value = filter.value;

  const theses = document.querySelectorAll('.thesis');
  years.forEach(year => {
    //sort
    for (let i = 0; i < years.length; i++) {
      for (let j = i + 1; j < years.length; j++) {
            if (years[i].innerText > years[j].innerText) {
          let temp = years[i].innerText;
          //arrange thesis
          theses[i].parentNode.insertBefore(theses[j], theses[0]);
        }else{
          theses[i].parentNode.insertBefore(theses[j], theses[i]);
        }
        
      }
    }
  });
})
  
</script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
  
  
  </body>
  </html>