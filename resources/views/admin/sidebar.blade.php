<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> GreenRecycle</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Interface</div>

    <!-- Nav Item - Recycling Center -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('/centres') }}">
            <i class="fas fa-fw fa-recycle"></i>
            <span>View Centers</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-recycle"></i>
            <span>View ..</span>
        </a>
    </li>

    <!-- Nav Item - Article -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('/articles') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>View Articles</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>View Comments</span>
        </a>
    </li>

    <!-- Nav Item - Event -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('/type-events') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>View Type Events</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('/events') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>View Events</span>
        </a>
    </li>

    <!-- Nav Item - Recycled Product -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('/products') }}">
            <i class="fas fa-fw fa-recycle"></i>
            <span>View Recycled Products</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('/categories') }}">
            <i class="fas fa-fw fa-recycle"></i>
            <span>View Categories</span>
        </a>
    </li>

    <!-- Nav Item - Formation -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('/formations') }}">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>View Formations</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('/inscriptions')}}">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>View Inscriptions</span>
        </a>
        <div id="collapseFormation" class="collapse" aria-labelledby="headingFormation"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Formation Programs:</h6>
                <a class="collapse-item" href="{{ url ('/formations')}}">View Formations</a>
                <a class="collapse-item" href="{{ url ('/inscriptions')}}">View Inscriptions</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Reclamation -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('/typeR') }}">
            <i class="fas fa-fw fa-exclamation-triangle"></i>
            <span>View Types</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('/reclamationsadmin') }}">
            <i class="fas fa-fw fa-exclamation-triangle"></i>
            <span>View Reclamations</span>
        </a>
    </li>

    <!-- Nav Item - Front Office -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url ('/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Front Office</span>
        </a>
    </li>

</ul>
