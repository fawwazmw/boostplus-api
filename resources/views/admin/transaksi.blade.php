<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Top Up Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-64 bg-blue-900 text-white shadow-md flex flex-col justify-between min-h-screen">
            <!-- Header Logo -->
            <div>
                <div class="p-4 flex items-center justify-center border-b border-blue-800 relative">
                    <!-- Tombol Back -->
                    <a href="{{ route('home') }}" class="absolute left-4 text-white hover:text-yellow-400 transition">
                        <i class="fas fa-arrow-left"></i>
                    </a>

                    <!-- Judul -->
                    <h1 class="text-xl font-bold">TopUp<span class="text-yellow-400">Games</span></h1>
                </div>

                <!-- Menu Navigasi -->
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
                                <a href="#" class="block py-2 px-4 bg-blue-800 rounded flex items-center">
                                    <i class="fas fa-exchange-alt mr-3"></i> Transaksi
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('admin.game') }}" class="block py-2 px-4 hover:bg-blue-800 rounded flex items-center">
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

        <!-- Konten Utama -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            @include('admin.partials.header')

            <!-- Container -->
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">History Transaksi</h1>
        <form method="GET" class="relative">
            <input type="text" name="search" placeholder="Cari transaksi..." class="border-gray-300 rounded-md shadow-sm pl-10 pr-4 py-2 focus:border-blue-500 focus:ring-blue-500">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
        </form>
    </div>

    <!-- Filter Section -->
    <form method="GET" class="bg-white rounded-lg shadow p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Filter Game</label>
                <select name="game" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Semua Game</option>
                    <option value="Mobile Legends">Mobile Legends</option>
                    <option value="Free Fire">Free Fire</option>
                    <option value="Genshin Impact">Genshin Impact</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Semua Status</option>
                    <option value="success">Berhasil</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Gagal</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Dari Tanggal</label>
                <input type="date" name="tanggal_dari" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div class="flex items-end">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md w-full">
                    Terapkan Filter
                </button>
            </div>
        </div>
    </form>

    <!-- Tabel Transaction -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Game</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Akun</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($transaksi as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900 font-medium">#{{ $item->id }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="https://via.placeholder.com/40" class="w-8 h-8 rounded mr-3" alt="">
                                <span>{{ $item->akunGame->nama_game ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $item->id_akun }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusColor = match($item->status) {
                                    'success' => 'bg-green-100 text-green-800',
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'failed' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100 text-gray-800',
                                };
                            @endphp
                            <span class="px-2 inline-flex text-xs font-semibold rounded-full {{ $statusColor }}">
                                <i class="fas fa-circle mr-1"></i> {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y, H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">Tidak ada transaksi ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div class="text-sm text-gray-700">
                Menampilkan
                <span class="font-medium">{{ $transaksi->firstItem() }}</span>
                sampai
                <span class="font-medium">{{ $transaksi->lastItem() }}</span>
                dari
                <span class="font-medium">{{ $transaksi->total() }}</span> transaksi
            </div>
            <div>
                {{ $transaksi->links() }}
            </div>
        </div>
    </div>
</div>
        </div>
    </div>

</body>
</html>
