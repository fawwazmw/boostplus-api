<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopUpKu - Top Up Diamond, Voucher & Item Game</title>
    @vite('resources/css/app.css')
    <!-- Favicon -->
    <link rel="icon" href="https://images.seeklogo.com/logo-png/49/1/ps5-gamepad-on-hand-logo-png_seeklogo-497379.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-indigo-900 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="#home" class="text-2xl font-bold flex items-center">
                <i class="fas fa-gamepad mr-2"></i>
                TopUpKu
            </a>
            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('home') }}" class="hover:text-indigo-300 transition">Home</a>
                <a href="{{ route('home') }}" class="hover:text-indigo-300 transition">Games</a>
                <a href="{{ route('home') }}" class="hover:text-indigo-300 transition">Top Up</a>
                <a href="{{ route('home') }}" class="hover:text-indigo-300 transition">Promo</a>
                <a href="{{ route('home') }}" class="hover:text-indigo-300 transition">Testimoni</a>
                <a href="{{ route('history') }}" class="hover:text-indigo-300 transition">Cek Histori</a>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative hidden md:block">
            
                    <div class="flex items-center space-x-4">
            <!-- Cek apakah sudah login -->
            @auth
                <!-- Jika sudah login, tampilkan avatar -->
                <div class="relative">
                    <a href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('user.user') }}" class="flex items-center space-x-2 hover:text-indigo-300 transition">
                        <!-- Cek apakah pengguna memiliki avatar -->
                        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=1e40af&color=fff' }}" alt="Avatar" class="w-8 h-8 rounded-full">
                    </a>
                </div>
            @else
                <!-- Jika belum login, tampilkan tombol Login dan Register -->
                <a href="{{ route('login') }}" class="bg-indigo-700 hover:bg-indigo-600 px-4 py-2 rounded-lg transition">Login</a>
                <a href="{{ route('register') }}" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg transition">Register</a>
            @endauth
        </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Button -->
    <div class="md:hidden bg-indigo-800 p-2 text-center flex justify-between items-center px-4">
        <div class="relative w-full mr-2">
            <input type="text" placeholder="Cari game..." class="bg-indigo-700 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full">
            <button class="absolute right-3 top-2.5 text-gray-300 hover:text-white">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <button id="mobile-menu-button" class="text-white ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-indigo-800 text-white">
        <div class="flex flex-col space-y-2 p-4">
            <a href="{{ route('home') }}" class="hover:bg-indigo-700 p-2 rounded flex items-center">
                <i class="fas fa-home mr-2"></i> Home
            </a>
            <a href="{{ route('history') }}" class="hover:bg-indigo-700 p-2 rounded flex items-center">
                <i class="fas fa-comment-alt mr-2"></i> Cek Histori
            </a>
            <div class="border-t border-indigo-700 pt-2 mt-2">
                <a href="/login" class="block bg-indigo-700 hover:bg-indigo-600 p-2 rounded text-center">Login</a>
                <a href="/register" class="block bg-yellow-500 hover:bg-yellow-400 text-gray-900 p-2 rounded text-center mt-2">Register</a>
            </div>
        </div>
    </div>

    <!-- Konten Utama -->
    <main class="min-h-screen py-12 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold text-indigo-900 mb-8 flex items-center">
                <i class="fas fa-history mr-3"></i> Riwayat Transaksi
            </h1>

            <!-- Filter & Pencarian -->
            <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" placeholder="Cari ID Transaksi/Nickname..." class="border p-2 rounded-lg focus:outline-indigo-500">
                    <select class="border p-2 rounded-lg focus:outline-indigo-500">
                        <option value="">Semua Game</option>
                        <option>Mobile Legends</option>
                        <option>Free Fire</option>
                        <option>Genshin Impact</option>
                        <option>PUBG Mobile</option>
                        <option>Valorant</option>
                    </select>
                    <select class="border p-2 rounded-lg focus:outline-indigo-500">
                        <option value="">Semua Status</option>
                        <option>Berhasil</option>
                        <option>Pending</option>
                        <option>Gagal</option>
                    </select>
                </div>
            </div>

            <!-- Tabel Histori -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-indigo-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-indigo-900">ID Transaksi</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-indigo-900">Tanggal</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-indigo-900">Game</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-indigo-900">Nominal</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-indigo-900">Status</th>
                            </tr>
                        </thead>
                    <tbody class="divide-y divide-gray-200">
@forelse($transaksi as $transaction)
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 text-sm">TRX-00{{ $transaction->id }}</td>
            <td class="px-4 py-3 text-sm">
                {{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}<br>
                <span class="text-gray-500">{{ \Carbon\Carbon::parse($transaction->created_at)->format('H:i') }} WIB</span>
            </td>
            <td class="px-4 py-3">
                <div class="flex items-center">
                    <img src="{{ $transaction->game_icon_url ?? 'https://via.placeholder.com/40' }}" alt="{{ $transaction->game_name }}" class="h-8 w-8 rounded mr-2">
                    <span>{{ $transaction->nama_game }}</span>
                </div>
            </td>
            <td class="px-4 py-3 text-sm">
                {{ $transaction->item }}<br>
                <span class="text-gray-500">Rp {{ number_format($transaction->jumlah, 0, ',', '.') }}</span>
            </td>
            <td class="px-4 py-3">
                @php
                    $statusColor = [
                        'success' => 'bg-green-100 text-green-800',
                        'pending' => 'bg-yellow-100 text-yellow-800',
                        'failed' => 'bg-red-100 text-red-800'
                    ][$transaction->status] ?? 'bg-gray-100 text-gray-800';
                @endphp
                <span class="px-2 py-1 rounded-full {{ $statusColor }} text-xs font-medium">
                    <i class="fas fa-{{ $transaction->status == 'success' ? 'check' : ($transaction->status == 'pending' ? 'clock' : 'times') }}-circle mr-1"></i>
                    {{ $transaction->status }}
                </span>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="px-4 py-6 text-center text-gray-500">Belum ada transaksi.</td>
        </tr>
    @endforelse
</tbody>

                    </table>
                </div>

                <!-- Pagination -->
                <div class="border-t border-gray-200 px-4 py-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Menampilkan 1-4 dari 12 transaksi</span>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 rounded-lg bg-indigo-100 text-indigo-700 hover:bg-indigo-200">1</button>
                            <button class="px-3 py-1 rounded-lg hover:bg-gray-100">2</button>
                            <button class="px-3 py-1 rounded-lg hover:bg-gray-100">3</button>
                            <button class="px-3 py-1 rounded-lg hover:bg-gray-100">></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-gamepad mr-2"></i> TopUpKu
                    </h3>
                    <p class="text-gray-400">Platform top up game tercepat dan termurah dengan layanan pelanggan 24/7.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Layanan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Mobile Legends</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Free Fire</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Genshin Impact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">PUBG Mobile</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Bantuan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Cara Top Up</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Hubungi Kami</h4>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-gray-400"></i>
                            <span class="text-gray-400">support@gametopup.id</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone-alt mr-2 text-gray-400"></i>
                            <span class="text-gray-400">+62 812 3456 7890</span>
                        </div>
                        <div class="flex space-x-4 mt-4">
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>© 2025 GameTopUp. All rights reserved.</p>
            </div>
        </div>
    </footer>


</body>
</html>