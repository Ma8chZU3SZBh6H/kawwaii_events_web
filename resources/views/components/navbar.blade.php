<nav class="p-2 mb-12 bg-bg shadow-md">
    <div class="md:grid grid-cols-navExpanded gap-3 max-w-7xl mx-auto">
        <div class="">
            <div class="flex justify-between items-center">
                <h1 class="text-title font-medium text-2xl">
                    <a href="{{route('home')}}">KAWAII EVENTS</a>
                </h1>
                <button id="nav_button" class="md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="nav_items" class="md:flex justify-between items-center overflow-hidden transition-all md:max-h-full md:transition-none">
            <div>
                @auth()
                <a class="text-text text-lg hover:underline" href="{{route('dashboard')}}">Dashboard</a>
                @endauth
            </div>
            <div class="flex flex-col md:gap-3 md:flex-row">
                @auth()
                <a class="text-text text-lg hover:underline" href="{{route('profile')}}">{{Auth()->User()->name}}</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <input class="bg-transparent text-text text-lg cursor-pointer hover:underline" type="submit" value="Logout">
                </form>
                @endauth
                @guest()
                <a class="text-text text-lg hover:underline" href="{{route('login')}}">Login</a>
                <a class="text-text text-lg hover:underline" href="{{route('register')}}">Register</a>
                @endguest
            </div>
        </div>
    </div>
</nav>
