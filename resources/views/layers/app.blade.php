<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script defer src="{{asset('js/app.js')}}"></script>
</head>

<body>
    <nav class="p-2 mb-20 bg-bg shadow-sm">
        <div class="md:grid grid-cols-navExpanded gap-3 max-w-7xl mx-auto">
            <div class="">
                <div class="flex justify-between items-center">
                    <h1 class="text-title font-medium text-xl">KAWAII EVENTS</h1>
                    <button id="nav_button" class="md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="nav_items" class="md:flex justify-between items-center overflow-hidden transition-all md:max-h-full md:transition-none">
                <div>
                    <a class="text-text" href="">Dashboard</a>
                </div>
                <div class="flex flex-col md:gap-3 md:flex-row">
                    <a class="text-title" href="">Login</a>
                    <a class="text-title" href="">Register</a>
                </div>
            </div>
        </div>

    </nav>
    <div class="max-w-7xl mx-auto p-2">
        @yield('body')
    </div>
</body>

</html>
