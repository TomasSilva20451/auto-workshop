<!DOCTYPE html>
<html>

<head>
    <title>Appointment Confirmation</title>
</head>

<body>
    <h1>Appointment Confirmation</h1>

    <p>Dear {{ $appointment->client_name }},</p>

    <p>Your appointment has been confirmed for the following details:</p>

    <ul>
        <li>Date: {{ $appointment->date }}</li>
        <li>Time: {{ $appointment->time }}</li>
        <li>Service Type: {{ $appointment->service_type }}</li>
    </ul>

    <p>Thank you for choosing our services. We look forward to seeing you!</p>

    <p>Best regards,</p>
    <p>The Appointment Team</p>
</body>

</html>