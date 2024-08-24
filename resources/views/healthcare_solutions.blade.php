<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EHR Analytics Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 dark:text-white text-gray-600 h-screen flex overflow-hidden text-sm">
    <div
        class="bg-white dark:bg-gray-900 dark:border-gray-800 w-20 flex-shrink-0 border-r border-gray-200 flex-col hidden sm:flex">
        <!-- Sidebar content (same as before) -->
        <div class="bg-navy w-20 flex-shrink-0 border-r border-gray-800 flex-col hidden sm:flex">
            <div class="h-16 flex items-center justify-center">
                <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
            </div>
            <div class="flex mx-auto flex-grow flex-col space-y-4 mt-4">
                <button class="h-10 w-12 rounded-md flex items-center justify-center text-blue-500 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </button>
                <button
                    class="h-10 w-12 rounded-md flex items-center justify-center text-gray-500 hover:text-blue-500 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </button>
                <button
                    class="h-10 w-12 rounded-md flex items-center justify-center text-gray-500 hover:text-blue-500 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                </button>
                <button
                    class="h-10 w-12 rounded-md flex items-center justify-center text-gray-500 hover:text-blue-500 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="flex-grow overflow-hidden h-full flex flex-col">
        <div class="h-16 lg:flex w-full border-b border-gray-200 dark:border-gray-800 hidden px-10">
            <div class="h-16 lg:flex w-full border-b border-gray-800 hidden px-10">
                <div class="flex h-full text-gray-400">
                    <a href="#"
                        class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center mr-8">Overview</a>
                    <a href="#"
                        class="cursor-pointer h-full border-b-2 border-blue-500 text-blue-500 inline-flex mr-8 items-center">Patient
                        Statistics</a>
                    <a href="#"
                        class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center mr-8">Department
                        Analytics</a>
                    <a href="#"
                        class="cursor-pointer h-full border-b-2 border-transparent inline-flex items-center">Financial
                        Metrics</a>
                </div>
                <div class="ml-auto flex items-center space-x-7">
                    <button class="h-8 px-3 rounded-md shadow text-white bg-blue-500">Generate Report</button>

                    <button class="flex items-center">
                        <span class="relative flex-shrink-0">
                            <img class="w-7 h-7 rounded-full"
                                src="https://images.unsplash.com/photo-1527613426441-4da17471b66d?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                alt="Dr. Jane Smith" />
                            <span
                                class="absolute right-0 -mb-0.5 bottom-0 w-2 h-2 rounded-full bg-green-500 border border-white"></span>
                        </span>
                        <span class="ml-2">Dr. Jane Smith</span>
                        <svg viewBox="0 0 24 24" class="w-4 ml-1 flex-shrink-0" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

        </div>

        <div class="flex-grow flex overflow-x-hidden">

            <div
                class="xl:w-72 w-48 flex-shrink-0 border-r border-gray-200 dark:border-gray-800 h-full overflow-y-auto lg:block hidden p-5">
                <!-- Sidebar content (same as before) -->
                <div class="text-xs text-gray-400 tracking-wider">QUICK ACCESS</div>
                <div class="relative mt-2">
                    <input type="text" class="pl-8 h-9 bg-gray-800 border border-gray-700 w-full rounded-md text-sm"
                        placeholder="Search patients" />
                    <svg viewBox="0 0 24 24"
                        class="w-4 absolute text-gray-400 top-1/2 transform translate-x-0.5 -translate-y-1/2 left-2"
                        stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <div class="space-y-4 mt-3">
                    <!-- Add quick access buttons or links here -->
                    <button class="bg-gray-800 p-3 w-full flex items-center rounded-md">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                            </path>
                        </svg>
                        New Patient
                    </button>
                    <button class="bg-gray-800 p-3 w-full flex items-center rounded-md">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Schedule Appointment
                    </button>
                    <button class="bg-gray-800 p-3 w-full flex items-center rounded-md">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                        View Reports
                    </button>
                </div>
               
            </div>
            <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto">
                <div
                    class="sm:px-7 sm:pt-7 px-4 pt-4 flex flex-col w-full border-b border-gray-200 bg-white dark:bg-gray-900 dark:text-white dark:border-gray-800 sticky top-0">
                    <div class="flex w-full items-center">
                        <div class="flex items-center text-3xl text-gray-900 dark:text-white">
                            <img src="https://assets.codepen.io/344846/internal/avatars/users/default.png?fit=crop&format=auto&height=512&version=1582611188&width=512"
                                class="w-12 mr-4 rounded-full" alt="profile" />
                            Analytics Dashboard
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 sm:mt-7 mt-4">
                        <a href="#"
                            class="px-3 border-b-2 border-blue-500 text-blue-500 dark:text-white dark:border-white pb-1.5">Overview</a>
                        <a href="#"
                            class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5">Patient
                            Statistics</a>
                        <a href="#"
                            class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5 sm:block hidden">Department
                            Analytics</a>
                        <a href="#"
                            class="px-3 border-b-2 border-transparent text-gray-600 dark:text-gray-400 pb-1.5 sm:block hidden">Financial
                            Metrics</a>
                    </div>
                </div>
                <div class="sm:p-7 p-4">
                    <!-- KPI Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-white">Total Patients</h3>
                            <p class="text-3xl font-bold text-blue-500">1,234</p>
                            <p class="text-sm text-gray-500 mt-2">+5.2% from last month</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-white">Avg. Wait Time</h3>
                            <p class="text-3xl font-bold text-green-500">18 min</p>
                            <p class="text-sm text-gray-500 mt-2">-2 min from last week</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-white">Bed Occupancy</h3>
                            <p class="text-3xl font-bold text-yellow-500">78%</p>
                            <p class="text-sm text-gray-500 mt-2">+3% from yesterday</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-white">Staff on Duty</h3>
                            <p class="text-3xl font-bold text-purple-500">89</p>
                            <p class="text-sm text-gray-500 mt-2">Full capacity</p>
                        </div>
                    </div>

                    <!-- Charts -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Patient Admissions
                                (Last 7 Days)</h3>
                            <canvas id="admissionsChart"></canvas>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Department Workload
                            </h3>
                            <canvas id="departmentChart"></canvas>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Recent Patient Admissions
                        </h3>
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-gray-400">
                                    <th
                                        class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-700">
                                        Patient ID</th>
                                    <th
                                        class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-700">
                                        Name</th>
                                    <th
                                        class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-700 hidden md:table-cell">
                                        Department</th>
                                    <th
                                        class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-700">
                                        Admission Date</th>
                                    <th
                                        class="font-normal px-3 pt-0 pb-3 border-b border-gray-200 dark:border-gray-700">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 dark:text-gray-100">
                                <!-- Sample table rows -->
                                <tr>
                                    <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                                        <div class="flex items-center">P-12345</div>
                                    </td>
                                    <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">John Doe
                                    </td>
                                    <td
                                        class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800 md:table-cell hidden">
                                        Cardiology</td>
                                    <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                                        2023-09-15</td>
                                    <td class="sm:p-3 py-2 px-1 border-b border-gray-200 dark:border-gray-800">
                                        <div class="flex items-center">
                                            <div class="sm:flex hidden flex-col">
                                                <div class="text-green-500">Admitted</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- More rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Admissions Chart
        var admissionsCtx = document.getElementById('admissionsChart').getContext('2d');
        var admissionsChart = new Chart(admissionsCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Admissions',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Department Workload Chart
        var departmentCtx = document.getElementById('departmentChart').getContext('2d');
        var departmentChart = new Chart(departmentCtx, {
            type: 'bar',
            data: {
                labels: ['ER', 'ICU', 'Cardiology', 'Neurology', 'Pediatrics'],
                datasets: [{
                    label: 'Patient Load',
                    data: [65, 59, 80, 81, 56],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
