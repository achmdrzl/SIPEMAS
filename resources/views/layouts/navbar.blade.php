    <!-- Main Menu -->
    <div data-simplebar class="nicescroll-bar">
        <div class="menu-content-wrap">
            <div class="menu-group">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->segment(1) == 'barang' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('barang.index') }}">
                            <span class="nav-link-text">Data Barang</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#transaksi">
                            <span class="nav-link-text">Transaksi</span>
                        </a>
                        <ul id="transaksi" class="nav flex-column collapse   nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item {{ request()->segment(1) == 'penjualan' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('penjualan.index') }}">
                                            <span class="nav-link-text">Penjualan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'return_penjualan' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('return.index') }}"><span class="nav-link-text">Return Penjualan</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Supplier</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'pembelian' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('pembelian.index') }}"><span class="nav-link-text">Pembelian</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Lebur/Cuci/Reparasi</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Penerimaan Barang</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Hutang</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Kode Kas</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Pengeluaran</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Pendapatan Lain</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#masterdata">
                            <span class="nav-link-text">Master Data</span>
                        </a>
                        <ul id="masterdata" class="nav flex-column collapse nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Customer</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'supplier' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('supplier.index') }}"><span class="nav-link-text">Supplier</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'model' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('model.index') }}"><span class="nav-link-text">Model</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Satuan</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Pabrik</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Kadar</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('barang.index') }}"><span class="nav-link-text">Barang</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Harga Jual</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Merk</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#laporan">
                            <span class="nav-link-text">Laporan</span>
                        </a>
                        <ul id="laporan" class="nav flex-column collapse   nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item {{ request()->segment(1) == 'laporan_stock' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('laporanStock.index') }}"><span class="nav-link-text">Stock</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'history_barang' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('history.barang') }}"><span class="nav-link-text">History Perhiasan</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#dash_wizard">
                                            <span class="nav-link-text">Penjualan</span>
                                        </a>
                                        <ul id="dash_wizard" class="nav flex-column collapse   nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><span class="nav-link-text">Rekap Penjualan</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><span class="nav-link-text">Detail Penjualan</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#dash_wizard">
                                            <span class="nav-link-text">Return Penjualan</span>
                                        </a>
                                        <ul id="dash_wizard" class="nav flex-column collapse   nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><span class="nav-link-text">Rekap Return Penjualan</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><span class="nav-link-text">Detail Return Penjualan</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#dash_wizard">
                                            <span class="nav-link-text">Pembelian</span>
                                        </a>
                                        <ul id="dash_wizard" class="nav flex-column collapse   nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><span class="nav-link-text">Direct Message</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"><span class="nav-link-text">Chatbot Chat</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Lebur/Cuci/Reparasi</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Cash on Flow</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>	
            </div>
        </div>
    </div>
    <!-- /Main Menu -->