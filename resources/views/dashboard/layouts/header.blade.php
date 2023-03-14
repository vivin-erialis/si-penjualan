<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="logo mr-5" href="/">Ayesha Projek</a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="user-area dropdown float-right">
                <a href="" class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user mx-2"></i>Vivin Erialis Puteri
                </a>
                <div class="user-menu dropdown-menu">
                    <div class="nav-item text-nowrap">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm">Sign Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>