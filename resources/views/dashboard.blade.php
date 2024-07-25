<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased m-10">
    <div class="inline-flex">
        <p>Welcome {{ $user->name}}</p>

        <a href="{{ url('/create') }}" class="ml-5">
            <button type="button" class="rounded-md bg-blue-500 text-white font-bold py-1 px-2">
                Create
            </button>
        </a>

        <a href="{{ url('/logout') }}" class="ml-5">
            <button type="button" class="rounded-md bg-blue-500 text-white font-bold py-1 px-2">
                Logout
            </button>
        </a>
    </div>


    @if (session('status'))
        <div class="status-alert bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">{{session('status')}}</p>
            {{-- <p>Something not ideal might be happening.</p> --}}
        </div>
    @endif

    <table class="min-w-full bg-white border mt-5 border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50">Student ID</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50">Name</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50">Role</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50">Edit</th>
                <th class="py-2 px-4 border-b border-gray-200 bg-gray-50">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b border-gray-200 text-center">{{ $student->idno }}</td>
                    <td class="py-2 px-4 border-b border-gray-200 text-center">{{ $student->name }}</td>
                    <td class="py-2 px-4 border-b border-gray-200 text-center">{{ $student->usertype }}</td>
                    <td class="py-2 px-4 border-b border-gray-200 text-center">
                        <a href="{{'/students/'.$student->id}}" class="rounded-md bg-indigo-500 text-white font-bold py-1 px-2">Update</a>
                    </td>
                    <td class="py-2 px-4 border-b border-gray-200 text-center">
                        <form action="{{ url('/students/'.$student->id) }}" method="POST" class="inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="rounded-md bg-red-500 text-white font-bold py-1 px-2">
                                Delete
                            </button>
                        </form>
                    </td>                
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        setTimeout(() => {
            const elements = document.querySelectorAll('.status-alert');
            elements.forEach((element) => {
                element.style.transition = 'opacity 0.5s';
                element.style.opacity = '0';
                setTimeout(() => {
                    element.style.display = 'none';
                }, 500); 
            });
        }, 3000);
    </script>
</body>
</html>