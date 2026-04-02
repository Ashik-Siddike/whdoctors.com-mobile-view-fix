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
    <p><b>Name : </b>{{ $mailData['name'] }}</p>
    <p><b>Phone : </b> {{ $mailData['phone'] }}</p>
    <p><b>Message : </b> {{ $mailData['content'] }}</p>

    <p>Thank you.</p>
</body>
</html>
