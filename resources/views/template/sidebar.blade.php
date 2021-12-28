@php
use Illuminate\Support\Facades\Request;
$urlSegment = Request::segments();
@endphp

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" {{end($urlSegment) == '/' ? 'active' : ''}}>
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-money-bill-alt"></i>
            <span>Keuangan</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('suratmasuk')}}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Surat Masuk</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('partai')}}" aria-expanded="true" aria-controls="collapseTwo" {{end($urlSegment) == '/partai' ? 'active' : ''}}>
            <i class="fas fa-fw fa-landmark"></i>
            <span>Partai</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('anggota')}}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Anggota</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('pegawai') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Pegawai</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('ptt') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>PTT</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('sppd') }}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>SPPD</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
    </li>


</ul>
<!-- End of Sidebar -->
