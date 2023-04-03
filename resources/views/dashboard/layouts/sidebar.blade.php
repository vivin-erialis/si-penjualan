<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse mt-2">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('dashboard') ? 'active' : ''}}">
                    <a href="/dashboard"><i class="menu-icon fa fa-home"></i>Dashboard </a>
                </li>
                <li class="menu-title">Kebutuhan Produksi</li>
                <li class="{{ Request::is('kategori') ? 'active' : ''}}">
                    <a href="/kategori"><i class="menu-icon fa fa-tasks"></i>Kategori Barang</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Barang</a>
                    <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-line-chart mr-3"></i><a href="/barang">Data Barang</a></li>
                        <li><i class="menu-icon fa fa-line-chart mr-3"></i><a href="/barangMasuk">Barang Masuk</a></li>
                        <li><i class="menu-icon fa fa-area-chart mr-3"></i><a href="/barangKeluar">Barang Keluar</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('supplier') ? 'active' : ''}}">
                    <a href="/supplier"><i class="menu-icon fa fa-users"></i>Supplier</a>
                </li>
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>