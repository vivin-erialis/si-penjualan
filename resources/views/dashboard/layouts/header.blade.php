<header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="/images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p class="mt-3">Vivin Erialis Puteri</p>
                        </a>

                        <div class="user-menu dropdown-menu">
                        <div class="nav-item text-nowrap">
          <form action="/logout" method="post" >
             @csrf
              <button type="submit">Sign Out</button>
          </form>
        </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>