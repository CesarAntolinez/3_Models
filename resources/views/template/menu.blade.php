<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Cesar Antolinez</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(auth()->user()->hasModule('user'))
                    <li class="nav-item">
                        <a href="{{ url('/usuarios') }}" class="nav-link"><i class="nav-icon fas fa-user"></i><p> usuarios</p></a>
                    </li>
                @endif
                @if(auth()->user()->hasModule('company'))
                    <li class="nav-item">
                        <a href="{{ url('/companias') }}" class="nav-link"><i class="nav-icon fas fa-house-damage"></i><p> companias</p></a>
                    </li>
                @endif
                @if(auth()->user()->hasModule('role'))
                    <li class="nav-item">
                        <a href="{{ url('/roles') }}" class="nav-link"><i class="nav-icon fas fa-circle"></i><p> Roles</p></a>
                    </li>
                @endif
                @if(auth()->user()->hasModule('module'))
                    <li class="nav-item">
                        <a href="{{ url('/modules') }}" class="nav-link"><i class="nav-icon fas fa-circle"></i><p> Modulos</p></a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
