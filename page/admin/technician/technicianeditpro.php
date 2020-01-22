<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pelanggan</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form edit data</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (isset($_POST['submit'])){
                            $id         = $_POST['id'];
                            $idpel      = $_POST['idpel'];
                            $nama       = $_POST['nama_lengkap'];
                            $alamat     = addslashes($_POST['alamat']);
                            $lat        = $_POST['lat'];
                            $lng        = $_POST['lng'];

                            $input = mysqli_query($conn, "UPDATE tbl_pelanggan SET
                                            idpel                     = '$idpel',
                                            nama_lengkap_pelanggan    = '$nama',
                                            alamat                    = '$alamat',
                                            lat                       = '$lat',
                                            lng                       = '$lng'
                                            WHERE id_pelanggan        = '$id'");
                            if ($input){
                                echo '<div class="alert alert-success alert-dismissible show fade">'.
                                        '<div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>'.
                                            'Edit data berhasil <i class="fas fa-check-circle"></i>'.
                                        '</div>'.
                                    '</div>';
                                echo "<meta http-equiv='refresh' content='1;
                                url=?page=pelanggan'>";
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
        Copyright &copy; 2019 <div class="bullet"></div> PLN Sentani
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