<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\SupportTicket;
use App\Models\LenderApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $period = $request->get('period', '7'); // Default to last 7 days
        
        // KPIs
        $kpis = [
            'total_users' => User::count(),
            'active_lenders' => User::where('type', 'lender')->where('is_active', true)->count(),
            'active_products' => Product::where('is_active', true)->count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'revenue' => Order::sum('total_amount'),
            'new_tickets' => SupportTicket::where('status', 'open')->count(),
            'average_rating' => Product::avg('rating') ?: 0,
        ];

        // Charts Data
        $ordersChart = $this->getOrdersChartData($period);
        $topProductsChart = $this->getTopProductsChart();
        $activityByCityChart = $this->getActivityByCityChart();
        $newRegistrationsChart = $this->getNewRegistrationsChart($period);

        // Recent Activities
        $recentOrders = Order::with(['user', 'orderItems.product'])
            ->latest()
            ->take(5)
            ->get();

        $recentTickets = SupportTicket::with('user')
            ->where('status', 'open')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'kpis',
            'ordersChart',
            'topProductsChart',
            'activityByCityChart',
            'newRegistrationsChart',
            'recentOrders',
            'recentTickets',
            'period'
        ));
    }

    private function getOrdersChartData($period)
    {
        $days = (int) $period;
        $data = Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = [];
        $values = [];

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $labels[] = now()->subDays($i)->format('M d');
            $values[] = $data->where('date', $date)->first()?->count ?? 0;
        }

        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }

    private function getTopProductsChart()
    {
        $data = Product::select('name', DB::raw('COUNT(order_items.id) as order_count'))
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('products.id', 'products.name')
            ->orderBy('order_count', 'desc')
            ->limit(5)
            ->get();

        return [
            'labels' => $data->pluck('name'),
            'values' => $data->pluck('order_count'),
        ];
    }

    private function getActivityByCityChart()
    {
        $data = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->select('users.city', DB::raw('COUNT(*) as count'))
            ->groupBy('users.city')
            ->orderBy('count', 'desc')
            ->limit(10)
            ->get();

        return [
            'labels' => $data->pluck('city'),
            'values' => $data->pluck('count'),
        ];
    }

    private function getNewRegistrationsChart($period)
    {
        $days = (int) $period;
        
        $rentersData = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('type', 'renter')
            ->where('created_at', '>=', now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $lendersData = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('type', 'lender')
            ->where('created_at', '>=', now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = [];
        $renters = [];
        $lenders = [];

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $labels[] = now()->subDays($i)->format('M d');
            $renters[] = $rentersData->where('date', $date)->first()?->count ?? 0;
            $lenders[] = $lendersData->where('date', $date)->first()?->count ?? 0;
        }

        return [
            'labels' => $labels,
            'renters' => $renters,
            'lenders' => $lenders,
        ];
    }
}
