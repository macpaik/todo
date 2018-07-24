
    <div class="flex-center position-ref full-height">
            @auth
             <p>welcome {{ Auth::user()->name }}</br>
             <a href="{{ url('/auth/logout') }}">Logout</a></p>
            @else
             <a href="{{ url('auth/redirect/github') }}">LinkedInLogin</a>
            @endauth
    </div>
