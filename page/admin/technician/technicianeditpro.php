<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Teknisi</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form edit teknisi</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (isset($_POST['submit'])){
                            $id         = $_POST['id'];
                            $fullname   = $_POST['fullname'];
                            $email      = $_POST['email'];
                            $dob        = date('Y-m-d', strtotime($_POST['dob']));
                            $provincy   = $_POST['provincy'];
                            $regency    = $_POST['regency'];
                            $district   = $_POST['district'];
                            $leadtech   = $_POST['leadtech'];
                            $password   = $_POST['password'];
                            $handphone  = $_POST['hp'];
                            $address    = addslashes($_POST['address']);

                            $input = mysqli_query($conn, "UPDATE technician SET
                                            province_id        = '$provincy',
                                            regency_id         = '$regency',
                                            district_id        = '$district',
                                            lead_technician_id = '$leadtech',
                                            full_name          = '$fullname',
                                            email              = '$email',
                                            password           = '$password',
                                            handphone          = '$handphone',
                                            date_of_birth      = '$dob',
                                            full_address       = '$address'
                                            WHERE id           = '$id'") or die (mysqli_error($conn));
                            if ($input){
                                echo '<div class="alert alert-success alert-dismissible show fade">'.
                                        '<div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>'.
                                            'Edit data berhasil <i class="fas fa-check-circle"></i>'.
                                        '</div>'.
                                    '</div>';
                                echo "<meta http-equiv='refresh' content='1;
                                url=?page=technician'>";
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