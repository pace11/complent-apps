<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Logout</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="alert alert-warning alert-dismissible show fade">
                    <div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>
                        Logout Proses ... <i class="fas fa-refresh"></i>
                    </div>
                </div>
                <?php
                    if ($_SESSION['role'] == 2) {
                        mysqli_query($conn, "UPDATE technician SET status='offline' WHERE id='$_SESSION[iduser]'");
                    }
                    
                    if ($_SESSION['role'] == 3) {
                        mysqli_query($conn, "UPDATE lead_technician SET status='offline' WHERE id='$_SESSION[iduser]'");
                    }
                    session_destroy();
                    echo"<meta http-equiv='refresh' content='1;
                        url=login.php'>";
                ?>
            </div>
        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2020 <div class="bullet"></div> Bearlink
    </div>
    <div class="footer-right">
        V 1.0.0
    </div>
</footer>
</div>
</div>
<?php
    include "script.php";
    include "jq.php";
?>