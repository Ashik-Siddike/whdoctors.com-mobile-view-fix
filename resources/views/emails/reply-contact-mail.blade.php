<!DOCTYPE html>
<html>
<head>
    <title>Edupay</title>
    <style>
        p{
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <p>Dear {{ $mailData['name'] }},</p>
    <br><br>
    <p>We have got your message. We will reach you as soon as possible.</p>
    <p>{{ $mailData['content'] }}</p>
    <br><br><br>
    <p>Thank You</p>
    <p>Edupay</p>
</body>
</html>
