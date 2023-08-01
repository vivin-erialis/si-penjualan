<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="logo mr-5" href="/">Ayesha Projek</a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="user-area dropdown float-right">
        <a href="" class="dropdown nama" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user mx-2" style="margin-top: 20px;"></i>{{Auth()->user()->name}}
        </a>

        <div class="user-menu dropdown-menu">


            <a class="nav-link" href="/admin/gantipassword"><i class="fa fa-gear"></i>Ganti Password</a>

            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-sm nav-link"><i class="fa fa-right-from-bracket"></i>Logout</button>
            </form>
        </div>
    </div>
</header>