@if (Route::has('login'))
    <div class="p-3 text-light">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-light">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="ml-4 text-light">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-light">Register</a>
            @endif
        @endauth
    </div>
@endif
