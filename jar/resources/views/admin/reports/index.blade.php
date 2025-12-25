@extends('admin.layouts.app')

@section('title', 'Reports & Analytics')
@section('page-title', 'Reports & Analytics')
@section('page-description', 'View comprehensive reports and analytics for your rental platform.')

@section('page-actions')
    <button class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200">
        <i class="fas fa-download mr-2"></i>
        Export Report
    </button>
@endsection

@section('content')
<!-- Date Range Selector -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
    <form method="GET" action="{{ route('admin.reports.index') }}" class="flex flex-wrap gap-4 items-end">
        <div class="min-w-[200px]">
            <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
            <select name="date_range" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option value="7" {{ request('date_range') == '7' ? 'selected' : '' }}>Last 7 days</option>
                <option value="30" {{ request('date_range') == '30' ? 'selected' : '' }}>Last 30 days</option>
                <option value="90" {{ request('date_range') == '90' ? 'selected' : '' }}>Last 90 days</option>
                <option value="365" {{ request('date_range') == '365' ? 'selected' : '' }}>Last year</option>
            </select>
        </div>
        
        <div class="min-w-[200px]">
            <label class="block text-sm font-medium text-gray-700 mb-1">Report Type</label>
            <select name="report_type" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option value="overview" {{ request('report_type') == 'overview' ? 'selected' : '' }}>Overview</option>
                <option value="revenue" {{ request('report_type') == 'revenue' ? 'selected' : '' }}>Revenue</option>
                <option value="products" {{ request('report_type') == 'products' ? 'selected' : '' }}>Products</option>
                <option value="users" {{ request('report_type') == 'users' ? 'selected' : '' }}>Users</option>
            </select>
        </div>
        
        <div class="flex gap-2">
            <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-search mr-2"></i>
                Generate
            </button>
            <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition-colors duration-200">
                <i class="fas fa-calendar mr-2"></i>
                Custom Date
            </button>
        </div>
    </form>
</div>

<!-- Key Metrics -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-blue-100 rounded-lg p-3">
                <i class="fas fa-dollar-sign text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Total Revenue</p>
                <p class="text-2xl font-bold text-gray-900">$45,678</p>
                <p class="text-xs text-green-600 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    18% from last month
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-green-100 rounded-lg p-3">
                <i class="fas fa-shopping-cart text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Total Orders</p>
                <p class="text-2xl font-bold text-gray-900">789</p>
                <p class="text-xs text-green-600 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    12% from last month
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-purple-100 rounded-lg p-3">
                <i class="fas fa-users text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Active Users</p>
                <p class="text-2xl font-bold text-gray-900">1,234</p>
                <p class="text-xs text-green-600 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    8% from last month
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-yellow-100 rounded-lg p-3">
                <i class="fas fa-box text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Active Products</p>
                <p class="text-2xl font-bold text-gray-900">456</p>
                <p class="text-xs text-red-600 mt-1">
                    <i class="fas fa-arrow-down mr-1"></i>
                    3% from last month
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Revenue Chart -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Revenue Trend</h3>
            <select class="text-sm border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option>Last 30 days</option>
                <option>Last 90 days</option>
                <option>Last year</option>
            </select>
        </div>
        <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
            <div class="text-center">
                <i class="fas fa-chart-line text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Revenue over time chart</p>
            </div>
        </div>
    </div>

    <!-- Orders by Status -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Orders by Status</h3>
            <button class="text-sm text-primary-600 hover:text-primary-700">
                View Details
            </button>
        </div>
        <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
            <div class="text-center">
                <i class="fas fa-chart-pie text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Order status distribution</p>
            </div>
        </div>
    </div>

    <!-- Top Products -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Top Products</h3>
            <button class="text-sm text-primary-600 hover:text-primary-700">
                View All
            </button>
        </div>
        <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
            <div class="text-center">
                <i class="fas fa-chart-bar text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Most rented products</p>
            </div>
        </div>
    </div>

    <!-- User Activity -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">User Activity</h3>
            <button class="text-sm text-primary-600 hover:text-primary-700">
                View Details
            </button>
        </div>
        <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
            <div class="text-center">
                <i class="fas fa-chart-area text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">User registration activity</p>
            </div>
        </div>
    </div>
</div>

<!-- Detailed Reports Table -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Recent Transactions</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Order ID
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Customer
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Amount
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Dec 24, 2024</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#ORD-001</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">John Doe</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$450.00</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Completed
                        </span>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Dec 23, 2024</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#ORD-002</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jane Smith</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$200.00</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Pending
                        </span>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Dec 22, 2024</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#ORD-003</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Bob Johnson</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$800.00</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Completed
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
