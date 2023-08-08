<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="{{ Request::is('dashboardpetugas') ? 'active' : ''}}">
                    <a href="/dashboardpetugas"><i class="menu-icon fa fa-home"></i>Dashboard </a>
                </li>
                <li class="menu-title">Data Toko</li>

                <li class="{{ Request::is('petugas/produk') ? 'active' : ''}}">
                    <a href="/petugas/produk"><i class="menu-icon fa fa-tags"></i>Produk</a>
                </li>
                <li class="{{ Request::is('petugas/sewa') ? 'active' : ''}}">
                    <a href="/petugas/sewa"><i class="menu-icon fa fa-note-sticky"></i>Sewa</a>
                </li>

                <!-- Menu Data Barang -->
                <li class="{{ Request::is('petugas/barang') ? 'active' : ''}}">
                    <a href="/petugas/barang"><i class="menu-icon fa fa-cubes-stacked"></i>Data Barang</a>
                </li>
                <li class="{{ Request::is('petugas/transaksi') ? 'active' : ''}}">
                    <a href="/petugas/transaksi"><i class="menu-icon fa fa-newspaper"></i>Transaksi</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
