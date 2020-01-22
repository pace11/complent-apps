<?php
  switch($_SESSION['role']){
    case 1:
      if (isset($_GET['page'])) $page=$_GET['page'];
      else $page="beranda";
      
      if ($page == "beranda") include("page/admin/beranda.php");
      elseif ($page == "logout") include("page/logout.php");

      // ---------------------------- technician ----------------------------
      elseif ($page == "technician")                   include("page/admin/technician/technician.php");
      elseif ($page == "technicianadd")                include("page/admin/technician/technicianadd.php");
      elseif ($page == "technicianaddpro")             include("page/admin/technician/technicianaddpro.php");
      elseif ($page == "technicianedit")               include("page/admin/technician/technicianedit.php");
      elseif ($page == "technicianeditpro")            include("page/admin/technician/technicianeditpro.php");
      elseif ($page == "technicianview")               include("page/admin/technician/technicianview.php");
      elseif ($page == "techniciandelete")             include("page/admin/technician/techniciandelete.php");
    break;
    case 2:
      if (isset($_GET['page'])) $page=$_GET['page'];
      else $page="beranda";
      
      if ($page == "beranda") include("page/technician/beranda.php");
      elseif ($page == "logout") include("page/logout.php");
    break;
    case 3:
      if (isset($_GET['page'])) $page=$_GET['page'];
      else $page="beranda";
      
      if ($page == "beranda") include("page/lead/beranda.php");
      elseif ($page == "logout") include("page/logout.php");
    break;
  }


?>