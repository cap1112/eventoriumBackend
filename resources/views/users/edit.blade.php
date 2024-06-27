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
        <form id="userForm" method="POST" action="{{ route('users.update', $registeredUsers->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div
                class="bg-white px-6 py-3 shadow-lg rounded-lg grid grid-cols-2 justify-center items-center gap-8 w-full">
                <div class="flex col-span-2 items-center">
                    <div class=" flex flex-col">
                        <input id="fileInput" name="image" type="file" class="hidden" accept="image/*">
                        <img id="fileInputTrigger" src="{{ asset('storage/users_img/'. $registeredUsers->image) }}" alt="User Image"
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
                    <input name="password" value="" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Leave blank if you dont wanna change the Password">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Diseases:</label>
                    <select name="diseases" class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value={{$registeredUsers->diseases}} selected hidden>{{$registeredUsers->diseases}}</option>
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
                    <input name="sleep_hours" value={{$registeredUsers->sleep_hours}} type="number" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the number of sleep hours ">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Physical Activities:</label>
                    <select name="physical_activity" class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value={{$registeredUsers->physical_activity}} selected hidden>{{$registeredUsers->physical_activity}}</option>
                        <option class="text-black" value="Sedentario">Sedentario</option>
                        <option class="text-black" value="Moderado">Moderado</option>
                        <option class="text-black" value="Activo">Activo</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Profile:</label>
                    <select name="profile" value={{$registeredUsers->profile}} class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value={{$registeredUsers->profile}} selected hidden>{{$registeredUsers->profile}}</option>
                        <option class="text-black" value="Admin">Admin</option>
                        <option class="text-black" value="Profesor">Professor</option>
                        <option class="text-black" value="Estudiante">Student</option>
                    </select>
                </div>

                <div>
                    <label class="text-black mb-4">Matriculated Courses:</label>
                    <div class="flex-col bg-gray-100 p-4 rounded-2xl w-[38rem] space-y-2">
                        @foreach ($registeredCourses as $course)
                            <div>
                                <input type="checkbox" name="selectedCourses[]" id="course{{$course->id}}" value="{{$course->id}}" checked>
                                <label for="course{{$course->id}}">{{$course->id}} | {{$course->name}} || {{$course->initial}}</label>
                            </div>
                        @endforeach
                        @foreach ($courses as $course)
                            <div>
                                <input type="checkbox" name="selectedCourses[]" id="course{{$course->id}}" value="{{$course->id}}">
                                <label for="course{{$course->id}}">{{$course->id}} | {{$course->name}} || {{$course->initial}}</label>
                            </div>
                        @endforeach
                    </div>
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
        </script>
    </div>

</div>
@endsection