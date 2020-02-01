<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Klien</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form hapus klien</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-light alert-has-icon">
                        <div class="alert-icon"><i class="fas fa-info-circle"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Peringatan</div>
                                Apakah anda ingin menghapus data ini ?
                                <form action="?page=leaddelete" method="post">
                                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                    <input type="submit" name="submit" class="btn btn-danger" value="Ya">
                                    <a href="?page=client" class="btn btn-info">Batal</a>
                                </form>
                            </div>
                        </div>
                        <?php 
                        if (isset($_POST['submit'])){
                            $id = $_POST['id'];
                            $delete = mysqli_query($conn,"DELETE FROM users WHERE id='$id'");
                            if($delete){
                                echo '<div class="alert alert-info alert-dismissible show fade">'.
                                        '<div class="alert-body">'.
                                            'Hapus data berhasil <i class="fas fa-check-circle"></i>'.
                                        '</div>'.
                                    '</div>';
                                echo "<meta http-equiv='refresh' content='1;
                                url=?page=client'>";
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