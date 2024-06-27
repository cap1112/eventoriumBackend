@extends('.layout')
@section('content')
<div class="p-6">
    <div class="px-4 sm:px-0 flex justify-between mr-4">
        <h3 class="text-2xl font-semibold mb-4">Event Information</h3>
        <a href="{{ route('events.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back"
                class="size-10"></a>
    </div>
    <div class="mt-6 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">ID</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$event->id}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Title</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$event->title}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Description</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$event->description}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Start Date</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                    {{$event->start . ' ' . $event->startTime}}
                </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">End Date</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                    {{$event->end . ' ' . $event->endTime}}
                </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Category</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$event->category_name}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Image</dt>
                <img id="fileInputTrigger" src="{{ asset('storage/events_img/' . $event->image) }}" alt="Event Image"
                    class="cursor-pointer w-[10rem] h-[10rem] mr-[11rem] object-cover rounded-full border-4 border-gray-300">
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0"></dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">State</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$event->state}}</dd>
            </div>
            <div class="overflow-x-auto overflow-y-auto h-[40vh]">
                <h2 class="text-2xl font-semibold my-4">Enrolled students</h2>
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
                                            src="{{ asset('icons/users_edit_icon.svg') }}" alt="Edit item"
                                            class="size-8"></a>
                                </td>

                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </dl>
    </div>
</div>

@endsection