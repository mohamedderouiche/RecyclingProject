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
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecycling"
            aria-expanded="true" aria-controls="collapseRecycling">
            <i class="fas fa-fw fa-recycle"></i>
            <span>Recycling Center</span>
        </a>
        <div id="collapseRecycling" class="collapse" aria-labelledby="headingRecycling"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Recycling Options:</h6>
                <a class="collapse-item" href="#">View Centers</a>
                <a class="collapse-item" href="#">View ..</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArticle"
            aria-expanded="true" aria-controls="collapseArticle">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Article</span>
        </a>
        <div id="collapseArticle" class="collapse" aria-labelledby="headingArticle"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Article Management:</h6>
                <a class="collapse-item" href="#">View Articles</a>
                <a class="collapse-item" href="#">View Comments</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent"
            aria-expanded="true" aria-controls="collapseEvent">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Event</span>
        </a>
        <div id="collapseEvent" class="collapse" aria-labelledby="headingEvent"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Event Management:</h6>
                <a class="collapse-item" href="{{ url ('/type-events')}}">View Type Events</a>
                <a class="collapse-item" href="{{ url ('/events')}}">View  Events</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecycledProduct"
            aria-expanded="true" aria-controls="collapseRecycledProduct">
            <i class="fas fa-fw fa-recycle"></i>
            <span>Recycled Product</span>
        </a>
        <div id="collapseRecycledProduct" class="collapse" aria-labelledby="headingRecycledProduct"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Products option :</h6>
                <a class="collapse-item" href="#">View Recycled Products</a>
                <a class="collapse-item" href="{{ url ('/categories')}}">View categories</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFormation"
            aria-expanded="true" aria-controls="collapseFormation">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Formation</span>
        </a>
        <div id="collapseFormation" class="collapse" aria-labelledby="headingFormation"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Formation Programs:</h6>
                <a class="collapse-item" href="{{ url ('/formations')}}">View Formations</a>
                <a class="collapse-item" href="#">View Inscriptions</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReclamation"
            aria-expanded="true" aria-controls="collapseReclamation">
            <i class="fas fa-fw fa-exclamation-triangle"></i>
            <span>Reclamation</span>
        </a>
        <div id="collapseReclamation" class="collapse" aria-labelledby="headingReclamation"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Reclamation Management:</h6>
                <a class="collapse-item" href="{{ url ('/typeR')}}"> view Types</a>
                <a class="collapse-item" href="{{ url ('/reclamationsadmin')}}">View Reclamations</a>

            </div>
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Front Office</span></a>
    </li>






</ul>
