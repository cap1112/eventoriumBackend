@extends('.layout')
@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 h-[100%]">
    <h2 class="text-2xl font-semibold mb-4">courses</h2>
    <div class="flex justify-between items-center">
        <p class="text-gray-600 mb-6">A list of all the courses in your account including their name, title, email and
            role.
        </p>
        <a href="{{route('courses.create')}}">
            <button class="mb-4 bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Add course</button>
        </a>
    </div>
    <input type="text" id="search" placeholder="Search courses">
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white" id="courseTableContainer">
            <thead class="bg-gray-100 text-center">
                <tr>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">ID</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Name</th>

                    <!-- <th class="py-2 px-4 text-left text-gray-600 font-medium">Password</th> -->
                    <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($registeredCourses as $course)
                    <tr>
                        <td class="py-2 px-4 border-t">{{ $course->id }}</td>
                        <td class="py-2 px-4 border-t">{{ $course->name }}</td>
                        

                        <!-- <td class="py-2 px-4 border-t">{{ $course->password }}</td> -->
                        <td class="py-2 px-4 border-t"><a href=""><img src="{{ asset("icons/events_edit_icon.svg") }}"
                                    alt="Edit item" class="size-8"></a></td>
                        <td class="py-2 px-4 border-t text-gray-500"><a href=""><img
                                    src="{{ asset("icons/delete_icon.svg") }}" alt="Remove item" class="size-8"></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection