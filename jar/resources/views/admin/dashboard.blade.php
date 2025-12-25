@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Welcome back! Here\'s what\'s happening with your rental platform today.')

@section('page-actions')
    <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200">
        <i class="fas fa-download mr-2"></i>
        Export Report
    </button>
@endsection

@section('content')
<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Users -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-blue-100 rounded-lg p-3">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Total Users</p>
                <p class="text-2xl font-bold text-gray-900">1,234</p>
                <p class="text-xs text-green-600 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    12% from last month
                </p>
            </div>
        </div>
    </div>

    <!-- Active Products -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-green-100 rounded-lg p-3">
                <i class="fas fa-box text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Active Products</p>
                <p class="text-2xl font-bold text-gray-900">456</p>
                <p class="text-xs text-green-600 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    8% from last month
                </p>
            </div>
        </div>
    </div>

    <!-- Total Orders -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-yellow-100 rounded-lg p-3">
                <i class="fas fa-shopping-cart text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Total Orders</p>
                <p class="text-2xl font-bold text-gray-900">789</p>
                <p class="text-xs text-red-600 mt-1">
                    <i class="fas fa-arrow-down mr-1"></i>
                    3% from last month
                </p>
            </div>
        </div>
    </div>

    <!-- Revenue -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-purple-100 rounded-lg p-3">
                <i class="fas fa-dollar-sign text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Revenue</p>
                <p class="text-2xl font-bold text-gray-900">$45,678</p>
                <p class="text-xs text-green-600 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    18% from last month
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Orders Trend Chart -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Orders Trend</h3>
            <select class="text-sm border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option>Last 7 days</option>
                <option>Last 30 days</option>
                <option>Last 3 months</option>
            </select>
        </div>
        <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
            <div class="text-center">
                <i class="fas fa-chart-line text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Chart visualization would go here</p>
                <p class="text-sm text-gray-400 mt-2">Orders over time</p>
            </div>
        </div>
    </div>

    <!-- Revenue Chart -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Revenue Overview</h3>
            <select class="text-sm border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option>This Month</option>
                <option>Last Month</option>
                <option>This Year</option>
            </select>
        </div>
        <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
            <div class="text-center">
                <i class="fas fa-chart-bar text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Chart visualization would go here</p>
                <p class="text-sm text-gray-400 mt-2">Revenue breakdown</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Orders -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Recent Orders</h3>
            <a href="#" class="text-sm text-primary-600 hover:text-primary-700">
                View All
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider py-3">Order</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider py-3">Customer</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider py-3">Amount</th>
                        <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="py-3 text-sm text-gray-900">#ORD-001</td>
                        <td class="py-3 text-sm text-gray-900">John Doe</td>
                        <td class="py-3 text-sm text-gray-900">$125.00</td>
                        <td class="py-3">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Completed
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 text-sm text-gray-900">#ORD-002</td>
                        <td class="py-3 text-sm text-gray-900">Jane Smith</td>
                        <td class="py-3 text-sm text-gray-900">$89.00</td>
                        <td class="py-3">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Processing
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 text-sm text-gray-900">#ORD-003</td>
                        <td class="py-3 text-sm text-gray-900">Bob Johnson</td>
                        <td class="py-3 text-sm text-gray-900">$200.00</td>
                        <td class="py-3">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                Pending
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
        <div class="space-y-3">
            <a href="#" 
               class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-user-plus text-primary-600 mr-3"></i>
                <span class="text-gray-700">Add New User</span>
            </a>
            <a href="#" 
               class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-plus-circle text-primary-600 mr-3"></i>
                <span class="text-gray-700">Add New Product</span>
            </a>
            <a href="#" 
               class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-file-invoice text-primary-600 mr-3"></i>
                <span class="text-gray-700">Generate Report</span>
            </a>
            <a href="#" 
               class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-bullhorn text-primary-600 mr-3"></i>
                <span class="text-gray-700">Send Notification</span>
            </a>
        </div>
    </div>
</div>
@endsection
