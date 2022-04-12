<!DOCTYPE html>
<html>
<head>
    <title>Notification</title>
</head>
<body>
    <p>Dear {{ $details['first_name'] }} {{ $details['first_name'] }},</p>
    @if($details['status'] =="Approved")
        <p>You have approved in system. Please login password is {{$details['password']}}</p>
    @else
        <p>You have rejected in the system</p>
    @endif
    <p>Thank you</p>
</body>
</html>