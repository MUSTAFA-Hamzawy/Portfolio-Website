@php
    use Illuminate\Support\Facades\Auth;
    $authData = Auth::user();
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{!empty($authData->image) ? url('uploads/images/admin_profile/' .
                $authData->image) : url
                ('uploads/images/no_image.jpg')
                }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('profile-edit')}}" class="d-block">{{$authData->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu">
                    <a class="nav-link active">
                        <i class="nav-icon fas fa-copyright"></i>
                        <p>
                            Home Banner
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('show-home-banner')}}" class="nav-link ">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Edit</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu">
                    <a class="nav-link active">
                        <i class="nav-icon fas fa-copyright"></i>
                        <p>
                            About Info
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('about-show')}}" class="nav-link ">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Edit</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu">
                    <a class="nav-link active">
                        <i class="nav-icon fas fa-copyright"></i>
                        <p>
                            Portfolio
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('portfolio-show')}}" class="nav-link ">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Show List</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('portfolio-add')}}" class="nav-link ">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
