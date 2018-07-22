@if (\Session::has('loginAs') && Auth::user() != null)
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="pull-left">
            You are currently impersonating <strong>{{ Auth::user()->full_name }}</strong> as <strong>{{ Auth::user()->getRole()->name }}</strong>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('member/stopImpersonate') }}">
                        <i class=""></i>
                        <span class="nav-label">Stop impersonating this user</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endif