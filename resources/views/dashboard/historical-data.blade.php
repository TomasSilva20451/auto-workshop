@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historical Data</h1>

    @if(count($data) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Sales</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->date }}</td>
                <td>{{ $item->count }}</td>
                <td>{{ $item->total_revenue }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No historical data available.</p>
    @endif
</div>
@endsection