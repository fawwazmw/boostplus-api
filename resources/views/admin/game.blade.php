<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Game - Top Up Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-64 bg-blue-900 text-white shadow-md flex flex-col justify-between min-h-screen">
            <!-- Logo/Header -->
            <div>
                <div class="p-4 flex items-center justify-center border-b border-blue-800 relative">
                    <!-- Tombol Back di pojok kiri -->
                    <a href="{{ route('home') }}" class="absolute left-4 text-white hover:text-yellow-400 transition">
                        <i class="fas fa-arrow-left"></i>
                    </a>

                    <!-- Judul tengah -->
                    <h1 class="text-xl font-bold">TopUp<span class="text-yellow-400">Games</span></h1>
                </div>

                <!-- Menu -->
                <nav class="p-4">
                    <div class="mb-6">
                        <p class="text-xs uppercase text-blue-300 mb-2">Menu Utama</p>
                        <ul>
                            <li class="mb-1">
                                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-blue-800 rounded flex items-center">
                                    <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('admin.transaksi') }}" class="block py-2 px-4 hover:bg-blue-800 rounded flex items-center">
                                    <i class="fas fa-exchange-alt mr-3"></i> Transaksi
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('admin.game') }}" class="block py-2 px-4 bg-blue-800 rounded flex items-center">
                                    <i class="fas fa-gamepad mr-3"></i> Game
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('admin.data') }}" class="block py-2 px-4 hover:bg-blue-800 rounded flex items-center">
                                    <i class="fas fa-users mr-3"></i> Pengguna
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-6">
                        <p class="text-xs uppercase text-blue-300 mb-2">Laporan</p>
                        <ul>
                            <li class="mb-1">
                                <a href="#" class="block py-2 px-4 hover:bg-blue-800 rounded flex items-center">
                                    <i class="fas fa-chart-line mr-3"></i> Statistik
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="#" class="block py-2 px-4 hover:bg-blue-800 rounded flex items-center">
                                    <i class="fas fa-file-invoice-dollar mr-3"></i> Laporan Keuangan
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
            @include('admin.partials.header')

            <div class="container mx-auto px-4 py-8">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Daftar Akun Game</h1>
                    <a href="" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-plus mr-2"></i> Tambah Akun
                    </a>
                </div>

                <!-- Filter dan Search -->
                <div class="bg-white rounded-lg shadow p-4 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Filter Game</label>
                            <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Semua Game</option>
                                <option value="Mobile Legends">Mobile Legends</option>
                                <option value="Free Fire">Free Fire</option>
                                <option value="Genshin Impact">Genshin Impact</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cari Nickname</label>
                            <div class="relative">
                                <input type="text" placeholder="Cari nickname..." class="w-full border-gray-300 rounded-md shadow-sm pl-10 focus:border-blue-500 focus:ring-blue-500">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md w-full">
                                Terapkan Filter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tabel Akun Game -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Game</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Akun</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nickname</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($akunGames as $akunGame)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $akunGame->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img src="https://via.placeholder.com/40" alt="{{ $akunGame->nama_game }}" class="w-8 h-8 rounded mr-3">
                                            <span>{{ $akunGame->nama_game }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $akunGame->id_akun }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $akunGame->nickname }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900 mr-3"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Menampilkan
                                    <span class="font-medium">{{ $akunGames->firstItem() }}</span>
                                    sampai
                                    <span class="font-medium">{{ $akunGames->lastItem() }}</span>
                                    dari
                                    <span class="font-medium">{{ $akunGames->total() }}</span>
                                    hasil
                                </p>
                            </div>
                            <div>
                                {{ $akunGames->links() }} <!-- Pagination Links -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
