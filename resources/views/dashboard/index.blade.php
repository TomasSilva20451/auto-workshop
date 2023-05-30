<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Dashboard</h1>

    <h2>Real-time Sales Data</h2>
    <p>Total Sales: {{ $realTimeSalesData['sales'] }}</p>
    <p>Total Revenue: {{ $realTimeSalesData['revenue'] }}</p>
    <p>Average Selling Price: {{ $realTimeSalesData['average_selling_price'] }}</p>

    <h2>Visualizations</h2>
    <p>Visualization 1:</p>
    <ul>
        @foreach ($visualization1 as $count)
        <li>{{ $count }}</li>
        @endforeach
    </ul>

    <p>Visualization 2:</p>
    <ul>
        @foreach ($visualization2 as $make)
        <li>{{ $make }}</li>
        @endforeach
    </ul>

    <h2>Historical Data</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Sales Count</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historicalData as $data)
            <tr>
                <td>{{ $data->date }}</td>
                <td>{{ $data->count }}</td>
                <td>{{ $data->total_revenue }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>