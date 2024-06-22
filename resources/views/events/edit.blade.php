@extends('.layout')
@section('content')

<div class="bg-white shadow-lg rounded-lg p-6 h-[100%]">
    <div class="flex justify-between mr-4">
        <h2 class="text-2xl font-semibold mb-4">Edit Event</h2>
        <a href="{{ route('events.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back"
                class="size-10"></a>
    </div>

    <div class="flex justify-between items-center">
        <p class="text-gray-600 mb-6">A page where you can edit events' information by changing their first name, last
            name, email and additional features.
        </p>
    </div>
    <div class="overflow-x-auto">
        <form method="POST" action="{{ route('events.update', $registeredEvents->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div
                class="bg-white px-6 py-3 shadow-lg rounded-lg grid grid-cols-2 justify-center items-center gap-8 w-full">
                <div class="flex col-span-2 items-center">
                    <div class=" flex flex-col">
                        <input id="fileInput" name="image" type="file" class="hidden" accept="image/*">
                        <img id="fileInputTrigger" src="{{ asset('storage/events_img/' . $registeredEvents->image) }}"
                            alt=""
                            class="cursor-pointer w-[10rem] h-[10rem] mr-[11rem] object-cover rounded-full border-4 border-gray-300">
                        <label for="" class="ml-10 mt-4">Event Image</label>
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="text-black mb-4">Title:</label>
                        <input name="title" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[65.6rem]"
                            placeholder="Enter the tilte of the event" value={{$registeredEvents->title}}>

                        <label for="" class="text-black my-4">Description:</label>
                        <input name="description" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[65.6rem]"
                            placeholder="Enter the description of the event" value={{$registeredEvents->description}}>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Start:</label>
                    <input name="start" value={{$registeredEvents->start}} type="date"
                        class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]" placeholder="Enter the Email">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">End:</label>
                    <input name="end" value={{$registeredEvents->end}} type="date"
                        class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]" placeholder="Enter the disease">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Start-Time:</label>
                    <input name="startTime" value={{$registeredEvents->startTime}} type="time"
                        class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]" placeholder="Choose the Password">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">End-Time:</label>
                    <input name="endTime" value={{$registeredEvents->endTime}} type="time"
                        class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the number of sleep hours ">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Category:</label>
                    <select name="category" value={{$registeredEvents->category}}
                        class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value="Inactivo" selected hidden>{{$registeredEvents->category}}
                        </option>
                        <option class="text-black" value="Evento">Event</option>
                        <option class="text-black" value="Tarea">Homework</option>
                        <option class="text-black" value="Comunicado">communicate</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">State:</label>
                    <select name="state" value={{$registeredEvents->state}}
                        class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value="Inactivo" selected hidden>{{$registeredEvents->state}}
                        </option>
                        <option class="text-black" value="Inactivo">Inactive</option>
                        <option class="text-black" value="Activo">Active</option>
                    </select>
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

    </script>
</div>
@endsection