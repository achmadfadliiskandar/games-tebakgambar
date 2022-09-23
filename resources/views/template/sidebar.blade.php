<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
    <a href="{{url('/')}}">TebarF2Game</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
    <a href="{{url('/')}}">Tf2g</a>
    </div>
    <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="dropdown {{Request::is('admin') ? 'active':''}} || {{Request::is('admin/informasiumum') ? 'active':''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
        {{-- <li>
            <a class="nav-link" href="{{url('/')}}">Home</a>
        </li> --}}
        <li class="{{Request::is('admin') ? 'active':''}}">
            <a class="nav-link text-capitalize" href="{{url('admin')}}">admin</a>
        </li>
        <li class="{{Request::is('admin/informasiumum') ? 'active':''}}">
            <a class="nav-link text-capitalize" href="{{url('admin/informasiumum')}}">informasi umum</a>
        </li>
        </ul>
    </li>
    <li class="menu-header">Saran</li>
    <li class="dropdown {{Request::is('admin/saran') ? 'active':''}}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-edit"></i> <span class="text-capitalize">data saran</span></a>
        <ul class="dropdown-menu">
            <li class="{{Request::is('admin/saran') ? 'active':''}}">
                <a class="nav-link" href="{{url('admin/saran')}}">
                    {{-- <i class="fas fa-user-edit"></i>  --}}
                    <span class="text-capitalize">saran</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
        <ul class="dropdown-menu">
        <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
        <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
        <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
        <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>
        <li><a class="nav-link" href="bootstrap-card.html">Card</a></li>
        <li><a class="nav-link" href="bootstrap-carousel.html">Carousel</a></li>
        <li><a class="nav-link" href="bootstrap-collapse.html">Collapse</a></li>
        <li><a class="nav-link" href="bootstrap-dropdown.html">Dropdown</a></li>
        <li><a class="nav-link" href="bootstrap-form.html">Form</a></li>
        <li><a class="nav-link" href="bootstrap-list-group.html">List Group</a></li>
        <li><a class="nav-link" href="bootstrap-media-object.html">Media Object</a></li>
        <li><a class="nav-link" href="bootstrap-modal.html">Modal</a></li>
        <li><a class="nav-link" href="bootstrap-nav.html">Nav</a></li>
        <li><a class="nav-link" href="bootstrap-navbar.html">Navbar</a></li>
        <li><a class="nav-link" href="bootstrap-pagination.html">Pagination</a></li>
        <li><a class="nav-link" href="bootstrap-popover.html">Popover</a></li>
        <li><a class="nav-link" href="bootstrap-progress.html">Progress</a></li>
        <li><a class="nav-link" href="bootstrap-table.html">Table</a></li>
        <li><a class="nav-link" href="bootstrap-tooltip.html">Tooltip</a></li>
        <li><a class="nav-link" href="bootstrap-typography.html">Typography</a></li>
        </ul>
    </li> --}}
    <li class="menu-header">user</li>
    <li class="dropdown {{Request::is('admin/users') ? 'active':''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-secret"></i> <span class="text-capitalize">data user</span></a>
        <ul class="dropdown-menu">
        <li class="{{Request::is('admin/users') ? 'active':''}}">
            <a class="nav-link text-capitalize" href="{{url('admin/users')}}">user</a>
        </li>
        </ul>
    </li>
    <li class="menu-header">Pages</li>
    <li class="dropdown {{Request::is('admin/tambah/users') ? 'active':''}} || {{Request::is('admin/reset-password') ? 'active':''}}">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
        <ul class="dropdown-menu">
        {{-- <li><a href="auth-forgot-password.html">Forgot Password</a></li>  --}}
        {{-- <li><a href="auth-login.html">Login</a></li>  --}}
        <li class="{{Request::is('admin/tambah/users') ? 'active':''}}"><a href="{{url('admin/tambah/users')}}" class="text-capitalize">add user</a></li> 
        <li class="{{Request::is('admin/reset-password') ? 'active':''}}"><a href="{{url('admin/reset-password')}}" class="text-capitalize">reset password</a></li> 
        </ul>
    </li>
    <li class="dropdown {{Request::is('admin/rintangangame') ? 'active':''}} || {{Request::is('admin/rintangangame/tambah') ? 'active':''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-play-circle"></i> <span class="text-capitalize">data rintangan</span></a>
        <ul class="dropdown-menu">
        <li class="{{Request::is('admin/rintangangame') ? 'active':''}}"><a class="nav-link" href="{{url('admin/rintangangame')}}">Rintangan Game</a></li> 
        <li class="{{Request::is('admin/rintangangame/tambah') ? 'active':''}}"><a class="nav-link" href="{{url('admin/rintangangame/tambah')}}">Tambah Rintangan Game</a></li> 
        {{-- <li><a class="nav-link" href="errors-404.html">404</a></li> 
        <li><a class="nav-link" href="errors-500.html">500</a></li>  --}}
        </ul>
    </li>
    <li class="dropdown {{Request::is('admin/levelgame') ? 'active':''}} || {{Request::is('admin/levelgame/tambah') ? 'active':''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-level-up-alt"></i> <span class="text-capitalize">data level game</span></a>
        <ul class="dropdown-menu">
        <li class="{{Request::is('admin/levelgame') ? 'active':''}}"><a class="nav-link" href="{{url('admin/levelgame')}}">Level Game</a></li> 
        <li class="{{Request::is('admin/levelgame/tambah') ? 'active':''}}"><a class="nav-link" href="{{url('admin/levelgame/tambah')}}">Tambah Level Game</a></li> 
        {{-- <li><a class="nav-link" href="errors-404.html">404</a></li> 
        <li><a class="nav-link" href="errors-500.html">500</a></li>  --}}
        </ul>
    </li>
    <li class="dropdown {{Request::is('admin/groupgame') ? 'active':''}} || {{Request::is('admin/groupgame/tambah') ? 'active':''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-layer-group"></i> <span class="text-capitalize">data kelompok game</span></a>
        <ul class="dropdown-menu">
        <li class="{{Request::is('admin/groupgame') ? 'active':''}}"><a class="nav-link" href="{{url('admin/groupgame')}}">Kelompok Game</a></li> 
        <li class="{{Request::is('admin/groupgame/tambah') ? 'active':''}}"><a class="nav-link" href="{{url('admin/groupgame/tambah')}}">Tambah Kelompok Game</a></li> 
        {{-- <li><a class="nav-link" href="errors-404.html">404</a></li> 
        <li><a class="nav-link" href="errors-500.html">500</a></li>  --}}
        </ul>
    </li>
    {{-- <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
        <ul class="dropdown-menu">
        <li><a class="nav-link" href="features-activities.html">Activities</a></li>
        <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
        <li><a class="nav-link" href="features-posts.html">Posts</a></li>
        <li><a class="nav-link" href="features-profile.html">Profile</a></li>
        <li><a class="nav-link" href="features-settings.html">Settings</a></li>
        <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
        <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
        <ul class="dropdown-menu">
        <li><a href="utilities-contact.html">Contact</a></li>
        <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
        <li><a href="utilities-subscribe.html">Subscribe</a></li>
        </ul>
    </li>             --}}
    {{-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li> --}}
    </ul>

    {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
    </a>
    </div>--}}
</aside>