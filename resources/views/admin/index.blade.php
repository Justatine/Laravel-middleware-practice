<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Only admin</h1>
    <p>Welcome {{ $user->name }}</p>
    <a href="{{ url('/logout') }}" class="ml-5">
        <button type="button" class="rounded-md bg-blue-500 text-white font-bold py-1 px-2">
            Logout
        </button>
    </a>
</body>
</html>