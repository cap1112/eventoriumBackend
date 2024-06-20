@extends('.layout')
@section('content')
    <div class="bg-white shadow-lg rounded-lg p-6 h-[100%]">
        <div class="flex justify-between mr-4">
            <h2 class="text-2xl font-semibold mb-4">Edit Course</h2>
            <a href="{{ route('courses.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back"
                    class="size-10"></a>
        </div>

        <div class="flex justify-between items-center">
            <p class="text-gray-600 mb-6">A page where you can edit courses' information by changing their first name, last
                name, email and additional features.
            </p>
        </div>
        <div class="overflow-x-auto">
            <form id="courseForm" method="POST" action="{{ route('courses.update', $registeredCourses->id) }}">
                @method('PUT')
                @csrf
                <div
                    class="bg-white px-6 py-3 shadow-lg rounded-lg grid grid-cols-2 justify-center items-center gap-8 w-full">
                    <div class="flex flex-col">
                        <label for="" class="text-black mb-4">Name:</label>
                        <input name="name" value={{ $registeredCourses->name }} type="text"
                            class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]" placeholder="Enter the Name">
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="text-black mb-4">Description:</label>
                        <input name="description" value={{ $registeredCourses->description }} type="text"
                            class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]" placeholder="Choose the description">
                    </div>
                    <div class="flex justify-end mr-4 col-span-2">
                        <button type="submit"
                            class="my-2 w-[10rem] bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Update
                            course</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
