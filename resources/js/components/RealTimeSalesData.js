import React, { useEffect, useState } from 'react';

const RealTimeSalesData = () => {
  const [salesData, setSalesData] = useState({
    sales: 0,
    revenue: 0,
    averageSellingPrice: 0,
  });

  useEffect(() => {
    const fetchSalesData = async () => {
      try {
        const response = await fetch('/dashboard/real-time-sales-data');
        const data = await response.json();
        setSalesData(data);
      } catch (error) {
        console.error(error);
      }
    };

    fetchSalesData();
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
                <p className="card-text">{salesData.averageSellingPrice}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default RealTimeSalesData;
