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
                <p class="text-2xl font-bold text-gray-900">{{ number_format($kpis['total_users'] ?? 0) }}</p>
                <p class="text-xs text-green-600 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    {{-- change % calculation can be added later --}}
                    &nbsp;
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
                <p class="text-2xl font-bold text-gray-900">{{ number_format($kpis['active_products'] ?? 0) }}</p>
                <p class="text-xs text-green-600 mt-1">
                    &nbsp;
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
                <p class="text-2xl font-bold text-gray-900">{{ number_format($kpis['total_orders'] ?? 0) }}</p>
                <p class="text-xs text-gray-600 mt-1">
                    Pending: <strong>{{ $kpis['pending_orders'] ?? 0 }}</strong>
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
                <p class="text-2xl font-bold text-gray-900">${{ number_format($kpis['revenue'] ?? 0, 2) }}</p>
                <p class="text-xs text-green-600 mt-1">
                    &nbsp;
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
            <select id="ordersPeriod" class="text-sm border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option value="7" {{ $period == '7' ? 'selected' : '' }}>Last 7 days</option>
                <option value="30" {{ $period == '30' ? 'selected' : '' }}>Last 30 days</option>
                <option value="90" {{ $period == '90' ? 'selected' : '' }}>Last 3 months</option>
            </select>
        </div>
        <div class="h-64 bg-gray-50 rounded-lg p-4">
            <canvas id="ordersChart" class="w-full h-56"></canvas>
        </div>
    </div>

    <!-- Revenue Chart -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Revenue Overview</h3>
            <select id="revenuePeriod" class="text-sm border border-gray-300 rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option value="30">This Month</option>
                <option value="60">Last 2 Months</option>
                <option value="365">This Year</option>
            </select>
        </div>
        <div class="h-64 bg-gray-50 rounded-lg p-4">
            <canvas id="revenueChart" class="w-full h-56"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ordersChartData = @json($ordersChart);
    const revenueData = {
        labels: ordersChartData.labels,
        values: ordersChartData.values // fallback — can be replaced with revenue breakdown
    };

    const ordersCtx = document.getElementById('ordersChart');
    if (ordersCtx) {
        new Chart(ordersCtx, {
            type: 'line',
            data: {
                labels: ordersChartData.labels,
                datasets: [{
                    label: 'Orders',
                    data: ordersChartData.values,
                    backgroundColor: 'rgba(59,130,246,0.1)',
                    borderColor: 'rgba(59,130,246,1)',
                    borderWidth: 2,
                    tension: 0.4,
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    }

    const revenueCtx = document.getElementById('revenueChart');
    if (revenueCtx) {
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: revenueData.labels,
                datasets: [{
                    label: 'Revenue',
                    data: revenueData.values,
                    backgroundColor: 'rgba(99,102,241,0.8)'
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    }

    // Period change will reload the page with selected period
    document.getElementById('ordersPeriod')?.addEventListener('change', function() {
        const v = this.value;
        const params = new URLSearchParams(window.location.search);
        params.set('period', v);
        window.location.search = params.toString();
    });
</script>
@endpush

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
                    @forelse($recentOrders as $order)
                        <tr>
                            <td class="py-3 text-sm text-gray-900">{{ $order->order_number ?? ('#ORD-'.str_pad($order->id, 3, '0', STR_PAD_LEFT)) }}</td>
                            <td class="py-3 text-sm text-gray-900">{{ $order->user->name ?? '—' }}</td>
                            <td class="py-3 text-sm text-gray-900">${{ number_format($order->total_amount ?? 0, 2) }}</td>
                            <td class="py-3">
                                @php
                                    $status = $order->status ?? 'pending';
                                    $statusClasses = [
                                        'completed' => 'bg-green-100 text-green-800',
                                        'processing' => 'bg-yellow-100 text-yellow-800',
                                        'pending' => 'bg-blue-100 text-blue-800',
                                        'cancelled' => 'bg-red-100 text-red-800',
                                    ];
                                @endphp
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClasses[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-6 text-center text-gray-500">No recent orders</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
        <div class="space-y-3">
            <a href="{{ route('admin.users.create') }}" 
               class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-user-plus text-primary-600 mr-3"></i>
                <span class="text-gray-700">Add New User</span>
            </a>
            <a href="{{ route('admin.products.create') }}" 
               class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-plus-circle text-primary-600 mr-3"></i>
                <span class="text-gray-700">Add New Product</span>
            </a>
            <a href="{{ route('admin.reports.index') }}" 
               class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-file-invoice text-primary-600 mr-3"></i>
                <span class="text-gray-700">Generate Report</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" 
               class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-bullhorn text-primary-600 mr-3"></i>
                <span class="text-gray-700">Send Notification</span>
            </a>
        </div>
    </div>
</div>
@endsection
