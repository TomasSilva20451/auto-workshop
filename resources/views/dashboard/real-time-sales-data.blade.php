@extends('layouts.app')

@section('content')
<div>
    <h1>Real-time Sales Data</h1>
    <div class="card">
        <div class="card-header">Real-time Sales Data</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Sales</h5>
                            <p class="card-text">{{ $salesData['sales'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Revenue</h5>
                            <p class="card-text">{{ $salesData['revenue'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Average Selling Price</h5>
                            <p class="card-text">{{ $salesData['averageSellingPrice'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection