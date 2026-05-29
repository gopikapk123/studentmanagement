<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
 <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="min-h-screen">

        <header class="bg-slate-800 text-white p-4">
            <h1 class="text-2xl font-bold">
                Student Management System
            </h1>
        </header>

        <main class="p-6">
            @yield('content')
        </main>

        <footer class="bg-slate-800 text-white text-center p-4">
            Footer Section
        </footer>

    </div>

</body>
</html>