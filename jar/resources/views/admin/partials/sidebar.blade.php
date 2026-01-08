<!-- Sidebar -->
<aside id="sidebar" class="w-64 bg-gray-900 text-white flex-shrink-0 transition-transform duration-300 ease-in-out lg:translate-x-0 -translate-x-full fixed lg:relative h-full z-30 flex flex-col">
    <!-- Logo Section -->
    <div class="p-6 border-b border-gray-800">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-cube text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold text-white">Rental Platform</h1>
                <p class="text-xs text-gray-400">Admin Panel</p>
            </div>
        </div>
    </div>
    
    <!-- Navigation Menu -->
    <nav class="flex-1 overflow-y-auto p-4 scrollbar-hide">
        <ul class="space-y-2">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="sidebar-menu-item flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                    <i class="fas fa-tachometer-alt w-5 mr-3 text-center"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Users Management -->
            <li>
                <a href="{{ route('admin.users.index') }}" 
                   class="sidebar-menu-item flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                    <i class="fas fa-users w-5 mr-3 text-center"></i>
                    <span>Users</span>
                </a>
            </li>

            <!-- Users Sub-menu -->
            <li class="pl-8">
                <div class="space-y-1">
                    <a href="{{ route('admin.users.index') }}?type=renter" 
                       class="sidebar-menu-item flex items-center px-4 py-2 text-sm text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                        <i class="fas fa-user w-4 mr-2 text-center"></i>
                        <span>Renters</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}?type=lender" 
                       class="sidebar-menu-item flex items-center px-4 py-2 text-sm text-gray-400 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                        <i class="fas fa-store w-4 mr-2 text-center"></i>
                        <span>Lenders</span>
                    </a>
                </div>
            </li>

            <!-- Products -->
            <li>
                <a href="{{ route('admin.products.index') }}" 
                   class="sidebar-menu-item flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                    <i class="fas fa-box w-5 mr-3 text-center"></i>
                    <span>Products</span>
                </a>
            </li>

            <!-- Categories -->
            <li>
                <a href="{{ route('admin.categories.index') }}" 
                   class="sidebar-menu-item flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                    <i class="fas fa-th-large w-5 mr-3 text-center"></i>
                    <span>Categories</span>
                </a>
            </li>

            <!-- Orders -->
            <li>
                <a href="{{ route('admin.orders.index') }}" 
                   class="sidebar-menu-item flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                    <i class="fas fa-shopping-cart w-5 mr-3 text-center"></i>
                    <span>Orders</span>
                    <span class="ml-auto bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">{{ \App\Models\Order::where('status','pending')->count() }}</span>
                </a>
            </li>





            <!-- Reports & Analytics -->
            <li>
                <a href="{{ route('admin.reports.index') }}" 
                   class="sidebar-menu-item flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                    <i class="fas fa-chart-bar w-5 mr-3 text-center"></i>
                    <span>Reports & Analytics</span>
                </a>
            </li>

            <!-- Divider -->
            <li class="border-t border-gray-700 pt-4 mt-4">
                <div class="px-4">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Administration</p>
                </div>
            </li>

            <!-- Admin Users -->
            <li>
                <a href="{{ route('admin.admins.index') }}" 
                   class="sidebar-menu-item flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                    <i class="fas fa-user-shield w-5 mr-3 text-center"></i>
                    <span>Admin Users</span>
                </a>
            </li>

            <!-- Roles & Permissions -->
            <li>
                <a href="{{ route('admin.roles.index') }}" 
                   class="sidebar-menu-item flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                    <i class="fas fa-user-tag w-5 mr-3 text-center"></i>
                    <span>Roles & Permissions</span>
                </a>
            </li>

            <!-- Settings -->
            <li>
                <a href="{{ route('admin.settings.index') }}" 
                   class="sidebar-menu-item flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white rounded-lg transition-colors duration-200">
                    <i class="fas fa-cog w-5 mr-3 text-center"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Footer -->
    <div class="p-4 border-t border-gray-800">
        <div class="text-xs text-gray-400 text-center">
            <p>&copy; 2024 Rental Platform</p>
            <p class="mt-1">Version 1.0.0</p>
        </div>
    </div>
</aside>

<!-- Mobile Overlay -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden"></div>
