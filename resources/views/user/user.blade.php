<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Top Up Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
<!-- Sidebar -->
<div class="sidebar w-64 bg-blue-900 text-white shadow-md flex flex-col justify-between">
    <div>
<div class="p-4 flex items-center justify-between border-b border-blue-800">
    <!-- Ikon kembali di kiri -->
    <a href="{{ route('home') }}" class="text-white hover:text-yellow-400 transition">
        <i class="fas fa-arrow-left text-lg"></i>
    </a>
    
    <!-- Judul di tengah -->
    <h1 class="text-xl font-bold text-center flex-1">
        TopUp<span class="text-yellow-400">Games</span>
    </h1>

    <!-- Placeholder kosong untuk keseimbangan layout -->
    <div class="w-5"></div>
</div>

        <nav class="p-4">
            <div class="mb-6">
                <p class="text-xs uppercase text-blue-300 mb-2">Menu User</p>
                <ul>
                    <li class="mb-1">
                        <a href="{{ route('user.user') }}" class="block py-2 px-4 bg-blue-800 rounded flex items-center">
                            <i class="fas fa-home mr-3"></i> Dashboard
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{ route('user.update') }}" class="block py-2 px-4 hover:bg-blue-800 rounded flex items-center">
                            <i class="fas fa-user mr-3"></i> Profil Saya
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    
    <!-- Logout -->
    <div class="p-4 border-t border-blue-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left py-2 px-4 hover:bg-blue-800 rounded flex items-center">
                <i class="fas fa-sign-out-alt mr-3"></i> Logout
            </button>
        </form>
    </div>
</div>


        <div class="flex-1 flex flex-col overflow-hidden">
   <!-- Header -->
<header class="bg-white shadow-sm">
    <div class="flex justify-between items-center p-4">
        <div class="flex items-center">
            <button class="text-gray-500 focus:outline-none lg:hidden">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="flex items-center">
            <div class="relative mr-4">
                <button class="text-gray-500 focus:outline-none">
                    <i class="fas fa-bell"></i>
                </button>
                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
            </div>
            <div class="relative">
                <button class="flex items-center focus:outline-none">
                    <!-- Cek apakah pengguna memiliki avatar -->
                    <img class="h-8 w-8 rounded-full object-cover" 
                         src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=1e40af&color=fff' }}" 
                         alt="User Avatar">
                    <!-- Ganti nama pengguna dengan data dari Auth::user() -->
                    <span class="ml-2 text-gray-700 hidden md:block">{{ Auth::user()->name }}</span>
                </button>
            </div>
        </div>
    </div>
</header>


                    <!-- Main Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard User</h1>
      <p class="text-gray-600">Selamat datang kembali, {{ Auth::user()->name }}!</p>
    </div>

    <!-- Quick Actions dan Promo -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
        <!-- Top Up Game -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Top Up Game</h3>
            <div class="space-y-3">
                <a href="#" class="flex items-center p-2 hover:bg-gray-100 rounded">
                    <img src="https://via.placeholder.com/40" alt="Mobile Legends" class="w-8 h-8 rounded mr-3">
                    <span>Mobile Legends</span>
                </a>
                <a href="#" class="flex items-center p-2 hover:bg-gray-100 rounded">
                    <img src="https://via.placeholder.com/40" alt="Free Fire" class="w-8 h-8 rounded mr-3">
                    <span>Free Fire</span>
                </a>
                <a href="#" class="flex items-center p-2 hover:bg-gray-100 rounded">
                    <img src="https://via.placeholder.com/40" alt="Genshin Impact" class="w-8 h-8 rounded mr-3">
                    <span>Genshin Impact</span>
                </a>
            </div>
        </div>

        <!-- Promo Terbaru -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Promo Terbaru</h3>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                <p class="text-sm font-medium text-yellow-700">
                    <span class="font-bold">DISKON 10%</span> untuk top up Mobile Legends hari ini!
                </p>
            </div>
            <div class="mt-3 bg-blue-50 border-l-4 border-blue-400 p-4">
                <p class="text-sm font-medium text-blue-700">
                    <span class="font-bold">BONUS 5%</span> untuk top up pertama Genshin Impact
                </p>
            </div>
        </div>
    </div>

</main>

        </div>
    </div>

    
</body>
</html>