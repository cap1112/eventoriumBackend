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
    <input type="text" id="search" placeholder="Search users">
    <div class="overflow-x-auto overflow-y-auto h-[81vh]">
        <table class="min-w-full bg-white" id="userTableContainer">
            <thead class="bg-gray-100 text-center">
                <tr>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">ID</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Name</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Last Name</th>

                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Profile</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium">Email</th>
                    <!-- <th class="py-2 px-4 text-left text-gray-600 font-medium">Password</th> -->
                    <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($registeredUsers as $user)
                    <tr>
                        <td class="py-2 px-4 border-t">{{ $user->id }}</td>
                        <td class="py-2 px-4 border-t">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-t">{{ $user->lastname }}</td>
                        <td class="py-2 px-4 border-t">{{ $user->profile }}</td>
                        <td class="py-2 px-4 border-t">{{ $user->email }}</td>
                        <!-- <td class="py-2 px-4 border-t">{{ $user->password }}</td> -->
                        <td class="py-2 px-4 border-t"><a href=""><img src="{{ asset("icons/users_edit_icon.svg") }}"
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

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            console.log("Keyup event triggered");   
            var query = $(this).val();
            console.log("The query is: "+query);
            $.ajax({
                url: "{{ url('/users/search') }}",
                type: "GET",
                data: { 'search': query },
                success: function (data) {
                    console.log("The data is: "+data);
                    $('#userTableContainer').html(data);
                }
            })
        });
    });
</script> -->