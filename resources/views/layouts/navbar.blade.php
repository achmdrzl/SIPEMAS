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
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#transaksi">
                            <span class="nav-link-text">Transaksi</span>
                        </a>
                        <ul id="transaksi" class="nav flex-column collapse   nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item {{ request()->segment(1) == 'pembelian' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('pembelian.index') }}"><span
                                                class="nav-link-text">Pembelian</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'penjualan' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('penjualan.index') }}">
                                            <span class="nav-link-text">Penjualan</span>
                                        </a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->segment(1) == 'return_penjualan' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('penjualan.return.index') }}"><span
                                                class="nav-link-text">Return Penjualan</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'pengeluaran' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('pengeluaran.index') }}"><span
                                                class="nav-link-text">Pengeluaran Barang</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'penerimaan' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('penerimaan.index') }}"><span class="nav-link-text">Penerimaan
                                                Barang</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#masterdata">
                            <span class="nav-link-text">Master Data</span>
                        </a>
                        <ul id="masterdata" class="nav flex-column collapse nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item {{ request()->segment(1) == 'supplier' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('supplier.index') }}"><span
                                                class="nav-link-text">Supplier</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'user' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('user.index') }}"><span
                                                class="nav-link-text">User</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'model' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('model.index') }}"><span
                                                class="nav-link-text">Model</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'pabrik' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('pabrik.index') }}"><span
                                                class="nav-link-text">Pabrik</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('barang.index') }}"><span
                                                class="nav-link-text">Barang</span></a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'kadar' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('kadar.index') }}"><span 
                                                class="nav-link-text">Kadar</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#laporan">
                            <span class="nav-link-text">Laporan</span>
                        </a>
                        <ul id="laporan" class="nav flex-column collapse   nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li
                                        class="nav-item {{ request()->segment(1) == 'laporanStock' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('laporan.stock.index') }}"><span
                                                class="nav-link-text">Stock</span></a>
                                    </li>
                                    <li
                                        class="nav-item {{ request()->segment(1) == 'laporanHistory' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('laporan.history.index') }}"><span
                                                class="nav-link-text">History Perhiasan</span></a>
                                    </li>
                                   <li class="nav-item {{ request()->segment(1) === 'laporanPembelian' || request()->segment(1) === 'laporanPembelianDetail' ? 'active' : '' }}">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#dash_wizard">
                                            <span class="nav-link-text">Pembelian</span>
                                        </a>
                                        <ul id="dash_wizard" class="nav flex-column collapse nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item {{ request()->segment(1) == 'laporanPembelian' ? 'active' : '' }}">
                                                        <a class="nav-link" href="{{ route('laporan.pembelian.index') }}"><span
                                                                class="nav-link-text">Rekap Pembelian</span></a>
                                                    </li>
                                                    <li class="nav-item {{ request()->segment(1) == 'laporanPembelianDetail' ? 'active' : '' }}">
                                                        <a class="nav-link" href="{{ route('laporan.pembelianDetail.index') }}"><span
                                                                class="nav-link-text">Detail Pembelian</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                   <li class="nav-item {{ request()->segment(1) === 'laporanPenjualan' || request()->segment(1) === 'laporanPenjualanDetail' ? 'active' : '' }}">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#dash_wizard">
                                            <span class="nav-link-text">Penjualan</span>
                                        </a>
                                        <ul id="dash_wizard" class="nav flex-column collapse nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item {{ request()->segment(1) == 'laporanPenjualan' ? 'active' : '' }}">
                                                        <a class="nav-link" href="{{ route('laporan.penjualan.index') }}"><span
                                                                class="nav-link-text">Rekap Penjualan</span></a>
                                                    </li>
                                                    <li class="nav-item {{ request()->segment(1) == 'laporanPenjualanDetail' ? 'active' : '' }}">
                                                        <a class="nav-link" href="{{ route('laporan.penjualanDetail.index') }}"><span
                                                                class="nav-link-text">Detail Penjualan</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                   <li class="nav-item {{ request()->segment(1) === 'laporanReturnPenjualan' || request()->segment(1) === 'laporanReturnPenjualanDetail' ? 'active' : '' }}">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#dash_wizard">
                                            <span class="nav-link-text">Return Penjualan</span>
                                        </a>
                                        <ul id="dash_wizard" class="nav flex-column collapse nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item {{ request()->segment(1) == 'laporanReturnPenjualan' ? 'active' : '' }}">
                                                        <a class="nav-link" href="{{ route('laporan.returnPenjualan.index') }}"><span
                                                                class="nav-link-text">Rekap Return Penjualan</span></a>
                                                    </li>
                                                    <li class="nav-item {{ request()->segment(1) == 'laporanReturnPenjualanDetail' ? 'active' : '' }}">
                                                        <a class="nav-link" href="{{ route('laporan.returnPenjualanDetail.index') }}"><span
                                                                class="nav-link-text">Detail Return Penjualan</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                   <li class="nav-item {{ request()->segment(1) === 'laporanPengeluaran' || request()->segment(1) === 'laporanPengeluaranDetail' ? 'active' : '' }}">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#dash_wizard">
                                            <span class="nav-link-text">Pengeluaran</span>
                                        </a>
                                        <ul id="dash_wizard" class="nav flex-column collapse nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item {{ request()->segment(1) == 'laporanPengeluaran' ? 'active' : '' }}">
                                                        <a class="nav-link" href="{{ route('laporan.pengeluaran.index') }}"><span
                                                                class="nav-link-text">Rekap Pengeluaran</span></a>
                                                    </li>
                                                    <li class="nav-item {{ request()->segment(1) == 'laporanPengeluaranDetail' ? 'active' : '' }}">
                                                        <a class="nav-link" href="{{ route('laporan.pengeluaranDetail.index') }}"><span
                                                                class="nav-link-text">Detail Pengeluaran</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                   <li class="nav-item {{ request()->segment(1) === 'laporanPenerimaan' || request()->segment(1) === 'laporanPenerimaanDetail' ? 'active' : '' }}">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                                            data-bs-target="#dash_wizard">
                                            <span class="nav-link-text">Penerimaan</span>
                                        </a>
                                        <ul id="dash_wizard" class="nav flex-column collapse nav-children">
                                            <li class="nav-item">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item {{ request()->segment(1) == 'laporanPenerimaan' ? 'active' : '' }}">
                                                        <a class="nav-link" href="{{ route('laporan.penerimaan.index') }}"><span
                                                                class="nav-link-text">Rekap Penerimaan</span></a>
                                                    </li>
                                                    <li class="nav-item {{ request()->segment(1) == 'laporanPenerimaanDetail' ? 'active' : '' }}">
                                                        <a class="nav-link" href="{{ route('laporan.penerimaanDetail.index') }}"><span
                                                                class="nav-link-text">Detail Penerimaan</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'laporanHutang' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('laporan.hutang.index') }}"><span class="nav-link-text">
                                            Hutang</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ request()->segment(1) == 'laporanInOut' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('laporan.inOut.index') }}"><span class="nav-link-text">Pengeluaran / Pendapatan Lain</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><span class="nav-link-text">Cash on Flow</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                            data-bs-target="#kas">
                            <span class="nav-link-text">Kas Toko</span>
                        </a>
                        <ul id="kas" class="nav flex-column collapse  nav-children">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('transaksi.hutang') }}"><span class="nav-link-text">Hutang</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('transaksi.in.out') }}"><span
                                                class="nav-link-text">Pengeluaran / Pendapatan Lain</span></a>
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
