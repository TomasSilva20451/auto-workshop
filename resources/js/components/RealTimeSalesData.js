import React, { useEffect, useState } from 'react';

const RealTimeSalesData = () => {
  const [salesData, setSalesData] = useState({
    sales: 0,
    revenue: 0,
    averageSellingPrice: 0,
  });

  useEffect(() => {
    // Make an API request to retrieve the real-time sales data
    fetch('/dashboard/real-time-sales-data')
      .then(response => response.json())
      .then(data => setSalesData(data))
      .catch(error => console.error(error));
  }, []);

  return (
    <div className="card">
      <div className="card-header">Real-time Sales Data</div>
      <div className="card-body">
        <div className="row">
          <div className="col-md-4">
            <div className="card">
              <div className="card-body">
                <h5 className="card-title">Total Sales</h5>
                <p className="card-text">{salesData.sales}</p>
              </div>
            </div>
          </div>
          <div className="col-md-4">
            <div className="card">
              <div className="card-body">
                <h5 className="card-title">Total Revenue</h5>
                <p className="card-text">{salesData.revenue}</p>
              </div>
            </div>
          </div>
          <div className="col-md-4">
            <div className="card">
              <div className="card-body">
                <h5 className="card-title">Average Selling Price</h5>
                <p className="card-text">{salesData.average_selling_price}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default RealTimeSalesData;
