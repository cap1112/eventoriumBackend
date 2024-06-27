<?php
$links = array(
    array("name" => "Courses", "url" => "/courses", "icon" => "icons/courses_icon.svg", "route" => "courses.index"),
    array("name" => "Users", "url" => "/users", "icon" => "icons/users_icon.svg", "route" => "users.index"),
    array("name" => "Events", "url" => "/events", "icon" => "icons/events_icon.svg", "route" => "events.index"),
    array("name" => "Log out", "url" => "/events", "icon" => "icons/logout_icon.svg", "route" => "access.logout"),
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
        class="fixed flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 h-[100vh] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">
        <div class="flex justify-center items-center">
            <img class="m-4 h-8" src="{{ asset('icons/logoEventorium.svg') }}" alt="Logo">
        </div>
        <div class="mb-2 p-4">
            <h5 class="block antialiased tracking-normal text-xl font-semibold leading-snug text-gray-900">
                CRUD | Eventorium</h5>
        </div>
        <nav class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700">

            @foreach($links as $item)
                <a href="{{route($item['route'])}}">
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
    <div class="w-full ml-[20rem]">
        @yield('content')
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function (event) {

            let image = document.getElementById('image');

            if (image != null) {
                image.addEventListener("change", function () {
                    console.log("change");
                    let fileName = this.value.toLowerCase();
                    if (!fileName.endsWith('.jpg') && !fileName.endsWith('.png')) {
                        alert('Please upload JPG or PNG file only.');
                        this.value = '';
                        return false;
                    } else {
                        let reader = new FileReader();
                        reader.onload = (e) => {
                            let preview = document.getElementById('preview');
                            preview.setAttribute("src", e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    }

                });
            }

        });
    </script>
</body>

</html>