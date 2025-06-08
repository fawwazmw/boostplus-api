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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
<!-- Navbar -->
<nav class="bg-indigo-900 text-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold flex items-center">
            <i class="fas fa-gamepad mr-2"></i>
            TopUpKu
        </a>
        <div class="hidden md:flex space-x-6 items-center">
            <a href="{{ route('home') }}" class="hover:text-indigo-300 transition">Home</a>
            <a href="#games" class="hover:text-indigo-300 transition">Games</a>
            <a href="#topup" class="hover:text-indigo-300 transition">Top Up</a>
            <a href="#promo" class="hover:text-indigo-300 transition">Promo</a>
            <a href="#testimoni" class="hover:text-indigo-300 transition">Testimoni</a>
            <a href="{{ route('history') }}" class="hover:text-indigo-300 transition">Cek Histori</a>
        </div>
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
            <a href="#home" class="hover:bg-indigo-700 p-2 rounded flex items-center">
                <i class="fas fa-home mr-2"></i> Home
            </a>
            <a href="#games" class="hover:bg-indigo-700 p-2 rounded flex items-center">
                <i class="fas fa-gamepad mr-2"></i> Games
            </a>
            <a href="#topup" class="hover:bg-indigo-700 p-2 rounded flex items-center">
                <i class="fas fa-money-bill-wave mr-2"></i> Top Up
            </a>
            <a href="#promo" class="hover:bg-indigo-700 p-2 rounded flex items-center">
                <i class="fas fa-tag mr-2"></i> Promo
            </a>
            <a href="#testimoni" class="hover:bg-indigo-700 p-2 rounded flex items-center">
                <i class="fas fa-comment-alt mr-2"></i> Testimoni
            </a>
            <a href="#testimoni" class="hover:bg-indigo-700 p-2 rounded flex items-center">
                <i class="fas fa-comment-alt mr-2"></i> Cek Histori
            </a>
            <div class="border-t border-indigo-700 pt-2 mt-2">
                <a href="/login" class="block bg-indigo-700 hover:bg-indigo-600 p-2 rounded text-center">Login</a>
                <a href="/register" class="block bg-yellow-500 hover:bg-yellow-400 text-gray-900 p-2 rounded text-center mt-2">Register</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section id="home" class="bg-gradient-to-r from-indigo-900 via-purple-800 to-indigo-900 text-white py-16 px-4 text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-0 left-0 w-full h-full bg-repeat" style="background-image: url('https://www.transparenttextures.com/patterns/dark-stripes.png');"></div>
            </div>
            <div class="relative max-w-6xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in">Top Up Game Favoritmu Lebih Cepat & Murah!</h1>
                <p class="text-lg md:text-xl text-gray-300 mb-8">Nikmati pengalaman top up game seperti Mobile Legends, Free Fire, dan Genshin Impact dalam hitungan detik!</p>
                <div class="flex flex-wrap justify-center gap-4 mb-8">
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg border border-white/20">
                        <i class="fas fa-bolt text-yellow-400 text-2xl mb-2"></i>
                        <p class="font-semibold">Proses Cepat</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg border border-white/20">
                        <i class="fas fa-shield-alt text-green-400 text-2xl mb-2"></i>
                        <p class="font-semibold">100% Aman</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg border border-white/20">
                        <i class="fas fa-percentage text-blue-400 text-2xl mb-2"></i>
                        <p class="font-semibold">Harga Terbaik</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg border border-white/20">
                        <i class="fas fa-headset text-purple-400 text-2xl mb-2"></i>
                        <p class="font-semibold">CS 24 Jam</p>
                    </div>
                </div>
                <a href="#topup" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold py-3 px-8 rounded-lg transition inline-flex items-center">
                    Top Up Sekarang <i class="fas fa-arrow-down ml-2"></i>
                </a>
            </div>
        </section>

        <!-- Quick Top Up Form -->
        <section id="topup" class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg -mt-12 relative z-10 mb-16 mx-4">
            <h2 class="text-2xl font-bold mb-6 text-indigo-900 flex items-center">
                <i class="fas fa-money-bill-wave mr-2 text-indigo-700"></i> Top Up Sekarang
            </h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <!-- Form Top Up -->
 <form action="{{ route('transaksi.store') }}" method="POST" class="grid gap-4">
    @csrf

    <!-- Pilih Game -->
    <d<form action="{{ route('transaksi.store') }}" method="POST" class="grid gap-4">
    @csrf

    <!-- Pilih Game -->
    <div>
        <label for="game" class="block text-sm font-medium text-gray-700 mb-1">Pilih Game</label>
        <select id="game" name="game" required
            class="block w-full border-gray-300 rounded-md shadow-sm py-2 pl-3 pr-10 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">-- Pilih Game --</option>
            <option value="Mobile Legends">Mobile Legends</option>
            <option value="Free Fire">Free Fire</option>
            <option value="Genshin Impact">Genshin Impact</option>
            <option value="Valorant">Valorant</option>
            <option value="PUBG Mobile">PUBG Mobile</option>
            <option value="League of Legends: Wild Rift">League of Legends: Wild Rift</option>
        </select>
    </div>

    <!-- Player ID -->
    <div>
        <label for="player_id" class="block text-sm font-medium text-gray-700 mb-1">Player ID</label>
        <input type="text" id="player_id" name="player_id" placeholder="Masukkan ID Pemain" required
            class="block w-full border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
        <p class="text-xs text-gray-500 mt-1">Contoh: MLG123</p>
    </div>

    <!-- Hidden Inputs -->
    <input type="hidden" name="diamond" id="diamondInput" required>
    <input type="hidden" name="price" id="priceInput" required>

    <!-- Pilih Nominal -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Nominal</label>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
            <button type="button" class="choose-diamond border border-gray-300 rounded-md p-3 text-center hover:border-indigo-500 hover:bg-indigo-50 transition"
                data-diamond="86" data-price="20000">
                <p class="font-semibold">86 Diamonds</p>
                <p class="text-sm text-gray-600">Rp 20.000</p>
            </button>
            <button type="button" class="choose-diamond border border-gray-300 rounded-md p-3 text-center hover:border-indigo-500 hover:bg-indigo-50 transition"
                data-diamond="172" data-price="40000">
                <p class="font-semibold">172 Diamonds</p>
                <p class="text-sm text-gray-600">Rp 40.000</p>
            </button>
            <button type="button" class="choose-diamond border border-gray-300 rounded-md p-3 text-center hover:border-indigo-500 hover:bg-indigo-50 transition"
                data-diamond="257" data-price="60000">
                <p class="font-semibold">257 Diamonds</p>
                <p class="text-sm text-gray-600">Rp 60.000</p>
            </button>
        </div>
    </div>

    <!-- Syarat dan Ketentuan -->
    <div class="flex items-center">
        <input id="agree" type="checkbox" name="agree" required
            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
        <label for="agree" class="ml-2 block text-sm text-gray-700">
            Saya menyetujui <a href="#" class="text-indigo-600 hover:text-indigo-500">Syarat & Ketentuan</a>
        </label>
    </div>

    <!-- Submit -->
    <button type="submit"
        class="bg-indigo-700 hover:bg-indigo-600 text-white font-bold py-3 rounded-lg transition flex items-center justify-center">
        <i class="fas fa-shopping-cart mr-2"></i> Lanjutkan Pembayaran
    </button>
