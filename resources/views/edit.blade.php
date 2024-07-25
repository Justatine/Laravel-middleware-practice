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
    <h1 class="text-3xl font-bold underline">Edit Student</h1>
    <a href="{{url('/dashboard')}}">
        <button type="button" class="rounded-md bg-blue-500 text-white font-bold py-1 px-2">
            Back
        </button>
    </a>    
    
    <form action="{{ url('/students/'.$students->id) }}" method="POST" class="mt-5">
        @csrf
        <div class="mb-5">
            <label for="idno" class="block">ID number:</label>
            <input type="text" name="idno" id="idno" class="border border-gray-300 p-1" value="{{$students->idno}}">
        </div>

        <div class="mb-5">
            <label for="name" class="block">Name:</label>
            <input type="text" name="name" id="name" class="border border-gray-300 p-1" value="{{$students->name}}">
        </div>

        <div class="mb-5">
            <label for="usertype" class="block">Role:</label>
            <select name="usertype" id="usertype" class="border border-gray-300 mb-3 p-2">
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="rounded bg-blue-800 text-white px-4 py-2">Update</button>

    </form>
</body>
</html>