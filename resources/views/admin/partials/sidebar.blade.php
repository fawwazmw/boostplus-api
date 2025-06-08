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
                        <a href="#" class="block py-2 px-4 bg-blue-800 rounded flex items-center">
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
