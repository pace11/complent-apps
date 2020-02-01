<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php">Bearlink Apps</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">PLN</a>
    </div>
    <ul class="sidebar-menu">
      <li><a class="nav-link" href="?page=beranda"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
      <?php if ($_SESSION['role'] == 1) { ?>
      <li><a class="nav-link" href="?page=technician"><i class="fas fa-users"></i> <span>Teknisi</span></a></li>
      <li><a class="nav-link" href="?page=lead"><i class="fas fa-user"></i> <span>Lead Teknisi</span></a></li>
      <li><a class="nav-link" href="?page=client"><i class="fas fa-user"></i> <span>Klien</span></a></li>
      <li><a class="nav-link" href="?page=complaint"><i class="fas fa-inbox"></i> <span>Komplain Klien</span></a></li>
      <?php } ?>
      <?php if ($_SESSION['role'] == 3) { ?>
      <li><a class="nav-link" href="?page=technician"><i class="fas fa-users"></i> <span>Teknisi</span></a></li>
      <?php } ?>
      <?php if ($_SESSION['role'] == 2 || $_SESSION['role'] == 3 || $_SESSION['role'] == 4) { ?>
      <li><a class="nav-link" href="?page=complaint"><i class="fas fa-inbox"></i> <span>Komplain</span></a></li>
      <?php } ?>
    </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="?page=logout" class="btn btn-danger btn-lg btn-block btn-icon-split">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </aside>
</div>