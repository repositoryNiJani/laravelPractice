{{-- <!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to Dashboard!</h1>
    <p>You are logged in!</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html> --}}
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <div>
        <h1>Welcome to Dashboard!</h1>
        <p>You are logged in!</p>
        

        {{-- maganda to sa table  --}}
        {{-- <!-- Display user information -->
        @if(isset($user))
            <p>Name: <span>{{ $user->name }}</span></p>
            
            <!-- Check if username exists -->
            @if($user->username)
                <p>Username: <span>{{ $user->username }}</span></p>
            @endif
            
            <p>Email: <span>{{ $user->email }}</span></p>
            
            <!-- Check if birthday exists -->
            @if($user->bday)
                <p>Birthdate: <span>{{ $user->bday }}</span></p>
            @endif
        @else
            <p>No user data found.</p>
        @endif --}}

        <p>Name: <span>{{ Auth::user()->username }}</span></p>
        <p>Email: <span>{{ Auth::user()->email }}</span></p>
        <p>Birthdate: <span>{{ Auth::user()->bday }}</span></p>
        
        <!-- Logout form -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>