@extends('.layout')
@section('content')
    <div>
        <div class="p-6">
            <div class="flex justify-between mr-4">
                <h2 class="text-2xl font-semibold mb-4">Add Users</h2>
                <a href="{{ route('users.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back" class="size-10"></a>
            </div>
            <div class="flex justify-between items-center">
                <p class="text-gray-600 mb-6">A page where you can create users by adding their first name, last name, email
                    and extra features.
                </p>
            </div>
        </div>
        <form id="userForm" method="POST" action="{{ route('users.store') }}">
            @csrf
            <div
                class="bg-white px-6 py-3 shadow-lg rounded-lg grid grid-cols-2 justify-center items-center gap-8 w-full">

                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Username:</label>
                    <input name="name" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Username">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Last name:</label>
                    <input name="lastname" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Last name">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Email:</label>
                    <input name="email" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Email">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Password:</label>
                    <input name="password" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Choose the Password">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Diseases:</label>
                    <input name="diseases" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the disease">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Sleep hours:</label>
                    <input name="sleep_hours" type="number" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the number of sleep hours ">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Physical Activities:</label>
                    <input name="physical_activity" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Physical activity of your choice ">
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
                    <label for="" class="text-black mb-4">Matriculated Courses:</label>
                    <button type="button" id="addCourseBtn" class="my-2 w-[15rem] bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Add Selected Course</button>
                    <select name="selectedCoursesTest" class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]" id="coursesSelect">
                        @foreach($courses as $course)
                        <option class="text-gray-400" value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    <div id="selectedCoursesContainer" class="mt-4"></div>                    
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
            /*Todo el script que hace que la lista de cursos funcione correctamente, se encarga de añadir
            los cursos seleccionados al div, ademas de hacer funcionar sus respectivos botones de eliminar y 
            devolverlos a la lista de cursos.*/
            function addSelectedCourse() {
                var selectedCourse = document.getElementById('coursesSelect');
                var selectedCourseId = selectedCourse.value;
                var selectedCourseText = selectedCourse.options[selectedCourse.selectedIndex].text;

                var courseElement = document.createElement('div');
                courseElement.className = "flex items-center justify-between p-2 mt-2 border rounded bg-gray-100";
                var courseText = document.createElement('span');
                courseText.textContent = selectedCourseText;
                courseElement.appendChild(courseText);

                // Botón para eliminar el curso seleccionado
                var deleteButton = document.createElement('button');
                deleteButton.textContent = 'Eliminar';
                deleteButton.className = "my-2 w-[10rem] bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700";

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
@endsection
