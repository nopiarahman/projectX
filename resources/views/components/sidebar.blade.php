<div>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item ">
        <a class="nav-link" href="{{ url('/dashboard') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      {{-- Master Data --}}
      <li class="nav-item nav-category">MASTER DATA</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#order" aria-expanded="false" aria-controls="order">
          <i class="menu-icon mdi mdi-human-greeting"></i>
          <span class="menu-title">Order</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="order">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">Selesai</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Request</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/barang') }}">
          <i class="menu-icon mdi mdi-package-variant-closed"></i>
          <span class="menu-title">Barang</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="menu-icon mdi mdi-home-variant"></i>
          <span class="menu-title">Gudang</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#pelanggan" aria-expanded="false"
          aria-controls="pelanggan">
          <i class="menu-icon mdi mdi-human-handsup"></i>
          <span class="menu-title">Pelanggan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="pelanggan">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">Reguler</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Pro</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Non-Aktif</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="menu-icon mdi mdi-houzz"></i>
          <span class="menu-title">Pengepul</span>
        </a>
      </li>
      {{-- Keuangan --}}
      <li class="nav-item nav-category">KEUANGAN</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#saldo" aria-expanded="false" aria-controls="saldo">
          <i class="menu-icon mdi mdi-cash-multiple"></i>
          <span class="menu-title">Saldo Pelanggan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="saldo">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">Ready</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Pending</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#transaksi" aria-expanded="false"
          aria-controls="transaksi">
          <i class="menu-icon mdi mdi-autorenew"></i>
          <span class="menu-title">Transaksi</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="transaksi">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="#">Masuk</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Keluar</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#kas" aria-expanded="false" aria-controls="kas">
          <i class="menu-icon mdi mdi-wallet"></i>
          <span class="menu-title">Kas</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="kas">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">Kas Besar</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Kas Kecil</a></li>
          </ul>
        </div>
      </li>
      {{-- Laporan --}}
      <li class="nav-item nav-category">Laporan</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#laporanKeuangan" aria-expanded="false"
          aria-controls="laporanKeuangan">
          <i class="menu-icon mdi mdi-file-check"></i>
          <span class="menu-title">Keuangan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="laporanKeuangan">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">Bulanan</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Tahunan</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#laporanBarang" aria-expanded="false"
          aria-controls="laporanBarang">
          <i class="menu-icon mdi mdi-file-chart"></i>
          <span class="menu-title">Barang</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="laporanBarang">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">Bulanan</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Tahunan</a></li>
          </ul>
        </div>
      </li>
      {{-- Settings --}}
      <li class="nav-item nav-category">pengaturan</li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="menu-icon mdi mdi-account-key"></i>
          <span class="menu-title">Kelola User</span>
        </a>
      </li>
      {{-- Bantuan --}}
      <li class="nav-item nav-category">Bantuan</li>
      <li class="nav-item">
        <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
          <i class="menu-icon mdi mdi-help-circle-outline"></i>
          <span class="menu-title">Petunjuk Penggunaan</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
