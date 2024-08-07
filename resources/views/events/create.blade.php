@extends('.layout')
@section('content')
<div>
    <div class="p-6">
        <div class="flex justify-between mr-4">
            <h2 class="text-2xl font-semibold mb-4">Add Event</h2>
            <a href="{{ route('events.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back"
                    class="size-10"></a>
        </div>
        <div class="flex justify-between items-center">
            <p class="text-gray-600 mb-2">A page where you can create an event, enter its title, description, start or
                end date, category, status and course..
            </p>
        </div>

    </div>
    <div class="overflow-x-auto">

        <form id="eventForm" method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
            @csrf
            <div
                class="bg-white px-6 py-3 shadow-lg rounded-lg grid grid-cols-2 justify-center items-center gap-8 w-full overflow-y-auto h-[100%]">
                <div class="flex col-span-2 items-center">
                    <div class=" flex flex-col">
                        <input id="fileInput" name="image" type="file" class="hidden" accept="image/*">
                        <img id="fileInputTrigger" src="{{ asset('storage/events_img/default-event.png') }}" alt=Event
                            Image"
                            class="cursor-pointer w-[10rem] h-[10rem] mr-[3rem] object-cover rounded-full border-4 border-gray-300">
                        <label for="" class="ml-10 mt-4">Event Image</label>
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="text-black mb-4">Title:</label>
                        <input name="title" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[65.6rem]"
                            placeholder="Enter the title of the event" required>

                        <label for="" class="text-black my-4">Description:</label>
                        <textarea name="description" class="bg-gray-100 h-[8rem] p-4 rounded-2xl w-[65.6rem]" required
                            placeholder="Enter the description of the event"></textarea>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Start:</label>
                    <input name="start" type="date" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the date of the start" value="{{ date('Y-m-d') }}">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">End:</label>
                    <input name="end" type="date" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the date of the end" value="{{ date('Y-m-d') }}">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Start-Time:</label>
                    <input name="startTime" type="time" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Choose the time of start" value="{{ date('H:i') }}">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">End-Time:</label>
                    <input name="endTime" type="time" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Choose the time of start" value="{{ date('H:i') }}">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Category:</label>
                    <select name="category" class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value="3" selected hidden>Select a category</option>
                        <option class="text-black" value="1">Event</option>
                        <option class="text-black" value="2">Homework</option>
                        <option class="text-black" value="3">Communicate</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">State:</label>
                    <select name="state" class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value="Inactivo" selected hidden>Select a state</option>
                        <option class="text-black" value="Inactivo">Inactive</option>
                        <option class="text-black" value="Activo">Active</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Course:</label>
                    <select name="courses" class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end mr-4 col-span-2">
                    <button type="submit"
                        class="my-2 w-[10rem] bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Add
                        event</button>
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

            deleteButton.onclick = function () {
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