@extends('.layout')
@section('content')

<div class="bg-white shadow-lg rounded-lg p-6 h-[100%]">
    <div class="flex justify-between mr-4">
        <h2 class="text-2xl font-semibold mb-4">Edit User</h2>
        <a href="{{ route('users.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back" class="size-10"></a>
    </div>

    <div class="flex justify-between items-center">
        <p class="text-gray-600 mb-6">A page where you can edit users' information by changing their first name, last name, email and additional features.
        </p>
    </div>
    <div class="overflow-x-auto">
        <form id="userForm" method="POST" action="{{ route('users.update', $registeredUsers->id) }}">
            @method('PUT')
            @csrf
            <div
                class="bg-white px-6 py-3 shadow-lg rounded-lg grid grid-cols-2 justify-center items-center gap-8 w-full">
                <div class="flex col-span-2 items-center">
                    <div class=" flex flex-col">
                        <input id="fileInput" name="image" type="file" class="hidden" accept="image/*">
                        <img id="fileInputTrigger" src="{{ asset('users_img/usuario_1.jpg') }}" alt="User Image"
                            class="cursor-pointer w-[10rem] h-[10rem] mr-[11rem] object-cover rounded-full border-4 border-gray-300">
                        <label for="" class="ml-10 mt-4">User Image</label>
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="text-black mb-4">Username:</label>
                        <input name="username" value={{$registeredUsers->username}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[65.6rem]"
                        placeholder="Enter the Username">
                        
                        <div class="flex mt-4">
                            <div class="mr-6">
                                <label for="" class="text-black">Name:</label>
                                <input name="name" value={{$registeredUsers->name}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[32rem]"
                                placeholder="Enter the name">
                            </div>
                            <div>

                                <label for="" class="text-black ">Last name:</label>
                                <input name="lastname" value={{$registeredUsers->lastname}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[32rem]"
                                placeholder="Enter the Last name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Email:</label>
                    <input name="email" value={{$registeredUsers->email}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Email">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Password:</label>
                    <input name="password" value={{$registeredUsers->password}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Choose the Password">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Diseases:</label>
                    <input name="diseases" value={{$registeredUsers->diseases}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the disease">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Sleep hours:</label>
                    <input name="sleep_hours" value={{$registeredUsers->sleep_hours}} type="number" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the number of sleep hours ">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Physical Activities:</label>
                    <input name="physical_activity" value={{$registeredUsers->physical_activity}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Physical activity of your choice ">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Profile:</label>
                    <select name="profile" value={{$registeredUsers->profile}} class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value="admin" selected hidden>{{$registeredUsers->profile}}</option>
                        <option class="text-black" value="Admin">Admin</option>
                        <option class="text-black" value="Profesor">Professor</option>
                        <option class="text-black" value="Estudiante">Student</option>
                    </select>
                </div>

                <div class="">
                    <div class="flex items-center text-center w-full justify-between">
                        <label for="" class="text-black">Matriculated Courses:</label>
                        <button type="button" id="addCourseBtn"
                            class="my-2  bg-indigo-600 text-white px-3 mr-2 py-2 rounded-xl shadow hover:bg-indigo-600">
                            {{-- <img class="size-7" src="{{ asset('icons/plus_icon.svg') }}" alt="Plus Icon"> --}}
                            Add course
                        </button>
                    </div>
                    <select name="selectedCourses" class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]"
                        id="coursesSelect">
                        @foreach ($courses as $course)
                            <option class="text-gray-400" selected hidden value="{{ $course->id }}">Select a course
                            </option>
                            <option class="text-gray-400" value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    <div id="selectedCoursesContainer" class="mt-4"></div>
                </div>

                <div class="flex justify-end mr-4 col-span-2">
                    <button type="submit"
                        class="my-2 w-[10rem] bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Update
                        user</button>
                </div>
            </div>
        </form>
    </div>


    <script>
        // Script del manejo del input de tipo file y la vista previa de la imagen
        document.getElementById('fileInputTrigger').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('fileInputTrigger').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
        
        /*Todo el script que hace que la lista de cursos funcione correctamente, se encarga de añadir
                    los cursos seleccionados al div, ademas de hacer funcionar sus respectivos botones de eliminar y 
                    devolverlos a la lista de cursos.*/
        function addSelectedCourse() {
            var selectedCourse = document.getElementById('coursesSelect');
            var selectedCourseId = selectedCourse.value;
            var selectedCourseText = selectedCourse.options[selectedCourse.selectedIndex].text;

            var courseElement = document.createElement('div');
            courseElement.className =
                "flex items-center justify-between mt-2 border rounded-xl w-[38rem] h-[4rem] p-4 bg-gray-100";
            var courseText = document.createElement('span');
            courseText.textContent = selectedCourseText;
            courseElement.appendChild(courseText);

            // Botón para eliminar el curso seleccionado
            var deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.className = "my-2 w-[10rem] bg-red-600 text-white px-4 py-2 rounded-xl shadow hover:bg-red-700";

            deleteButton.onclick = function() {
                // Re-añade la opción eliminada a la lista del select
                var option = document.createElement('option');
                option.value = selectedCourseId;
                option.text = selectedCourseText;
                option.className = "text-gray-400";
                selectedCourse.appendChild(option);

                // Remueve el div del curso seleccionado
                courseElement.remove();
                // Elimina el input oculto del forum
                var hiddenInputs = document.querySelectorAll('input[name="selectedCourses[]"]');
                for (var i = 0; i < hiddenInputs.length; i++) {
                    if (hiddenInputs[i].value == selectedCourseId) {
                        hiddenInputs[i].remove();
                        break;
                    }
                }
            };

            courseElement.appendChild(deleteButton);

            //Crea un input oculto para el curso seleccionado
            var hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'selectedCourses[]';
            hiddenInput.value = selectedCourseId;

            // Añade el input oculto al formulario
            document.getElementById('userForm').appendChild(hiddenInput);

            // Añade el elemento al contenedor de cursos seleccionados
            document.getElementById('selectedCoursesContainer').appendChild(courseElement);
            selectedCourse.remove(selectedCourse.selectedIndex);
        }

        document.getElementById('addCourseBtn').addEventListener('click', addSelectedCourse);
        </script>
    </div>

</div>
@endsection