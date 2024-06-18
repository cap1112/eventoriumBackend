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
        <form method="POST" action="{{ route('users.update', $registeredUsers->id) }}">
            @method('PUT')
            @csrf
            <div
                class="bg-white px-6 py-3 shadow-lg rounded-lg grid grid-cols-2 justify-center items-center gap-8 w-full">

                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Username:</label>
                    <input name="name" value={{$registeredUsers->name}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Username">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Last name:</label>
                    <input name="lastname" value={{$registeredUsers->lastname}} type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Last name">
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