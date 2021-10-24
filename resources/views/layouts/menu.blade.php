<li class="nav-item">
    <a href="{{url('/') }}"
       class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-home"></i>
        <p>Inicio</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-user"></i>
        <p>Usuario</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('permissions.index') }}"
       class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-check"></i>
        <p>Permisos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('roles.index') }}"
       class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-users"></i>
        <p>Roles</p>
    </a>
</li>


