<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-coins"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            Ebfis
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

   
    <!-- Heading -->
    <div class="sidebar-heading">
        Informasi
    </div>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - berita -->
    <li class="nav-item {{Request::is('berita*') ? 'active' : ''}}">
        <a class="nav-link" href="/berita">
            <i class="fa fa-newspaper"></i>
            <span>Berita</span></a>
    </li>
    <!-- Nav Item - pengumuman -->
    <li class="nav-item">
        <a class="nav-link" href="/pengumuman">
            <i class="fa fa-bullhorn"></i>
            <span>Pengumuman</span></a>
    </li>

    <div class="sidebar-heading">
        Lainnya
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - program -->
    <li class="nav-item">
        <a class="nav-link" href="/program">
            <i class="fa fa-bullhorn"></i>
            <span>program</span></a>
    </li>
    <!-- Nav Item - fasilitas -->
    <li class="nav-item">
        <a class="nav-link" href="/fasilitas">
            <i class="fa fa-bullhorn"></i>
            <span>fasilitas</span></a>
    </li>
    <!-- Nav Item - unduhan -->
    <li class="nav-item">
        <a class="nav-link" href="/unduhan">
            <i class="fa fa-bullhorn"></i>
            <span>unduhan</span></a>
    </li>
    
    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Data
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Nav Item - dosen -->
    <li class="nav-item {{Request::is('dosen*') ? 'active' : ''}}">
        <a class="nav-link" href="/dosen">
            <i class="fa fa-bullhorn"></i>
            <span>dosen</span></a>
    </li>
    <!-- Nav Item - mahasiswa -->
    <li class="nav-item {{Request::is('mahasiswa*') ? 'active' : ''}}">
        <a class="nav-link" href="/mahasiswa">
            <i class="fa fa-bullhorn"></i>
            <span>mahasiswa</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->