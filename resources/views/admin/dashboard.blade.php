<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    Welcome {{ Auth::guard('admin')->user()->name }}
    Your email is : {{ Auth::guard('admin')->user()->email }}
    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('adminLogout').submit();">Logout</a>
    <form action="{{ route('admin.logout') }}" method="post" id="adminLogout">
    @csrf
    </form>
</body>
</html>
