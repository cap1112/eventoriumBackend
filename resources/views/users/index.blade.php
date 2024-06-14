@extends('.layout')
@section('content')

<div class="bg-white shadow-lg rounded-lg p-6 h-[100%]">
    <h2 class="text-2xl font-semibold mb-4">Users</h2>
    <div class="flex justify-between items-center">
        <p class="text-gray-600 mb-6">A list of all the users in your account including their name, title, email and
            role.
        </p>
       <a href="{{route('users.create')}}">
           <button class="mb-4 bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Add user</button>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Name</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Profile</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Email</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Password</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-t">hola</td>
                    <td class="py-2 px-4 border-t">Front-end Developer</td>
                    <td class="py-2 px-4 border-t">lindsay.walton@example.com</td>
                    <td class="py-2 px-4 border-t">Member</td>
                    <td><a href=""><img src="{{ asset("icons/users_edit_icon.svg") }}" alt="Edit item" class="size-8"></a></td>
                    <td><a href=""><img src="{{ asset("icons/delete_icon.svg") }}" alt="Remove item" class="size-8"></a></td>
                </tr>


            </tbody>
        </table>
    </div>
</div>
@endsection