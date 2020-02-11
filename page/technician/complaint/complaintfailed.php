<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Komplain Klien</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form update tidak selesai komplain klien</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-light alert-has-icon">
                        <div class="alert-icon"><i class="fas fa-info-circle"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Peringatan</div>
                                Apakah anda ingin mengupdate data ini ?
                                <form action="?page=complaintfailed" method="post">
                                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                    <input type="submit" name="submit" class="btn btn-danger" value="Ya">
                                    <a href="?page=complaint" class="btn btn-info">Batal</a>
                                </form>
                            </div>
                        </div>
                        <?php 
                        if (isset($_POST['submit'])){
                            $id         = $_POST['id'];
                            $updated    = date('Y-m-d H:i:s');
                            $update = mysqli_query($conn,"UPDATE complent_issue SET status='failed' WHERE id=$id");
                            if ($update){
                                echo '<div class="alert alert-info alert-dismissible show fade">'.
                                        '<div class="alert-body">'.
                                            'Update data berhasil <i class="fas fa-check-circle"></i>'.
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