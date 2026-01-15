{{-- <!DOCTYPE html>
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
        <form action="{{route('login.post')}}" method="POST">
            @csrf
            <input type="text" name="loginusername" placeholder="Username" required>
            <input type="password" name="loginpassword" placeholder="Password" required>
            <button type="submit">SIGN IN</button>
        </form>
        
        {{-- <p>Don't have an account? <a href="/register">Register</a></p> --}}
         {{-- <p>Dont have an account? <a href="{{route('register')}}">SIGN UP</a></p>
    @endauth
    
</body>
</html> --}}
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    
    <!-- Add this JavaScript to auto-redirect -->
    <script>
        // Check if user is authenticated via JavaScript
        @auth
            window.location.href = "{{ route('dashboard') }}";
        @endauth
    </script>
</head>
<body>
    
    @auth
        <!-- This won't show because JavaScript redirects first -->
        <!-- You can show a loading message if you want -->
        <p>Redirecting to dashboard...</p>
        <script>
            // Fallback in case JavaScript is slow
            setTimeout(function() {
                window.location.href = "{{ route('dashboard') }}";
            }, 100);
        </script>
        
    @else
        <!-- If user is NOT logged in (guest) -->
        <h1>LOGIN</h1>
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <input type="text" name="loginusername" placeholder="Username" required>
            <input type="password" name="loginpassword" placeholder="Password" required>
            <button type="submit">SIGN IN</button>
        </form>
        
        <p>Don't have an account? <a href="{{ route('register') }}">SIGN UP</a></p>
    @endauth
    
</body>
</html>

{{-- 9965 --}}
