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

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-900 text-white shadow-md flex flex-col justify-between">
            <div>
                <div class="p-4 flex items-center justify-between border-b border-blue-800">
                    <a href="{{ route('home') }}" class="text-white hover:text-yellow-400 transition">
                        <i class="fas fa-arrow-left text-lg"></i>
                    </a>
                    <h1 class="text-xl font-bold text-center flex-1">
                        TopUp<span class="text-yellow-400">Games</span>
                    </h1>
                    <div class="w-5"></div>
                </div>

                <nav class="p-4">
                    <p class="text-xs uppercase text-blue-300 mb-2">Menu User</p>
                    <ul>
                        <li class="mb-1">
                            <a href="{{ route('user.user') }}" class="block py-2 px-4 hover:bg-blue-800 rounded flex items-center">
                                <i class="fas fa-home mr-3"></i> Dashboard
                            </a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('user.update') }}" class="block py-2 px-4 bg-blue-800 rounded flex items-center ">
                                <i class="fas fa-user mr-3"></i> Profil Saya
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="p-4 border-t border-blue-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 px-4 hover:bg-blue-800 rounded flex items-center">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Konten Profil -->
        <main class="flex-1 overflow-y-auto p-6">
            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Kartu Info User -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">Profil Saya</h2>
                            <p class="text-sm text-gray-500">Informasi dasar akun</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-user text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <ul class="text-gray-700 space-y-2">
                        <li><strong>Nama:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                        <li><strong>Dibuat pada:</strong> {{ $user->created_at->format('d M Y') }}</li>
                    </ul>
                </div>

                <!-- Form Update Profil -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Perbarui Profil</h2>

                    @if(session('success'))
                        <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('user.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-600 text-sm mb-1">Nama</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-600 text-sm mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
                            Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
