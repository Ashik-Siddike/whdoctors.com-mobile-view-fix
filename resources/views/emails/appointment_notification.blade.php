<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Details</title>
</head>
<body style="margin:0; padding:0; font-family:Arial, Helvetica, sans-serif; background-color:#f4f4f4;">

<!-- Outer Table -->
<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:20px 0;">
    <tr>
        <td align="center">

            <!-- Inner Container -->
            <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 0 10px rgba(0,0,0,0.05);">

                <!-- Header -->
                <tr>
                    <td style="background-color:#dc4d01; padding:25px; text-align:center;">
                        <h1 style="margin:0; color:#ffffff; font-size:24px; font-weight:bold;">
                            Appointment Details
                        </h1>
                    </td>
                </tr>

                <!-- Greeting -->
                <tr>
                    <td style="padding:20px; color:#333333; font-size:16px; line-height:1.5;">
                        <p style="margin:0 0 15px;">Hello I'm {{ $appointment->name }},</p>
{{--                        <p style="margin:0 0 15px;">Here are the details of your upcoming appointment:</p>--}}
                    </td>
                </tr>

                <!-- Appointment Info Table -->
                <tr>
                    <td style="padding:0 20px 20px 20px;">
                        <table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">

                            <tr style="background-color:#f8f9fa;">
                                <td style="font-weight:bold; width:40%; border:1px solid #e3e6f0;">Full Name</td>
                                <td style="border:1px solid #e3e6f0;">{{ $appointment->name }}</td>
                            </tr>

                            <tr>
                                <td style="font-weight:bold; border:1px solid #e3e6f0;">Email Address</td>
                                <td style="border:1px solid #e3e6f0;">{{ $appointment->email }}</td>
                            </tr>

                            <tr style="background-color:#f8f9fa;">
                                <td style="font-weight:bold; border:1px solid #e3e6f0;">Phone Number</td>
                                <td style="border:1px solid #e3e6f0;">{{ $appointment->phone }}</td>
                            </tr>

                            <tr>
                                <td style="font-weight:bold; border:1px solid #e3e6f0;">Preferred Visit Time</td>
                                <td style="border:1px solid #e3e6f0;">
                                    {{ \Carbon\Carbon::parse($appointment->visit_time)->format('d M Y, h:i A') }}
                                </td>
                            </tr>

                            <tr style="background-color:#f8f9fa;">
                                <td style="font-weight:bold; border:1px solid #e3e6f0;">Appointment Created</td>
                                <td style="border:1px solid #e3e6f0;">
                                    {{ $appointment->created_at->format('d M Y, h:i A') }}
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:bold; border:1px solid #e3e6f0;">Purpose of Visit</td>
                                <td style="border:1px solid #e3e6f0;">{{ $appointment->purpose ?? 'N/A' }}</td>
                            </tr>

                        </table>
                    </td>
                </tr>

                <!-- Footer / Closing -->
{{--                <tr>--}}
{{--                    <td style="padding:20px; color:#333333; font-size:16px; line-height:1.5;">--}}
{{--                        <p style="margin:0 0 15px;">Thank you for booking an appointment with us.</p>--}}
{{--                        <p style="margin:0;">If you have any questions, feel free to reply to this email.</p>--}}
{{--                    </td>--}}
{{--                </tr>--}}

                <!-- Footer -->
                <tr>
                    <td style="background-color:#f8f8f8; padding:15px; text-align:center; font-size:12px; color:#777777;">
                        &copy; {{ date('Y') }} WH Doctor's Study Lab Ltd. All rights reserved
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
