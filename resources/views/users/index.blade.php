@extends('.layout')
@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 h-[100%]">
    <h2 class="text-2xl font-semibold mb-4">Users</h2>
    <div class="flex justify-between items-center">
        <p class="text-gray-600 mb-6">A list of all the users including their id, name, title, email and
            role.
        </p>
        <a href="{{ route('users.create') }}">
            <button class="mb-4 bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Add user</button>
        </a>
    </div>
    @if ($message = Session::get('success'))
        <div class="p-4 mb-4 text-md font-medium border text-gray-600 rounded-lg bg-gray-100 text-center">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="overflow-x-auto overflow-y-auto h-[80vh]">
        <table class="min-w-full bg-white" id="userTableContainer">
            <thead class="bg-gray-100 text-center">
                <tr>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">ID</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Name</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Last Name</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Profile</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Email</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>
                    <th class="py-2 px-4 text-md text-left text-gray-600 font-medium"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registeredUsers as $user)
                    <tr>
                        <td class="py-2 px-4 border-t">{{ $user->id }}</td>
                        <td class="py-2 px-4 border-t">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-t">{{ $user->lastname }}</td>
                        <td class="py-2 px-4 border-t">{{ $user->profile }}</td>
                        <td class="py-2 px-4 border-t">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-t"><a href="{{ route('users.show', $user->id) }}"><img
                                    src="{{ asset("icons/details_icon.svg") }}" alt="Show item" class="size-8"></a></td>

                        <td class="py-2 px-4 border-t"><a href="{{ route('users.edit', $user->id) }}"><img
                                    src="{{ asset('icons/users_edit_icon.svg') }}" alt="Edit item" class="size-8"></a>
                        </td>
                        <td class="py-2 px-4 border-t text-gray-500">
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <img src="{{ asset('icons/delete_icon.svg') }}" alt="Remove item" class="size-8">
                        </td>
                        </button>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
