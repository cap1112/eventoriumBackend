<?php
$links = array(
    array("name" => "Users", "url" => "/users/show", "icon" => "icons/users_icon.svg"),
    // /users/show
    array("name" => "Events", "url" => "/events/show", "icon" => "icons/events_icon.svg"),
    // /events/show
    array("name" => "Courses", "url" => "/courses/show", "icon" => "icons/courses_icon.svg")
    // /courses/show
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Eventorium</title>
    @Vite('resources/css/app.css')
</head>

<body class="flex flex-row font-main">
    <div
        class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 h-[100vh] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">
        <div class="mb-2 p-4">
            <h5 class="block antialiased tracking-normal text-xl font-semibold leading-snug text-gray-900">
                CRUD | Eventorium</h5>
        </div>
        <nav class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700">

            @foreach($links as $item)
            
                <a href="">
                    <div role="button" tabindex="0" 
                        class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-gray-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                        <div class="grid place-items-center mr-4">
                            <img src="{{ asset($item['icon']) }}" alt="{{ $item['name'] }}" class="h-5 w-5">
                        </div>
                        {{ $item['name'] }}
                    </div>
                </a>
            @endforeach
        </nav>
    </div>
    <div class="w-full">
        @yield('content')
    </div>
</body>

</html>