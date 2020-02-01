<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Komplain Klien</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form pemilihan teknisi</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (isset($_POST['submit'])){
                            $id         = $_POST['id'];
                            $tech       = $_POST['tech'];
                            $updated    = date('Y-m-d H:i:s');

                            $input = mysqli_query($conn, "UPDATE complent_issue SET
                                            technician_id      = '$tech',
                                            updated_at         = '$updated'
                                            WHERE id           = $id") or die (mysqli_error($conn));
                            if ($input){
                                echo '<div class="alert alert-success alert-dismissible show fade">'.
                                        '<div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>'.
                                            'Simpan data berhasil <i class="fas fa-check-circle"></i>'.
                                        '</div>'.
                                    '</div>';
                                echo "<meta http-equiv='refresh' content='1;
                                url=?page=complaint'>";
                            }
                        }
                        ?>
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