<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand"
                    href="{{ route('dashboard') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">STMIK MI</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <div class="dropdown-divider"></div>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i
                        class="feather icon-layout"></i><span class="menu-title"
                        data-i18n="Dashboard">Dashboard</span></a>
            </li>
            <br>
            <li class=" nav-item {{ Request::is('list_judul') ? 'active' : '' }}"><a href="{{ route('list-judul') }}"><i
                        class="feather icon-message-square"></i><span class="menu-title" data-i18n="Chat">List
                        Judul</span></a>
            </li>
            <br>
            <li class=" nav-item {{ Request::is('prodi') ? 'active' : '' }}"><a href="{{ route('prodi') }}"><i
                        class="feather icon-folder"></i><span class="menu-title" data-i18n="Data-Prodi">Data
                        Prodi</span></a>
            </li>
            <br>
            <li class=" nav-item "><a href="#"><i class="feather icon-menu"></i><span class="menu-title"
                        data-i18n="Data Pengajuan">Data Pengajuan</span></a>
                <ul class="menu-content">
                    <li class="nav-item {{ Request::is('diproses') ? 'active' : '' }}"><a
                            href="{{ route('pengaju-diproses') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="Pengajuan Diproses">Diproses</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('diterima') ? 'active' : '' }}"><a
                            href="{{ route('pengaju-diterima') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="Pengajuan Diterima">Diterima</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('ditolak') ? 'active' : '' }}"><a
                            href="{{ route('pengaju-ditolak') }}"><i class="feather icon-circle"></i><span class="menu-item"
                                data-i18n="Pengajuan Ditolak">Ditolak</span></a>
                    </li>
                </ul>
            </li>
            <br>
            <li class=" nav-item"><a href="{{ route('signout') }}"><i
                        class="feather icon-log-out"></i><span class="menu-title" data-i18n="Data-Prodi">Logout</span></a>
            </li>
            <br>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->