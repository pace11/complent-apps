<?php 
    $hit     = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM complent_issue WHERE technician_id='$auth[id]'"));
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Komplain</h4>
                        </div>
                        <div class="card-body"><?= $hit ?></div>
                    </div>
                </div>
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