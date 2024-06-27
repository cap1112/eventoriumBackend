@extends('.layout')
@section('content')
<div>
    <div class="p-6">
        <div class="flex justify-between mr-4">
            <h2 class="text-2xl font-semibold mb-4">Add Users</h2>
            <a href="{{ route('users.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back"
                    class="size-10"></a>
        </div>
        <div class="flex justify-between items-center">
            <p class="text-gray-600 mb-2">A page where you can create users by adding their first name, last name, email
                and extra features.
            </p>
        </div>
    </div>
    <div class="overflow-x-auto">

        <form id="userForm" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <div
                class="bg-white px-6 py-3 shadow-lg rounded-lg grid grid-cols-2 justify-center items-center gap-8 w-full overflow-y-auto h-[100%]">
                <div class="flex col-span-2 items-center">
                    <div class=" flex flex-col">
                        <input id="fileInput" name="image" type="file" class="hidden" accept="image/*">
                        <img id="fileInputTrigger" src="{{ asset('storage/users_img/default-user.png') }}"
                            alt="User Image"
                            class="cursor-pointer w-[10rem] h-[10rem] mr-[3rem] object-cover rounded-full border-4 border-gray-300">
                        <label for="" class="ml-10 mt-4">User Image</label>
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="text-black mb-4">Username:</label>
                        <input name="username" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[65.6rem]"
                            required placeholder="Enter the Username">
                        <span class="text-red-500 mt-2" id="username-error"></span>
                        <div class="flex mt-4">
                            <div class="mr-6">
                                <label for="" class="text-black">Name:</label>
                                <input name="name" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[32rem]"
                                    required placeholder="Enter the name">
                            </div>
                            <div>
                                <label for="" class="text-black ">Last name:</label>
                                <input name="lastname" type="text"
                                    class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[32rem]" required
                                    placeholder="Enter the Last name">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Email:</label>
                    <input name="email" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]" required
                        placeholder="Enter the Email">
                    <span class="text-red-500 mt-2" id="email-error"></span>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Password:</label>
                    <input name="password" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]" required
                        placeholder="Choose the Password">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Diseases:</label>
                    <select name="diseases" class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value="Ninguna" selected hidden>Select a disease</option>
                        <option class="text-black" value="Ninguna">Ninguna</option>
                        <option class="text-black" value="Diabetes">Diabetes</option>
                        <option class="text-black" value="Hipertension">Hipertension</option>
                        <option class="text-black" value="Obesidad">Obesidad</option>
                        <option class="text-black" value="Asma">Asma</option>
                        <option class="text-black" value="Artritis">Artritis</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Sleep hours:</label>
                    <input name="sleep_hours" type="number" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        min="1" max="24" required placeholder="Enter the number of sleep hours ">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Physical Activities:</label>
                    <select name="physical_activity" class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value="Moderado" selected hidden>Select a physical activty
                        </option>
                        <option class="text-black" value="Sedentario">Sedentario</option>
                        <option class="text-black" value="Moderado">Moderado</option>
                        <option class="text-black" value="Activo">Activo</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Profile:</label>
                    <select name="profile" class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value="admin" selected hidden>Select a profile type</option>
                        <option class="text-black" value="Admin">Admin</option>
                        <option class="text-black" value="Profesor">Professor</option>
                        <option class="text-black" value="Estudiante">Student</option>
                    </select>
                </div>

                <div>
                    <label class="text-black mb-4">Matriculated Courses:</label>
                    <div class="flex-col bg-gray-100 p-4 rounded-2xl w-[38rem] space-y-2">
                        @foreach ($courses as $course)
                            <div>
                                <input type="checkbox" name="selectedCourses[]" id="course{{$course->id}}"
                                    value="{{$course->id}}">
                                <label for="course{{$course->id}}">{{$course->id}} | {{$course->name}} ||
                                    {{$course->initial}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end mr-4 col-span-2">
                    <button type="submit"
                        class="my-2 w-[10rem] bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Add
                        user</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Script del manejo del input de tipo file y la vista previa de la imagen
        document.getElementById('fileInputTrigger').addEventListener('click', function () {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function (event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('fileInputTrigger').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Script para validación de unicidad en el cliente
        document.addEventListener('DOMContentLoaded', function () {
            const existingUsernames = @json($usernames);
            const existingEmails = @json($emails);

            const usernameInput = document.querySelector('input[name="username"]');
            const emailInput = document.querySelector('input[name="email"]');
            const usernameError = document.getElementById('username-error');
            const emailError = document.getElementById('email-error');

            document.querySelector('form').addEventListener('submit', function (event) {
                let hasError = false;

                usernameError.textContent = '';
                emailError.textContent = '';

                if (existingUsernames.includes(usernameInput.value)) {
                    usernameError.textContent = 'El username ya existe';
                    hasError = true;
                }

                if (existingEmails.includes(emailInput.value)) {
                    emailError.textContent = 'El email ya existe';
                    hasError = true;
                }

                if (hasError) {
                    event.preventDefault();
                }
            });
        });
    </script>
</div>

</div>
@endsection