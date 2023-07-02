<!DOCTYPE html>
<html>
<head>
    <title>Reply</title>
</head>
<body>
    <h1>{{ $msg  }}</h1>
    <small style="color: red">Note: You should not reply.</small>
    <p>Thank you {{ auth()->user()->name }}</p>
</body>
</html> 