<div class="w-64 bg-gradient-to-b from-gray-900 to-gray-700 text-white min-h-screen shadow-lg">
    <div class="p-6 ">
        <h1 class="text-2xl font-bold tracking-wide">Praktikum PWL</h1>
    </div>
    <nav class="mt-6">
        <ul>
            <li class="mb-3">
                <a href="{{ auth()->user()?->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="block py-3 px-6 rounded-lg {{ request()->routeIs('admin.dashboard') || request()->routeIs('user.dashboard') ? 'bg-gray-800' : 'hover:bg-gray-600' }} transition duration-300 flex items-center">
                    <i class="fas fa-gauge-high mr-3"></i> <span class="text-lg">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()?->role === 'admin')
            <li class="mb-3">
                <a href="{{ route('users.index') }}" class="block py-3 px-6 rounded-lg {{ request()->routeIs('users.*') ? 'bg-gray-800' : 'hover:bg-gray-600' }} transition duration-300 flex items-center">
                    <i class="fas fa-user mr-3"></i> <span class="text-lg">Users</span>
                </a>
            </li>
            <li class="mb-3">
                <a href="{{ route('products.index') }}" class="block py-3 px-6 rounded-lg {{ request()->routeIs('products.*') ? 'bg-gray-800' : 'hover:bg-gray-600' }} transition duration-300 flex items-center">
                    <i class="fas fa-box mr-3"></i> <span class="text-lg">Products</span>
                </a>
            </li>
            @endif
            <li class="mt-8 px-6">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full rounded-lg bg-red-600 px-4 py-2 text-left font-semibold text-white hover:bg-red-700">
                        <i class="fas fa-right-from-bracket mr-3"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</div>
