<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Access Panel</title>
    @Vite('resources/css/app.css')

</head>

<body class="bg-slate-100">

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">


        <img class="m-4" src="{{ asset('icons/logoEventorium.svg') }}" alt="Logo">

        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-blue-950 text-center">
                    Sign in to your account
                </h1>

                <form class="space-y-4 md:space-y-6" action="{{ route('access.login') }}">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required="">
                    </div>
                    @if(session('error'))
                        <div class="text-red-600">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="rememberCheck" class="form-check-input"
                                    required>
                                <label for="remember" class="text-gray-500">Remember me</label>
                            </div>
                        </div>

                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                        in</button>

                </form>
            </div>
        </div>
    </div>

</body>

</html>