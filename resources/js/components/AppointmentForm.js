import React, { useState } from 'react';
import axios from 'axios';

const AppointmentForm = () => {
  const [formData, setFormData] = useState({
    date: '',
    time: '',
    service_type: '',
  });

  const handleSubmit = (e) => {
    e.preventDefault();

    // Send the appointment data to the backend
    axios.post('/api/appointments', formData)
      .then(response => {
        // Handle the response data
        console.log(response.data);
      })
      .catch(error => {
        // Handle any errors
        console.error(error);
      });
  };

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  return (
    <form onSubmit={handleSubmit}>
      <input type="date" name="date" value={formData.date} onChange={handleChange} />
      <input type="time" name="time" value={formData.time} onChange={handleChange} />
      <input type="text" name="service_type" value={formData.service_type} onChange={handleChange} />
      <button type="submit">Submit</button>
    </form>
  );
};

export default AppointmentForm;
