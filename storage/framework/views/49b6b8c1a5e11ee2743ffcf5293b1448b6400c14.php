<div class="navbar nav_title" style="border: 0;">
    <a href="<?php echo e(url('/')); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
</div>
<div class="clearfix"></div>

<!-- menu prile quick info -->
<div class="profile">
    <div class="profile_pic">
        <img src="<?php echo e(URL::asset('images')); ?>/img.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2><?php echo e(Auth::user()->username); ?></h2>
    </div>
</div>
<!-- /menu prile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            
            <li><a><i class="fa fa-home"></i> Company <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo e(url('/add-company')); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add Company</a>
                    </li>
                    <li><a href="<?php echo e(url('/company-list')); ?>"><i class="fa fa-list-ul" aria-hidden="true"></i> Company List </a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-users"></i> Teams <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo e(url('/add-team')); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add Teams</a>
                    </li>
                    <li><a href="<?php echo e(url('/team-list')); ?>"><i class="fa fa-list-ul" aria-hidden="true"></i> Team Lists </a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-th-list"></i> Projects <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo e(url('/add-project')); ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add Project</a>
                    </li>
                    <li><a href="<?php echo e(url('/project-list')); ?>"><i class="fa fa-list-ul" aria-hidden="true"></i> Project List </a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-users"></i> Clients <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Add Client</a>
                    </li>
                    <li><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i> Client List </a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo e(url('/users-list')); ?>"><i class="fa fa-list-ul" aria-hidden="true"></i> User List</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->


