@extends('.layout')
@section('content')
    <div class="bg-white shadow-lg rounded-lg p-6 h-[100%]">
        <h2 class="text-2xl font-semibold mb-4">Events</h2>
        <div class="flex justify-between items-center">
            <p class="text-gray-600 mb-6">A list of all the events in your account including their name, title, email and
                role.
            </p>

            <a href="{{ route('events.create') }}">
                <button class="mb-4 bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Add
                    event</button>
            </a>
        </div>
        @if ($message = Session::get('success'))
            <div class="p-4 mb-4 text-md font-medium border text-gray-600 rounded-lg bg-gray-100 text-center">
                <p>{{ $message }}</p>
            </div>
        @endif
        <input type="text" id="search" placeholder="Search events">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white" id="eventTableContainer">
                <thead class="bg-gray-100 text-center">
                    <tr>
                        <th class="py-2 px-4 text-left text-gray-600 font-medium">ID</th>
                        <th class="py-2 px-4 text-left text-gray-600 font-medium">Name</th>
                        <th class="py-2 px-4 text-left text-gray-600 font-medium">State</th>
                        <!-- <th class="py-2 px-4 text-left text-gray-600 font-medium">Category</th> -->

                        <!-- <th class="py-2 px-4 text-left text-gray-600 font-medium">Password</th> -->
                        <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>
                        <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>

                        <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registeredEvents as $event)
                        <tr>
                            <td class="py-2 px-4 border-t">{{ $event->id }}</td>
                            <td class="py-2 px-4 border-t">{{ $event->title }}</td>
                            <td class="py-2 px-4 border-t">{{ $event->state }}</td>
                            
                            <td class="py-2 px-4 border-t"><a href="{{ route('events.show',  $event->id) }}"><img src="{{ asset("icons/details_icon.svg") }}"
                            alt="Show item" class="size-8"></a></td>

                            <td class="py-2 px-4 border-t"><a href="{{ route('events.edit',  $event->id) }}"><img
                                        src="{{ asset('icons/events_edit_icon.svg') }}" alt="Edit item" class="size-8"></a>
                            </td>

                            <td class="py-2 px-4 border-t text-gray-500">
                                <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><img src="{{ asset('icons/delete_icon.svg') }}" alt="Edit item"
                                            class="size-8"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
