<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse mt-2">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('dashboard') ? 'active' : ''}}">
                    <a href="/dashboard"><i class="menu-icon fa fa-home"></i>Dashboard </a>
                </li>
                <li class="menu-title">DATA TOKO</li>
                <li class="{{ Request::is('kategori') ? 'active' : ''}}">
                    <a href="/kategori"><i class="menu-icon fa fa-tasks"></i>Kategori Barang</a>
                </li>
                <li class="{{ Request::is('barang') ? 'active' : ''}}">
                    <a href="/barang"><i class="menu-icon fa fa-tasks"></i>Data Barang</a>
                </li>
                <li class="{{ Request::is('barangMasuk') ? 'active' : ''}}">
                    <a href="/barangMasuk"><i class="menu-icon fa fa-tasks"></i>Data Barang Masuk</a>
                </li>
                <li class="{{ Request::is('barangKeluar') ? 'active' : ''}}">
                    <a href="/barangKeluar"><i class="menu-icon fa fa-tasks"></i>Data Barang Keluar</a>
                </li>
                <li class="{{ Request::is('supplier') ? 'active' : ''}}">
                    <a href="/supplier"><i class="menu-icon fa fa-book"></i>Laporan</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>