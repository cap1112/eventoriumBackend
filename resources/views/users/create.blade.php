@extends('.layout')
@section('content')
<div>
    <div class="m-4">

        <h2 class="text-2xl font-semibold">Users</h2>
    <div class="flex justify-between items-center">
        <p class="text-gray-600 mb-6">A list of all the users in your account including their name, title, email and
            role.
        </p>
    </div>
</div>
    <div class="bg-white p-6 shadow-lg rounded-lg h-[100%] grid justify-between grid-cols-2 gap-8 items-center w-full">

        <div class="flex flex-col">
            <label for="" class="text-black">Username:</label>
            <input type="text" class=" bg-slate-200 rounded-2xl">
        </div>
        <div class="flex flex-col">
            <label for="" class="text-black">LastName:</label>
            <input type="text" class=" bg-slate-200 rounded-2xl">
        </div>
        <div class="flex flex-col">
            <label for="" class="text-black">email:</label>
            <input type="text" class=" bg-slate-200 rounded-2xl">
        </div>
        <div class="flex flex-col">
            <label for="" class="text-black">profile:</label>
            <input type="text" class=" bg-slate-200 rounded-2xl">
        </div>
        <div class="flex flex-col">
            <label for="" class="text-black">diseases:</label>
            <input type="text" class=" bg-slate-200 rounded-2xl">
        </div>
        <div class="flex flex-col">
            <label for="" class="text-black ">sleep_hours:</label>
            <input type="text" class=" bg-slate-200 rounded-2xl">
        </div>
        <button class="mb-4 bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Add user</button>
    </div>

</div>
@endsection