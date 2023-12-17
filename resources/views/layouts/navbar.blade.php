<nav class="navbar navbar-expand navbar-dark bg-primary">
    <div class="container py-2">
        {{-- check if user is logged in --}}
        @auth
            <div class="navbar-nav">
                <a class="nav-link" style="color: white;">Home</a>
                @if(auth()->user()->role == 'admin')
                <a class="nav-link" href="{{ '/admin/students' }}">Student Forms</a>
                @endif

                @if(auth()->user()->role == 'admin')
                <a class="nav-link" href="{{ '/admin/mystudent' }}">My Student</a>
                @endif

                @if(auth()->user()->role == 'student')
                    <a class="nav-link" href="{{ '/calon_mahasiswa/index' }}">My Form</a>
                @endif
            </div>              
            <div class="d-flex">
                {{-- <a href="{{ '/add' }}" class="btn btn-light text-black" role="button">Add Car</a> --}}
                <div class="dropdown ms-4">
                    <button class="btn btn-light dropdown-toggle text-" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                            <form action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="navbar-nav w-100 d-flex justify-content-between">
                <a class="nav-link active" aria-current="page" href="{{ 'home' }}">Home</a>
                <a class="nav-link" href="{{ '/' }}">Login</a>
            </div>
        @endauth
    </div>
</nav>
<!-- Nav End -->