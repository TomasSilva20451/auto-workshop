<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function realTimeSalesData()
    {
        // Logic for retrieving real-time sales data goes here
        $totalSales = Sale::count();
        $totalRevenue = Sale::sum('price');
        $averageSellingPrice = $totalSales > 0 ? $totalRevenue / $totalSales : 0;

        return response()->json([
            'sales' => $totalSales,
            'revenue' => $totalRevenue,
            'average_selling_price' => $averageSellingPrice,
        ]);
    }

    public function generateVisualizations()
    {
        // Logic for generating visualizations goes here
        $vehiclesByMake = Vehicle::select('make', DB::raw('COUNT(*) as count'))
            ->groupBy('make')
            ->get();

        $visualization1 = $vehiclesByMake->pluck('count')->toArray();
        $visualization2 = $vehiclesByMake->pluck('make')->toArray();
        // Generate other visualizations as per your requirement

        return response()->json([
            'visualization_1' => $visualization1,
            'visualization_2' => $visualization2,
            'visualization_3' => '...',
        ]);
    }

    public function fetchHistoricalData()
    {
        // Logic for fetching historical data goes here
        $salesData = Sale::select('date', DB::raw('COUNT(*) as count'), DB::raw('SUM(price) as total_revenue'))
            ->groupBy('date')
            ->get();

        return response()->json([
            'data' => $salesData,
        ]);
    }
}
