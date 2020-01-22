<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login - PLN Sentani</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">

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
  </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="assets/img/bearlink.png" alt="logo" width="100" class="shadow-light">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <div class="card-body">
                <form action="login.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input id="password-field" name="password" maxlength="10" type="text" class="form-control" autocomplete="off" required>
                    <span toggle="#password-field" class="fa fa-eye field-icon toggle-password"></span>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Login">
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <?php 
                if (isset($_POST['submit'])){
                  session_start();
                  date_default_timezone_set('Asia/Jakarta');
                  include "lib/koneksi.php";

                  $e  = $_POST['email'];
                  $p  = $_POST['password'];
                  
                  $ceklogin1 = mysqli_query($conn, "SELECT * FROM admin WHERE BINARY email='$e' AND password='$p'");
                  $data1     = mysqli_fetch_array($ceklogin1);
                  $hit1      = mysqli_num_rows($ceklogin1);

                  $ceklogin2 = mysqli_query($conn, "SELECT * FROM technician WHERE BINARY email='$e' AND password='$p'");
                  $data2     = mysqli_fetch_array($ceklogin2);
                  $hit2      = mysqli_num_rows($ceklogin2);

                  $ceklogin3 = mysqli_query($conn, "SELECT * FROM lead_technician WHERE BINARY email='$e' AND password='$p'");
                  $data3     = mysqli_fetch_array($ceklogin3);
                  $hit3      = mysqli_num_rows($ceklogin3);
                  
                  if ($hit1 > 0){
                    
                    echo '<div class="alert alert-success alert-dismissible show fade">'.
                            '<div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>'.
                              'Login berhasil <i class="fas fa-check-circle"></i></div>'.
                        '</div>';

                    echo "<meta http-equiv='refresh' content='1;
                    url=index.php?page=beranda'>";
                    $_SESSION['role']      = 1;
                    $_SESSION['iduser']    = $data1['id'];
                    $_SESSION['email']     = $data1['email'];
                    $_SESSION['password']  = $data1['password'];
                  }

                  if ($hit2 > 0){
                    
                    echo '<div class="alert alert-success alert-dismissible show fade">'.
                            '<div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>'.
                              'Login berhasil <i class="fas fa-check-circle"></i></div>'.
                        '</div>';

                    echo "<meta http-equiv='refresh' content='1;
                    url=index.php?page=beranda'>";
                    $_SESSION['role']      = 2;
                    $_SESSION['iduser']    = $data2['id'];
                    $_SESSION['email']     = $data2['email'];
                    $_SESSION['password']  = $data2['password'];
                  }

                  if ($hit3 > 0){
                    
                    echo '<div class="alert alert-success alert-dismissible show fade">'.
                            '<div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>'.
                              'Login berhasil <i class="fas fa-check-circle"></i></div>'.
                        '</div>';

                    echo "<meta http-equiv='refresh' content='1;
                    url=index.php?page=beranda'>";
                    $_SESSION['role']      = 3;
                    $_SESSION['iduser']    = $data3['id'];
                    $_SESSION['email']     = $data3['email'];
                    $_SESSION['password']  = $data3['password'];
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye-slash");
            var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
  </script>
</body>
</html>
