<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Tailwind Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- MAIN WRAPPER -->
    <div class="flex flex-col min-h-screen">

        <!-- HEADER -->
        <header class="bg-slate-800 text-white px-6 py-4 flex justify-between items-center shadow">

            <h1 class="text-2xl font-bold">
                Student Management
            </h1>

            <div class="flex items-center gap-3">
                <span>Welcome Admin</span>

                <img 
                    src="https://i.pravatar.cc/100" 
                    class="w-10 h-10 rounded-full border-2 border-white"
                    alt="Profile"
                >
            </div>

        </header>

        <!-- NAVBAR -->
        <nav class="bg-slate-700 text-white px-6 py-3">

            <ul class="flex gap-6 text-sm font-medium">

                <li>
                    <a href="#home" class="hover:text-cyan-400">
                        Home
                    </a>
                </li>

                <li>
                    <a href="#student" class="hover:text-cyan-400">
                        Student
                    </a>
                </li>

                <li>
                    <a href="#teacher" class="hover:text-cyan-400">
                        Teacher
                    </a>
                </li>

                <li>
                    <a href="#course" class="hover:text-cyan-400">
                        Course
                    </a>
                </li>
                
                <li>
                    <a href="#enrollment" class="hover:text-cyan-400">
                        Enrollment
                    </a>
                </li>

                <li>
                    <a href="#payment" class="hover:text-cyan-400">
                        Payment
                    </a>
                </li>

                <li>
                    <a href="#" class="hover:text-cyan-400">
                        Logout
                    </a>
                </li>

            </ul>

        </nav>

        <!-- MAIN CONTENT -->
        <div class="flex flex-1">

            <!-- SIDEBAR -->
            <aside class="w-64 bg-slate-900 text-white p-5 hidden md:block">

                <h2 class="text-xl font-bold mb-5">
                    Dashboard Menu
                </h2>

                <ul class="space-y-3">

                    <li>
                        <a href="#" class="block px-4 py-2 rounded hover:bg-slate-700">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/managestudents')}}" class="block px-4 py-2 rounded hover:bg-slate-700">
                            Manage Students
                        </a>
                    </li>

                    <li>
                        <a href="teachers" class="block px-4 py-2 rounded hover:bg-slate-700">
                            Teachers
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/managecourse')}}" class="block px-4 py-2 rounded hover:bg-slate-700">
                            Course
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/managebatch')}}" class="block px-4 py-2 rounded hover:bg-slate-700">
                            Batch
                        </a>
                    </li>

                    <li>
                        <a href="#" class="block px-4 py-2 rounded hover:bg-slate-700">
                            Payment
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 rounded hover:bg-slate-700">
                            Logout
                        </a>
                    </li>

                </ul>

            </aside>

            <!-- CONTENT AREA -->
            <main class="flex-1 p-6">

                <h2 class="text-3xl font-bold text-slate-800 mb-6">
                    Dashboard Overview
                </h2>

                <!-- CARDS -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <div class="bg-white rounded-xl shadow p-5">
                        <h3 class="text-gray-500 text-sm">
                            Total Users
                        </h3>

                        <p class="text-3xl font-bold mt-2">
                            1,250
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow p-5">
                        <h3 class="text-gray-500 text-sm">
                            Total Orders
                        </h3>

                        <p class="text-3xl font-bold mt-2">
                            320
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow p-5">
                        <h3 class="text-gray-500 text-sm">
                            Revenue
                        </h3>

                        <p class="text-3xl font-bold mt-2">
                            $12,500
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow p-5">
                        <h3 class="text-gray-500 text-sm">
                            Pending Requests
                        </h3>

                        <p class="text-3xl font-bold mt-2">
                            18
                        </p>
                    </div>

                </div>

            </main>

        </div>

        <!-- FOOTER -->
        <footer class="bg-slate-800 text-white text-center py-4">

            <p>
                © 2026 Laravel Dashboard. All Rights Reserved.
            </p>

        </footer>

    </div>

</body>
</html>