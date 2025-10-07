<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Opsional: Script sederhana untuk toggle sidebar di mobile -->
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar Kiri (Fixed, lebar 64) -->
    <aside id="sidebar" class="bg-gray-800 text-white w-64 min-h-screen p-4 fixed left-0 top-0 overflow-y-auto transition-transform duration-300 ease-in-out lg:translate-x-0" style="transform: translateX(0);">
        <!-- Logo/Header Sidebar -->
        <div class="mb-8">
            <h1 class="text-xl font-bold">Dashboard Produk</h1>
        </div>

        <!-- Navigasi Links -->
        <nav class="space-y-2">
            <a href="{{ route('products.index') }}" 
               class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('products.index') ? 'bg-blue-600' : 'hover:bg-gray-700' }} text-white">
                <span class="mr-3">📋</span> Daftar Produk
            </a>
            <a href="{{ route('products.create') }}" 
               class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('products.create') ? 'bg-blue-600' : 'hover:bg-gray-700' }} text-white">
                <span class="mr-3">➕</span> Tambah Produk
            </a>
            <!-- Tambahkan link lain jika perlu, misal: -->
            <!-- <a href="#" class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-700 text-white">Pengaturan</a> -->
        </nav>

        <!-- Tombol Toggle untuk Mobile (opsional, tampilkan di layar kecil) -->
        <button onclick="toggleSidebar()" class="lg:hidden absolute top-4 right-4 text-white">
            <span class="text-2xl">☰</span>
        </button>
    </aside>

    <!-- Overlay untuk Mobile (opsional, tutup sidebar saat klik luar) -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden" onclick="toggleSidebar()"></div>

    <!-- Main Content (Margin kiri untuk sidebar) -->
    <main class="flex-1 ml-64 p-6 lg:ml-64">
        {{-- <!-- Header Atas (Opsional) -->
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-2xl font-bold text-gray-800">@yield('header', 'Dashboard')</h2>
        </div> --}}

        <!-- Alert Success -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- Konten Halaman -->
        @yield('content')
    </main>
</body>
</html>
