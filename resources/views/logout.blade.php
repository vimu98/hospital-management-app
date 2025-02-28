
<li><a class="nav-link" href="">Profile</a></li>
<li>
    <a class="btn btn-primary ml-lg-3" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout

    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
        @csrf
        @method('DELETE')
    </form>
</li>
