<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
<form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle"><a id="notifikasi" href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i></a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Notifikasi</div>
            <div id="isinotifikasi" class="dropdown-list-content dropdown-list-icons">
            
            </div>
        <div class="dropdown-footer text-center">
        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
    </li>
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
    <div class="d-sm-none d-lg-inline-block">Hi, <?= $auth['full_name'] ?></div></a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title"><?= $auth['full_name'] ?></div>
        <a href="?page=profil&id=<?= $auth['id'] ?>" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
            <a href="?page=logout" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
    </li>
</ul>
</nav>