</form>


<!-- JavaScript untuk menangani pilihan -->
<script>
    document.querySelectorAll('.choose-diamond').forEach(button => {
        button.addEventListener('click', function () {
            const diamond = this.getAttribute('data-diamond');
            const price = this.getAttribute('data-price');

            document.getElementById('diamondInput').value = diamond;
            document.getElementById('priceInput').value = price;

            document.querySelectorAll('.choose-diamond').forEach(btn => {
                btn.classList.remove('border-indigo-500', 'bg-indigo-50');
            });
            this.classList.add('border-indigo-500', 'bg-indigo-50');
        });
    });
</script>



                </div>
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <h3 class="font-bold text-lg mb-4 flex items-center">
                        <i class="fas fa-info-circle text-indigo-700 mr-2"></i> Panduan Top Up
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-indigo-100 text-indigo-800 rounded-full h-6 w-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                1
                            </div>
                            <p>Pilih game dan masukkan ID Player/Nickname Anda</p>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-indigo-100 text-indigo-800 rounded-full h-6 w-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                2
                            </div>
                            <p>Pilih jumlah Diamond/Item yang ingin dibeli</p>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-indigo-100 text-indigo-800 rounded-full h-6 w-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                3
                            </div>
                            <p>Pilih metode pembayaran (Transfer Bank, E-Wallet, QRIS, dll)</p>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-indigo-100 text-indigo-800 rounded-full h-6 w-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                4
                            </div>
                            <p>Selesaikan pembayaran dan Diamond akan masuk secara otomatis dalam 1-5 menit</p>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <h4 class="font-bold mb-2">Butuh Bantuan?</h4>
                        <p class="text-sm mb-3">Hubungi Customer Service kami yang siap membantu 24 jam</p>
                        <a href="#" class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-comment-dots mr-2"></i> Live Chat
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Games -->
        <section id="games" class="py-12 px-4 max-w-6xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-indigo-900">
                    <i class="fas fa-gamepad mr-2"></i> Game Populer
                </h2>
                <a href="#" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                    Lihat Semua <i class="fas fa-chevron-right ml-1"></i>
                </a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200?text=Mobile+Legends" alt="Mobile Legends" class="w-full h-32 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-2">
                            <h3 class="text-white font-semibold">Mobile Legends</h3>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span class="text-sm font-bold text-indigo-700">Rp 10.000</span>
                        </div>
                        <a href="#" class="block text-center bg-indigo-100 text-indigo-700 hover:bg-indigo-200 py-1 rounded text-sm font-medium transition">
                            Top Up Sekarang
                        </a>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200?text=Free+Fire" alt="Free Fire" class="w-full h-32 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-2">
                            <h3 class="text-white font-semibold">Free Fire</h3>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span class="text-sm font-bold text-indigo-700">Rp 10.000</span>
                        </div>
                        <a href="#" class="block text-center bg-indigo-100 text-indigo-700 hover:bg-indigo-200 py-1 rounded text-sm font-medium transition">
                            Top Up Sekarang
                        </a>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200?text=Genshin+Impact" alt="Genshin Impact" class="w-full h-32 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-2">
                            <h3 class="text-white font-semibold">Genshin Impact</h3>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span class="text-sm font-bold text-indigo-700">Rp 25.000</span>
                        </div>
                        <a href="#" class="block text-center bg-indigo-100 text-indigo-700 hover:bg-indigo-200 py-1 rounded text-sm font-medium transition">
                            Top Up Sekarang
                        </a>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200?text=Valorant" alt="Valorant" class="w-full h-32 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-2">
                            <h3 class="text-white font-semibold">Valorant</h3>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span class="text-sm font-bold text-indigo-700">Rp 25.000</span>
                        </div>
                        <a href="#" class="block text-center bg-indigo-100 text-indigo-700 hover:bg-indigo-200 py-1 rounded text-sm font-medium transition">
                            Top Up Sekarang
                        </a>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200?text=PUBG+Mobile" alt="PUBG Mobile" class="w-full h-32 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-2">
                            <h3 class="text-white font-semibold">PUBG Mobile</h3>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span class="text-sm font-bold text-indigo-700">Rp 15.000</span>
                        </div>
                        <a href="#" class="block text-center bg-indigo-100 text-indigo-700 hover:bg-indigo-200 py-1 rounded text-sm font-medium transition">
                            Top Up Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Payment Methods -->
        <section class="py-12 bg-gray-50">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-indigo-900 mb-8">
                    <i class="fas fa-credit-card mr-2"></i> Metode Pembayaran
                </h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm flex items-center justify-center">
                        <img src="https://via.placeholder.com/100x60?text=Bank+Transfer" alt="Bank Transfer" class="h-10">
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm flex items-center justify-center">
                        <img src="https://via.placeholder.com/100x60?text=Gopay" alt="Gopay" class="h-10">
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm flex items-center justify-center">
                        <img src="https://via.placeholder.com/100x60?text=OVO" alt="OVO" class="h-10">
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm flex items-center justify-center">
                        <img src="https://via.placeholder.com/100x60?text=Dana" alt="Dana" class="h-10">
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm flex items-center justify-center">
                        <img src="https://via.placeholder.com/100x60?text=QRIS" alt="QRIS" class="h-10">
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm flex items-center justify-center">
                        <img src="https://via.placeholder.com/100x60?text=ShopeePay" alt="ShopeePay" class="h-10">
                    </div>
                </div>
            </div>
        </section>

        <!-- Promo Section -->
        <section id="promo" class="py-12 px-4 max-w-6xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-indigo-900">
                    <i class="fas fa-tag mr-2"></i> Promo Spesial
                </h2>
                <a href="#" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                    Lihat Semua <i class="fas fa-chevron-right ml-1"></i>
                </a>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl overflow-hidden shadow-lg text-white">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="bg-white/20 text-xs px-2 py-1 rounded-full">NEW</span>
                                <h3 class="text-xl font-bold mt-2">Cashback 10%</h3>
                                <p class="text-sm opacity-90 mt-1">Untuk semua metode pembayaran</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs">Berlaku hingga</p>
                                <p class="font-bold">31 Des 2025</p>
                            </div>
                        </div>
                        <button class="mt-4 bg-white text-indigo-700 hover:bg-gray-100 font-medium py-2 px-4 rounded-lg text-sm transition">
                            Klaim Sekarang
                        </button>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-amber-500 to-yellow-500 rounded-xl overflow-hidden shadow-lg text-white">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="bg-white/20 text-xs px-2 py-1 rounded-full">HOT</span>
                                <h3 class="text-xl font-bold mt-2">Bonus Diamond 20%</h3>
                                <p class="text-sm opacity-90 mt-1">Min. pembelian 100k</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs">Berlaku hingga</p>
                                <p class="font-bold">15 Des 2025</p>
                            </div>
                        </div>
                        <button class="mt-4 bg-white text-amber-700 hover:bg-gray-100 font-medium py-2 px-4 rounded-lg text-sm transition">
                            Klaim Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section id="testimoni" class="py-12 bg-gray-50">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-indigo-900 mb-8">
                    <i class="fas fa-comment-alt mr-2"></i> Kata Pelanggan
                </h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-800 font-bold mr-3">A</div>
                            <div>
                                <h4 class="font-semibold">Andi Pratama</h4>
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">"Prosesnya cepat banget, ga nyangka diamond ML langsung masuk dalam 2 menit. Recommended banget!"</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-800 font-bold mr-3">S</div>
                            <div>
                                <h4 class="font-semibold">Siti Rahayu</h4>
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">"CS nya ramah dan membantu banget pas saya salah input ID. Harganya juga lebih murah dibanding tempat lain."</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-800 font-bold mr-3">B</div>
                            <div>
                                <h4 class="font-semibold">Budi Santoso</h4>
                                <div class="flex text-yellow-400 text-sm">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">"Udah langganan 2 tahun disini, selalu puas. Bonus promonya juga sering bikin hemat."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-12 px-4 max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-indigo-900 mb-8">
                <i class="fas fa-question-circle mr-2"></i> Pertanyaan Umum
            </h2>
            <div class="space-y-4 max-w-3xl mx-auto">
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-toggle w-full text-left p-4 bg-gray-50 hover:bg-gray-100 transition flex justify-between items-center">
                        <span class="font-medium">Berapa lama proses top up biasanya?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-4 bg-white">
                        <p class="text-gray-600">Proses top up biasanya memakan waktu 1-5 menit setelah pembayaran berhasil. Namun untuk beberapa game tertentu bisa lebih cepat (kurang dari 1 menit) atau lebih lama (maksimal 30 menit) tergantung kondisi server game.</p>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-toggle w-full text-left p-4 bg-gray-50 hover:bg-gray-100 transition flex justify-between items-center">
                        <span class="font-medium">Bagaimana jika diamond tidak masuk?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-4 bg-white">
                        <p class="text-gray-600">Jika diamond tidak masuk dalam waktu 30 menit, silakan hubungi Customer Service kami via Live Chat dengan menyertakan bukti pembayaran. Tim kami akan segera memproses dan membantu menyelesaikan masalah Anda.</p>
                    </div>
                </div>
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-toggle w-full text-left p-4 bg-gray-50 hover:bg-gray-100 transition flex justify-between items-center">
                        <span class="font-medium">Apakah ada biaya tambahan?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-4 bg-white">
                        <p class="text-gray-600">Tidak ada biaya tambahan sama sekali. Harga yang tertera sudah final termasuk semua biaya administrasi. Anda hanya perlu membayar sesuai nominal yang dipilih.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

     <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-gamepad mr-2"></i> TopUpKU
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

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
    </script>
@endif

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
   

</body>
</html>