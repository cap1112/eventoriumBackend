@extends('.layout')
@section('content')
<div class="p-6">
    <div class="px-4 sm:px-0 flex justify-between mr-4">
        <h3 class="text-2xl font-semibold mb-4">Course Information</h3>
        <a href="{{ route('users.index') }}"><img src="{{ asset('icons/go_back_icon.svg') }}" alt="go back"
                class="size-10"></a>
    </div>
    <div class="mt-6 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">ID</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$course->id}}</dd>
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
    
</div>

@endsection