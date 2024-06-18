@extends('.layout')
@section('content')
<div class="p-6" >
    <div class="px-4 sm:px-0">
        <h3 class="text-2xl font-semibold mb-4"">User Information</h3>
        <!-- <p class="text-gray-600 text-md mb-6">Personal details</p> -->
    </div>
    <div class="mt-6 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">ID</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->id}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Full name</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->name . ' ' . $user->lastname}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Email</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->email}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Password</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->password}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Profile</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->profile}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Diseases</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->diseases}}</dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-md font-medium leading-6 text-gray-900">Creation Date</dt>
                <dd class="mt-1 text-md leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->created_at}}</dd>
            </div>
        </dl>
    </div>
</div>
@endsection