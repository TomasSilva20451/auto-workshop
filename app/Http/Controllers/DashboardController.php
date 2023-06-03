<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Sale::count();
        $totalRevenue = Sale::sum('price');
        $averageSellingPrice = $totalSales > 0 ? $totalRevenue / $totalSales : 0;

        $realTimeSalesData = [
            'sales' => $totalSales,
            'revenue' => $totalRevenue,
            'average_selling_price' => $averageSellingPrice,
        ];

        $vehiclesByMake = Vehicle::select('make', DB::raw('COUNT(*) as count'))
            ->groupBy('make')
            ->get();

        $visualization1 = $vehiclesByMake->pluck('count')->toArray();
        $visualization2 = $vehiclesByMake->pluck('make')->toArray();

        $historicalData = Sale::select(DB::raw('COUNT(*) as count'), DB::raw('SUM(price) as total_revenue'))
            ->get();

        $data = [
            'realTimeSalesData' => $realTimeSalesData,
            'visualization1' => $visualization1,
            'visualization2' => $visualization2,
            'historicalData' => $historicalData,
        ];

        return view('dashboard.index', $data);
    }

    public function realTimeSalesData()
    {
        $totalSales = Sale::count();
        $totalRevenue = Sale::sum('price');
        $averageSellingPrice = $totalSales > 0 ? $totalRevenue / $totalSales : 0;

        $salesData = [
            'sales' => $totalSales,
            'revenue' => $totalRevenue,
            'average_selling_price' => $averageSellingPrice,
        ];

        return response()->json($salesData);
    }

    public function generateVisualizations()
    {
        $vehiclesByMake = Vehicle::select('make', DB::raw('COUNT(*) as count'))
            ->groupBy('make')
            ->get();

        $visualization1 = $vehiclesByMake->pluck('count')->toArray();
        $visualization2 = $vehiclesByMake->pluck('make')->toArray();

        return response()->json([
            'visualization_1' => $visualization1,
            'visualization_2' => $visualization2,
            'visualization_3' => '...',
        ]);
    }

    public function fetchHistoricalData()
    {
        $historicalData = Sale::select(DB::raw('COUNT(*) as count'), DB::raw('SUM(price) as total_revenue'))
            ->get();

        return response()->json($historicalData);
    }

    public function realTimeInventoryUpdates()
    {
        $inventory = Vehicle::where('status', 'Active')->get();

        return response()->json($inventory);
    }
}