<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna - Top Up Game</title>
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
                        <a href="{{ route('admin.game') }}" class="block py-2 px-4 hover:bg-blue-800 rounded flex items-center">
                            <i class="fas fa-gamepad mr-3"></i> Game
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{ route('admin.data') }}" class="block py-2 px-4 bg-blue-800 rounded flex items-center">
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

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <div class="mb-6 flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Data Pengguna</h1>
                        <p class="text-gray-600">Daftar seluruh pengguna sistem</p>
                    </div>
                </div>

                <!-- Tabel Pengguna -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-800">Daftar Pengguna</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Bergabung</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ucfirst($user->role ?? 'user') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
    @if($user->created_at)
        {{ $user->created_at->format('Y-m-d') }}
    @else
        N/A
    @endif
</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @include('admin.partials.scripts')
</body>
</html>
