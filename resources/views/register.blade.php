<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div>
        <h1>REGISTER</h1>
        <form action="/register" method="POST">
            @csrf
        <input type="text" placeholder="name" name="username" placeholder="name">
        <input type="email" placeholder="email" name="email" placeholder="email">
        <input type="date" placeholder="bday" name="bday" placeholder="bday">
        <input type="password" placeholder="password" name="password" placeholder="password">

        <button type="submit">SUBMIT</button>
        </form>
        {{-- <p>already have an account? <a href="">LOG IN</a></p> --}}
        <p>already have an account? <a href="{{ url('/login') }}">LOG IN</a></p>
    </div>
</body>
</html>