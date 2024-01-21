<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager</title>
</head>
<body>
    Welcome {{ Auth::guard('manager')->user()->name }}
    Your email is : {{ Auth::guard('manager')->user()->email }}
    <a href="{{ route('manager.logout') }}" onclick="event.preventDefault();document.getElementById('managerLogout').submit();">Logout</a>
    <form action="{{ route('manager.logout') }}" method="post" id="managerLogout">
    @csrf
    </form>
</body>
</html>
