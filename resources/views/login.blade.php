<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    
    @auth
    @else
        <!-- If user is NOT logged in (guest) -->
        <h1>LOGIN</h1>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginusername" placeholder="Username" required>
            <input type="password" name="loginpassword" placeholder="Password" required>
            <button type="submit">SIGN IN</button>
        </form>
        
        {{-- <p>Don't have an account? <a href="/register">Register</a></p> --}}
         <p>Dont have an account? <a href="{{ url('/register') }}">SIGN UP</a></p>
    @endauth
    
</body>
</html>

{{-- 9965 --}}