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
                <option value="7" {{ $dateRange == '7' ? 'selected' : '' }}>Last 7 days</option>
                <option value="30" {{ $dateRange == '30' ? 'selected' : '' }}>Last 30 days</option>
                <option value="90" {{ $dateRange == '90' ? 'selected' : '' }}>Last 90 days</option>
                <option value="365" {{ $dateRange == '365' ? 'selected' : '' }}>Last year</option>
            </select>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition-colors duration-200">
                <i class="fas fa-search mr-2"></i>
                Generate
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
                <p class="text-2xl font-bold text-gray-900">${{ number_format($totalRevenue, 2) }}</p>
                <p class="text-xs {{ $revenueGrowth >= 0 ? 'text-green-600' : 'text-red-600' }} mt-1">
                    <i class="fas fa-arrow-{{ $revenueGrowth >= 0 ? 'up' : 'down' }} mr-1"></i>
                    {{ number_format(abs($revenueGrowth), 1) }}% from previous period
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
                <p class="text-2xl font-bold text-gray-900">{{ number_format($totalOrders) }}</p>
                <p class="text-xs {{ $ordersGrowth >= 0 ? 'text-green-600' : 'text-red-600' }} mt-1">
                    <i class="fas fa-arrow-{{ $ordersGrowth >= 0 ? 'up' : 'down' }} mr-1"></i>
                    {{ number_format(abs($ordersGrowth), 1) }}% from previous period
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
                <p class="text-2xl font-bold text-gray-900">{{ number_format($totalActiveUsers) }}</p>
                <p class="text-xs {{ $usersGrowth >= 0 ? 'text-green-600' : 'text-red-600' }} mt-1">
                    <i class="fas fa-arrow-{{ $usersGrowth >= 0 ? 'up' : 'down' }} mr-1"></i>
                    {{ number_format(abs($usersGrowth), 1) }}% new users growth
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
                <p class="text-2xl font-bold text-gray-900">{{ number_format($activeProducts) }}</p>
                <p class="text-xs {{ $productsGrowth >= 0 ? 'text-green-600' : 'text-red-600' }} mt-1">
                    <i class="fas fa-arrow-{{ $productsGrowth >= 0 ? 'up' : 'down' }} mr-1"></i>
                    {{ number_format(abs($productsGrowth), 1) }}% new products growth
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
        </div>
        <div class="h-64 bg-gray-50 rounded-lg p-2">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <!-- Orders by Status -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Orders by Status</h3>
        </div>
        <div class="h-64 bg-gray-50 rounded-lg p-2 flex justify-center">
            <canvas id="ordersStatusChart"></canvas>
        </div>
    </div>

    <!-- Top Products -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Top Products</h3>
        </div>
        <div class="h-64 bg-gray-50 rounded-lg p-2">
            <canvas id="topProductsChart"></canvas>
        </div>
    </div>

    <!-- User Activity -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">New Registrations</h3>
        </div>
        <div class="h-64 bg-gray-50 rounded-lg p-2">
            <canvas id="userActivityChart"></canvas>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: @json($revenueChart['labels']),
                datasets: [{
                    label: 'Revenue',
                    data: @json($revenueChart['data']),
                    borderColor: '#4F46E5',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                }
            }
        });

        // Orders Status Chart
        const ordersStatusCtx = document.getElementById('ordersStatusChart').getContext('2d');
        new Chart(ordersStatusCtx, {
            type: 'doughnut',
            data: {
                labels: @json($ordersStatusChart['labels']),
                datasets: [{
                    data: @json($ordersStatusChart['data']),
                    backgroundColor: ['#F59E0B', '#10B981', '#EF4444', '#6B7280'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });

        // Top Products Chart
        const topProductsCtx = document.getElementById('topProductsChart').getContext('2d');
        new Chart(topProductsCtx, {
            type: 'bar',
            data: {
                labels: @json($topProductsChart['labels']),
                datasets: [{
                    label: 'Orders',
                    data: @json($topProductsChart['data']),
                    backgroundColor: '#10B981',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // User Activity Chart
        const userActivityCtx = document.getElementById('userActivityChart').getContext('2d');
        new Chart(userActivityCtx, {
            type: 'line',
            data: {
                labels: @json($userActivityChart['labels']),
                datasets: [{
                    label: 'New Registrations',
                    data: @json($userActivityChart['data']),
                    borderColor: '#8B5CF6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    });
</script>
@endpush
