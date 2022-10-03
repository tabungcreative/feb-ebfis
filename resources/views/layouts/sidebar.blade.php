<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-desktop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            EBFIS
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
        <a class="nav-link" href="/">
            <i class="fas fa-home"></i>
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
    <li class="nav-item {{Request::is('pengumuman*') ? 'active' : ''}}">
        <a class="nav-link" href="/pengumuman">
            <i class="fa fa-bullhorn"></i>
            <span>Pengumuman</span></a>
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
            <i class="fas fa-user-tie"></i>
            <span>Dosen</span></a>
    </li>
    <!-- Nav Item - mahasiswa -->
    <li class="nav-item {{Request::is('mahasiswa*') ? 'active' : ''}}">
        <a class="nav-link" href="/mahasiswa">
            <i class="fas fa-user-graduate"></i>
            <span>Mahasiswa</span></a>
    </li>

    <div class="sidebar-heading">
        Lainnya
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - program -->
    <li class="nav-item {{Request::is('program*') ? 'active' : ''}}">
        <a class="nav-link" href="/program">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Program</span></a>
    </li>
    <!-- Nav Item - fasilitas -->
    <li class="nav-item {{Request::is('fasilitas*') ? 'active' : ''}}">
        <a class="nav-link" href="/fasilitas">
            <i class="fas fa-laptop-house"></i>
            <span>Fasilitas</span></a>
    </li>
    <!-- Nav Item - unduhan -->
    <li class="nav-item {{Request::is('unduhan*') ? 'active' : ''}}">
        <a class="nav-link" href="/unduhan">
            <i class="fas fa-cloud-download-alt"></i>
            <span>Unduhan</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    


</ul>
<!-- End of Sidebar -->