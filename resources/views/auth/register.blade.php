<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - GameTopUp</title>
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
                <div class="relative hidden md:block">
                    <input type="text" placeholder="Cari game..." class="bg-indigo-800 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 w-64">
                    <button class="absolute right-3 top-2.5 text-gray-300 hover:text-white">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <a href="/cart" class="relative hover:text-indigo-300 transition">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    <span class="absolute -top-2 -right-2 bg-yellow-500 text-black text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">3</span>
                </a>
                <a href="{{ route('login') }}" class="bg-indigo-700 hover:bg-indigo-600 px-4 py-2 rounded-lg transition">Login</a>
                <a href="{{ route('register') }}" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg transition">Register</a>
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
        </div>
    </div>

    <!-- Konten Utama -->
    <main class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-indigo-900 mb-2">
                    <i class="fas fa-user-plus mr-2"></i>Buat Akun Baru
                </h1>
                <p class="text-gray-600">Isi form berikut untuk membuat akun baru</p>
            </div>

            <form action="{{ route('register') }}" method="POST" id="registerForm" class="space-y-6">
                @csrf <!-- Tambahkan ini -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" id="name" name="name"  required
                            class="pl-10 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Username">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email"  required
                            class="pl-10 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="email@example.com">
                    </div>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-phone text-gray-400"></i>
                        </div>
                        <input type="tel" id="phone" name="phone"  required
                            class="pl-10 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="0812-3456-7890">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" required
                            class="pl-10 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="••••••••">
                        <button type="button" id="togglePassword" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Minimal 8 karakter</p>
                </div>

                <div>
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="confirmPassword" name="password_confirmation" required
                            class="pl-10 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        Saya menyetujui <a href="#" class="text-indigo-600 hover:text-indigo-500">Syarat & Ketentuan</a> dan <a href="#" class="text-indigo-600 hover:text-indigo-500">Kebijakan Privasi</a>
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-700 hover:bg-indigo-600 text-white py-3 px-4 rounded-lg font-medium transition duration-300">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </button>

                <div class="text-center text-sm text-gray-600">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500 font-medium">Masuk disini</a>
                </div>
            </form>

        </div>
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


    

    <script>

        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });

document.getElementById('registerForm').addEventListener('submit', function(e) {
    // Validasi client-side
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    if (password !== confirmPassword) {
        alert('Password dan konfirmasi password tidak sama!');
        e.preventDefault();
        return;
    }
    
    // Jika validasi OK, biarkan form submit normal
    // Tidak perlu e.preventDefault() di sini
});

    </script>


</body>
</html>