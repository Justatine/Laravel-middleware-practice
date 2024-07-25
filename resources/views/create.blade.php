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
<body class="antialiased m-10">
    @if (session('status'))
        <div class="status-alert bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">{{ session('status') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="error-alert bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
            <p class="font-bold">There were some problems with your input:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="text-3xl font-bold underline">Create Student</h1>    
    
    <form action="{{ url('/create') }}" method="POST" class="mt-5">
        @csrf
        <div class="mb-5">
            <label for="idno" class="block">ID number:</label>
            <input type="text" name="idno" id="idno" class="border border-gray-300 p-1">
        </div>

        <div class="mb-5">
            <label for="name" class="block">Name:</label>
            <input type="text" name="name" id="name" class="border border-gray-300 p-1">
        </div>

        <div class="mb-5">
            <label for="usertype" class="block">Role:</label>
            <select name="usertype" id="usertype" class="border border-gray-300 mb-3 p-2">
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="rounded bg-blue-800 text-white px-4 py-2">Create</button>

    </form>
</body>
</html>