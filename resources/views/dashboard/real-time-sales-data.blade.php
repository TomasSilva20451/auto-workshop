@extends('layouts.app')

@section('content')
<div>
    <h1>Real-time Sales Data</h1>
    <p>Sales: {{ $salesData['sales'] }}</p>
    <p>Revenue: {{ $salesData['revenue'] }}</p>
    <p>Average Selling Price: {{ $salesData['averageSellingPrice'] }}</p>
</div>
@endsection