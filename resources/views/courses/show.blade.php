@extends('.layout')
@section('content')
<div class="p-6">
    <div class="px-4 sm:px-0 flex justify-between mr-4">
        <h3 class="text-2xl font-semibold mb-4">Course Information</h3>
        <a href="{{ route('courses.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back"
                class="size-10"></a>
    </div>
    <div class="mt-6 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">ID</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$course->id}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Initial</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$course->initial}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Name</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$course->name}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Description</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$course->description}}</dd>
            </div>
        </dl>
    </div>
    <div class="overflow-x-auto overflow-y-auto h-[40vh]">
        <dt class="text-md font-medium leading-6 my-2 text-gray-900">Matriculated Students List</dt>
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
                                    src="{{ asset("icons/details_icon.svg") }}" alt="Show item" class="size-8"></a>
                        </td>

                        <td class="py-2 px-4 border-t"><a href="{{ route('users.edit', $user->id) }}"><img
                                    src="{{ asset('icons/users_edit_icon.svg') }}" alt="Edit item" class="size-8"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection