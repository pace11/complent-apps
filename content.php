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

      // ---------------------------- lead ----------------------------
      elseif ($page == "lead")                         include("page/admin/lead/lead.php");
      elseif ($page == "leadadd")                      include("page/admin/lead/leadadd.php");
      elseif ($page == "leadaddpro")                   include("page/admin/lead/leadaddpro.php");
      elseif ($page == "leadedit")                     include("page/admin/lead/leadedit.php");
      elseif ($page == "leadeditpro")                  include("page/admin/lead/leadeditpro.php");
      elseif ($page == "leadview")                     include("page/admin/lead/leadview.php");
      elseif ($page == "leaddelete")                   include("page/admin/lead/leaddelete.php");

      // ---------------------------- client ----------------------------\
      elseif ($page == "client")                       include("page/admin/client/client.php");
      elseif ($page == "clientadd")                    include("page/admin/client/clientadd.php");
      elseif ($page == "clientaddpro")                 include("page/admin/client/clientaddpro.php");
      elseif ($page == "clientedit")                   include("page/admin/client/clientedit.php");
      elseif ($page == "clienteditpro")                include("page/admin/client/clienteditpro.php");
      elseif ($page == "clientview")                   include("page/admin/client/clientview.php");
      elseif ($page == "clientdelete")                 include("page/admin/client/clientdelete.php");

      // ---------------------------- complaint ----------------------------
      elseif ($page == "complaint")                    include("page/admin/complaint/complaint.php");
      elseif ($page == "complaintlead")                include("page/admin/complaint/complaintlead.php");
      elseif ($page == "complaintleadpro")             include("page/admin/complaint/complaintleadpro.php");

    break;
    case 2:
      if (isset($_GET['page'])) $page=$_GET['page'];
      else $page="beranda";
      
      if ($page == "beranda") include("page/technician/beranda.php");

      // ---------------------------- profil ----------------------------
      elseif ($page == "profil")                       include("page/technician/profile/profile.php");

      // ---------------------------- complaint ----------------------------
      elseif ($page == "complaint")                    include("page/technician/complaint/complaint.php");
      elseif ($page == "complaintdone")                include("page/technician/complaint/complaintdone.php");

      elseif ($page == "logout") include("page/logout.php");
    break;
    case 3:
      if (isset($_GET['page'])) $page=$_GET['page'];
      else $page="beranda";
      
      if ($page == "beranda") include("page/lead/beranda.php");

      // ---------------------------- complaint ----------------------------
      elseif ($page == "complaint")                    include("page/lead/complaint/complaint.php");
      elseif ($page == "complainttech")                include("page/lead/complaint/complainttech.php");
      elseif ($page == "complainttechpro")             include("page/lead/complaint/complainttechpro.php");

      // ---------------------------- technician ----------------------------
      elseif ($page == "technician")                   include("page/lead/technician/technician.php");
      elseif ($page == "technicianadd")                include("page/lead/technician/technicianadd.php");
      elseif ($page == "technicianaddpro")             include("page/lead/technician/technicianaddpro.php");
      elseif ($page == "technicianedit")               include("page/lead/technician/technicianedit.php");
      elseif ($page == "technicianeditpro")            include("page/lead/technician/technicianeditpro.php");
      elseif ($page == "technicianview")               include("page/lead/technician/technicianview.php");
      elseif ($page == "techniciandelete")             include("page/lead/technician/techniciandelete.php");

      elseif ($page == "logout") include("page/logout.php");
    break;
    default:
      if (isset($_GET['page'])) $page=$_GET['page'];
      else $page="beranda";
      
      if ($page == "beranda") include("page/client/beranda.php");

      // ---------------------------- complaint ----------------------------
      elseif ($page == "complaint")                    include("page/client/complaint/complaint.php");
      elseif ($page == "complaintadd")                 include("page/client/complaint/complaintadd.php");
      elseif ($page == "complaintaddpro")              include("page/client/complaint/complaintaddpro.php");
      elseif ($page == "complaintdelete")              include("page/client/complaint/complaintdelete.php");
      
      elseif ($page == "logout") include("page/logout.php");
    break;
  }


?>