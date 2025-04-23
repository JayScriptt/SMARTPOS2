<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection Lost</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slide-in-bck-center {
            0% {
                transform: translateZ(600px);
                opacity: 0;
            }

            100% {
                transform: translateZ(0);
                opacity: 1;
            }
        }

        body {
            animation: slide-in-bck-center 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-md w-full">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-red-600">Connection Lost</h1>
            <p class="text-gray-700 mt-4">We are unable to connect to the server at the moment. Please check your internet connection and try again.</p>
            <p class="text-gray-600 mt-2">If the problem persists, please contact support.</p>
            <a href="index.php" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Return to Main Page</a>
        </div>
    </div>
</body>

</html>