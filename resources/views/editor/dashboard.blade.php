<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editor</title>
</head>
<body>
    Welcome {{ Auth::guard('editor')->user()->name }}
    Your email is : {{ Auth::guard('editor')->user()->email }}
    <a href="{{ route('editor.logout') }}" onclick="event.preventDefault();document.getElementById('editorLogout').submit();">Logout</a>
    <form action="{{ route('editor.logout') }}" method="post" id="editorLogout">
    @csrf
    </form>
</body>
</html>
