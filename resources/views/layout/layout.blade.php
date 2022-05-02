<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<header>
    @auth
        <div>
            <span>Welcome {{ auth()->user()->name }}</span>
        </div>
    @endauth
    <div style="display: flex">
        <a href="/">Home</a>
        <a href="/categories/Nature">Nature</a>
        <a href="/categories/Art">Art</a>
        <a href="/categories/Technology">Technology</a>
        <a href="/categories/Sports">Sports</a>
        <a href="/categories/Other">Other</a>
        @guest
            <a style="color: cornflowerblue;" href="/register">Register</a>
            <a style="color: cornflowerblue;" href="/login">Log in</a>
        @endguest
        @auth
            <form action="/logout" method="POST"
                  style="position: absolute; right: 20px">
                @csrf
                <button style="color: cornflowerblue;" type="submit">Log Out</button>
            </form>
            <a href="/article/create">Create new article</a>
        @endauth
    </div>
</header>
@yield('content')
</body>
</html>
