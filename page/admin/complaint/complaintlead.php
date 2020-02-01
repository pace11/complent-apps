<?php 

$q = mysqli_query($conn, "SELECT * FROM complent_issue 
                        JOIN users ON complent_issue.user_id=users.id
                        WHERE complent_issue.id=$_GET[id]");
$data = mysqli_fetch_array($q);

?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Komplain Klien</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form pemilihan lead teknisi</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info alert-has-icon">
                        <div class="alert-icon"><i class="fas fa-info-circle"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Informasi</div>
                                Silahkan pilih terlebih dahulu Lead Teknisi yang akan mengambil komplain klien ini. data Lead Teknisi yang muncul dibawah telah disesuaikan dengan lokasi dari kota Klien.
                            </div>
                        </div>
                        <form action="?page=complaintleadpro" method="post">
                            <div class="row">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Lead Teknisi<small class="text-danger">*</small></label>
                                        <select class="form-control" name="lead" required>
                                        <option style="display:none;">-- pilih lead/teknisi --</option>
                                            <?php 
                                                $q = mysqli_query($conn, "SELECT * from lead_technician WHERE regency_id='$data[regency_id]'");
                                                while($datas = mysqli_fetch_array($q)){
                                                    echo '<option value='.$datas['id'].'>'.$datas['full_name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            <a href="?page=complaint" class="btn btn-secondary">Batal</a>
                        </form>
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