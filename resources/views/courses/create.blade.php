@extends('.layout')
@section('content')
<div>
    <div class="p-6">
        <div class="flex justify-between mr-4">
            <h2 class="text-2xl font-semibold mb-4">Add Courses</h2>
            <a href="{{ route('courses.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back"
                    class="size-10"></a>
        </div>
        <div class="flex justify-between items-center">
            <p class="text-gray-600 mb-2">A page where you can create courses by adding their first name, last name,
                email
                and extra features.
            </p>
        </div>
    </div>
    <div class="overflow-x-auto">

        <form id="courseForm" method="POST" action="{{ route('courses.store') }}">
            @csrf
            <div
                class="flex flex-col bg-white px-6 py-3 shadow-lg rounded-lg grid-cols-2 justify-center items-center gap-8 w-full overflow-y-auto h-[100%]">
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Initial:</label>
                    <input name="initial" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the initials of the course">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Name:</label>
                    <input name="name" type="text" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Enter the Name of the course">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-black mb-4">Description:</label>
                    <textarea name="description" class="bg-gray-100 h-[4rem] p-4 rounded-2xl w-[38rem]"
                        placeholder="Choose the description"></textarea>
                </div>
                <div>
                    <label class="text-black mb-4">Students:</label>
                    <div class="flex-col bg-gray-100 p-4 rounded-2xl w-[38rem] space-y-2">
                        @foreach ($students as $student)
                            <div>
                                <input type="checkbox" name="students[]" id="student{{$student->id}}" value="{{$student->id}}">
                                <label for="student{{$student->id}}">{{$student->id}} | {{$student->name}} {{$student->lastname}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-end mr-4 col-span-2">
                    <button type="submit"
                        class="my-2 w-[10rem] bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">Add
                        course
                    </button>
                </div>
            </div>
        </form>
        <div>

        </div>
    </div>




    <script>
        // Script del manejo del input de tipo file y la vista previa de la imagen
        document.getElementById('fileInputTrigger').addEventListener('click', function () {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function (event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('fileInputTrigger').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</div>
</div>
@endsection