<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="m-10">
    <div class="container w-50 border">
        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>

        @if ($errors->any())
            <div class="bg-red-200 p-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="email" class="block">Email:</label>
                <input type="email" name="email" id="email" class="border border-gray-300 p-1">
            </div>

            <div class="mb-5">
                <label for="password" class="block">Password:</label>
                <input type="password" name="password" class="border border-gray-300 p-1">
            </div>

            <button type="submit" class="rounded bg-blue-800 text-white px-4 py-2">Log in</button>
        </form>
    </div>
</body>
</html>