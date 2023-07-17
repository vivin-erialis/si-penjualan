<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('dashboardadmin') ? 'active' : ''}}">
                    <a href="/dashboardadmin"><i class="menu-icon fa fa-home"></i>Dashboard </a>
                </li>
                
                <!-- Menu Data Master Toko -->
                <li class="menu-title">Data Master</li>
                <li class="{{ Request::is('admin/kategoribarang') ? 'active' : ''}}">
                    <a href="/admin/kategoribarang"><i class="menu-icon fa fa-tasks"></i>Kategori Barang</a>
                </li>
                <li class="{{ Request::is('admin/kategoriproduk') ? 'active' : ''}}">
                    <a href="/admin/kategoriproduk"><i class="menu-icon fa fa-tasks"></i>Kategori Produk</a>
                </li>

                <li class="{{ Request::is('produk') ? 'active' : ''}}">
                    <a href="/produk"><i class="menu-icon fa fa-trash"></i>Produk</a>
                </li>

                <!-- Menu Data Barang -->
                <li class="menu-title">Data Barang</li>
                <li class="{{ Request::is('barang') ? 'active' : ''}}">
                    <a href="/admin/barang"><i class="menu-icon fa fa-tasks"></i>Data Barang</a>
                </li>
                <li class="{{ Request::is('barangMasuk') ? 'active' : ''}}">
                    <a href="/barangMasuk"><i class="menu-icon fa fa-tasks"></i>Data Barang Masuk</a>
                </li>
                <li class="{{ Request::is('barangKeluar') ? 'active' : ''}}">
                    <a href="/barangKeluar"><i class="menu-icon fa fa-tasks"></i>Data Barang Keluar</a>
                </li>

                <!-- Menu Data Laporan -->
                <li class="menu-title">Data Laporan</li>
                <li class="{{ Request::is('pembelian') ? 'active' : ''}}">
                    <a href="/pembelian"><i class="menu-icon fa fa-file-invoice"></i>Laporan Pembelian</a>
                </li>

                <li class="{{ Request::is('supplier') ? 'active' : ''}}">
                    <a href="/penjualan"><i class="menu-icon fa fa-file"></i>Laporan Penjualan</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>