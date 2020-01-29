<?php 
   session_start();
   if (!empty($_SESSION['role']) && !empty($_SESSION['iduser']) && !empty($_SESSION['email']) && !empty($_SESSION['password']))
   {
      date_default_timezone_set('Asia/Jakarta');
      include "lib/koneksi.php";
      error_reporting( error_reporting() & ~E_NOTICE )
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard - Bearlink Apps</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="node_modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="node_modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <style>
    .field-icon {
      float: right;
      margin-right: 8px;
      margin-top: -27px;
      position: relative;
      z-index: 2;
      cursor:pointer;
    }
    #mapCanvas {
      width: 100%;
      height: 400px;
    }
  </style>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <?php 
        include "service.php";
        include "header.php"; 
        include "sidebar.php";
        include "content.php"; 
      ?>
</body>
</html>
<?php
}
else { ?>
<div class="col-md-12" align="center">
  <button type="button" name="button" class="btn btn-primary">Login Terlebih dahulu</button>
</div>

<?php echo"<meta http-equiv='refresh' content='1;
url=login.php'>";
} ?>