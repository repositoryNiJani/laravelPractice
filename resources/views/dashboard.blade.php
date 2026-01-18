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
        {{-- <p>Color: <span>{{ Auth::UserPreference()->color }}</p> --}}
            <p>Color: <span>{{ Auth::user()->preference->color ?? 'No color selected' }}</span></p>
        
        
       <div>
        <br>
   <form action="{{ route('color.save') }}" method="POST">
        @csrf
        
        <h2>Choose Your Favorite Color</h2>
        
        <div>
            <label>
                <input type="radio" name="color" value="red" 
                    {{ old('color', Auth::user()->preference->color ?? '') == 'red' ? 'checked' : '' }}>
                RED
            </label>
            
            <label>
                <input type="radio" name="color" value="yellow"
                    {{ old('color', Auth::user()->preference->color ?? '') == 'yellow' ? 'checked' : '' }}>
                YELLOW
            </label>
            
            <label>
                <input type="radio" name="color" value="blue"
                    {{ old('color', Auth::user()->preference->color ?? '') == 'blue' ? 'checked' : '' }}>
                BLUE
            </label>
            
            <label>
                <input type="radio" name="color" value="green"
                    {{ old('color', Auth::user()->preference->color ?? '') == 'green' ? 'checked' : '' }}>
                GREEN
            </label>
        </div>
        
        @error('color')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        
        <button type="submit">Save Color</button>
    </form>
</div>

        <br>
        <br>
        <!-- Logout form -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>