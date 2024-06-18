@extends('.layout')
@section('content')

<div class="bg-white shadow-lg rounded-lg p-6 h-[100%]">
    <div class="flex justify-between mr-4">
        <h2 class="text-2xl font-semibold mb-4">Edit Event</h2>
        <a href="{{ route('events.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back" class="size-10"></a>
    </div>

    <div class="flex justify-between items-center">
        <p class="text-gray-600 mb-6">A page where you can edit events' information by changing their first name, last name, email and additional features.
        </p>
    </div>
    <div class="overflow-x-auto">
        <form method="POST" action="{{ route('events.update', $registeredEvents->id) }}">
            @method('PUT')
            @csrf
            <div
                class="bg-white px-6 py-3 shadow-lg rounded-lg grid grid-cols-2 justify-center items-center gap-8 w-full">

                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">title:</label>
                    <input name="title" value={{$registeredEvents->title}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Username">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Description:</label>
                    <input name="description" value={{$registeredEvents->description}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Last name">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Start:</label>
                    <input name="start" value={{$registeredEvents->start}} type="date" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Email">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">End:</label>
                    <input name="end" value={{$registeredEvents->end}} type="date" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                    placeholder="Enter the disease">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Start-Time:</label>
                    <input name="startTime" value={{$registeredEvents->startTime}} type="time" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Choose the Password">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">End-Time:</label>
                    <input name="endTime" value={{$registeredEvents->endTime}} type="time" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the number of sleep hours ">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Category:</label>
                    <select name="category" value={{$registeredEvents->category}} class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value="Inactivo" selected hidden>{{$registeredEvents->category}}</option>
                        <option class="text-black" value="Evento">Event</option>
                        <option class="text-black" value="Tarea">Homework</option>
                        <option class="text-black" value="Comunicado">communicate</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">State:</label>
                    <select name="state" value={{$registeredEvents->state}} class="bg-gray-100 h-[4rem] pl-3 rounded-2xl w-[38rem]">
                        <option class="text-gray-400" value="Inactivo" selected hidden>{{$registeredEvents->state}}</option>
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
</div>
@endsection