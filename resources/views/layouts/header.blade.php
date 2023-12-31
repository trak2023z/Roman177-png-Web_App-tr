<nav id="header" class="fixed w-full z-30 top-0   ">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
      <div class="pl-4 flex items-center">            
        <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="{{ route('index') }}">
          GYM
        </a>
      </div>
      <div class="block lg:hidden pr-4">
        <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
      </div>
      <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-gradient-to-r lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
          <li class="mr-3">
            <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('about') }}">About us</a>
          </li>
          <li class="mr-3">            
            <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('team') }}">Our Team</a>
          </li>
          <li class="mr-3">            
            <a class="inline-block text-white no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="{{ route('contact') }}">Contact us</a>
          </li>
        </ul>
        @if(!Auth::user())
        <button id="navAction"
          class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"  onclick="window.location.href='{{ route('login') }}';">
          Sign in
        </button>
    @endif
    @if(Auth::user())
          <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none"             
          @switch(auth()->user()->role)
            @case('trainer')
              onclick="window.location.href='{{ route('trainerPanel.home') }}';"
            @break
            @case('client')
              onclick="window.location.href='{{ route('clientPanel.home') }}';"
            @break
            @case('admin')
              onclick="window.location.href='{{ route('adminPanel.home') }}';"
            @break
            @case('receptionist')
            onclick="window.location.href='{{ route('receptionistPanel.home') }}';"
          @break
        @endswitch            
          >
          </button>
    @endif
      </div>
    </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
  </nav>  
    <script>
      var navMenuDiv = document.getElementById("nav-content");
      var navMenu = document.getElementById("nav-toggle");
  
      document.onclick = check;
      function check(e) {
        var target = (e && e.target) || (event && event.srcElement);
  
        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
          // click NOT on the menu
          if (checkParent(target, navMenu)) {
            // click on the link
            if (navMenuDiv.classList.contains("hidden")) {
              navMenuDiv.classList.remove("hidden");
            } else {
              navMenuDiv.classList.add("hidden");
            }
          } else {
            // click both outside link and outside menu, hide menu
            navMenuDiv.classList.add("hidden");
          }
        }
      }
      function checkParent(t, elm) {
        while (t.parentNode) {
          if (t == elm) {
            return true;
          }
          t = t.parentNode;
        }
        return false;
      }
    </script>