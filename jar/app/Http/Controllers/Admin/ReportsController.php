<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $dateRange = $request->input('date_range', '30'); // Default to 30 days
        $startDate = Carbon::now()->subDays($dateRange);

        // 1. Key Metrics
        $totalRevenue = Order::where('status', 'completed') // Assuming 'completed' status for revenue
            ->where('created_at', '>=', $startDate)
            ->sum('total_amount');

        $previousStartDate = Carbon::now()->subDays($dateRange * 2);
        $previousEndDate = Carbon::now()->subDays($dateRange);

        $previousRevenue = Order::where('status', 'completed')
            ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
            ->sum('total_amount');

        $revenueGrowth = $previousRevenue > 0
            ? (($totalRevenue - $previousRevenue) / $previousRevenue) * 100
            : 0;

        $totalOrders = Order::where('created_at', '>=', $startDate)->count();
        $previousOrders = Order::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();
        $ordersGrowth = $previousOrders > 0
            ? (($totalOrders - $previousOrders) / $previousOrders) * 100
            : 0;

        $activeUsers = User::where('created_at', '>=', $startDate)->count(); // New users in period? Or actually active?
        // For "Active Users" usually means users who logged in, but let's use New Users for this report context or Total Active Users.
        // The blade says "Active Users", let's assume total active users but show growth based on new registrations?
        // Or simply count users who made an order or logged in.
        // Let's stick to Total Users for now as "Active Users" metric often implies total base in these templates,
        // but the growth implies change. Let's use "New Users" for the growth calculation context.
        $newUsers = User::where('created_at', '>=', $startDate)->count();
        $previousNewUsers = User::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();
        $usersGrowth = $previousNewUsers > 0
            ? (($newUsers - $previousNewUsers) / $previousNewUsers) * 100
            : 0;
        $totalActiveUsers = User::count(); // Or filtering by some 'active' flag if exists.

        $activeProducts = Product::where('is_active', true)->count();
        // For products, growth might not be as relevant based on date range, but we can check new products.
        $newProducts = Product::where('created_at', '>=', $startDate)->count();
        $previousNewProducts = Product::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();
        $productsGrowth = $previousNewProducts > 0
            ? (($newProducts - $previousNewProducts) / $previousNewProducts) * 100
            : 0;


        // 2. Charts Data

        // Revenue Trend
        $revenueData = Order::selectRaw('DATE(created_at) as date, SUM(total_amount) as total')
            ->where('status', 'completed')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $revenueChart = [
            'labels' => $revenueData->pluck('date')->map(fn($date) => Carbon::parse($date)->format('M d')),
            'data' => $revenueData->pluck('total'),
        ];

        // Orders by Status
        $ordersStatus = Order::selectRaw('status, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('status')
            ->get();

        $ordersStatusChart = [
            'labels' => $ordersStatus->pluck('status'),
            'data' => $ordersStatus->pluck('count'),
        ];

        // Top Products (by order count)
        $topProducts = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.created_at', '>=', $startDate)
            ->select('products.name', DB::raw('COUNT(*) as total_orders'))
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_orders')
            ->limit(5)
            ->get();

        $topProductsChart = [
            'labels' => $topProducts->pluck('name'),
            'data' => $topProducts->pluck('total_orders'),
        ];

        // User Activity (New Registrations)
        $userActivity = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $userActivityChart = [
            'labels' => $userActivity->pluck('date')->map(fn($date) => Carbon::parse($date)->format('M d')),
            'data' => $userActivity->pluck('count'),
        ];

        return view('admin.reports.index', compact(
            'dateRange',
            'totalRevenue', 'revenueGrowth',
            'totalOrders', 'ordersGrowth',
            'totalActiveUsers', 'usersGrowth',
            'activeProducts', 'productsGrowth',
            'revenueChart',
            'ordersStatusChart',
            'topProductsChart',
            'userActivityChart'
        ));
    }
}
