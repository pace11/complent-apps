<?php 

$q = mysqli_query($conn, "SELECT * FROM complent_issue 
                        JOIN users ON complent_issue.user_id=users.id
                        WHERE complent_issue.id=$_GET[id]");
$data = mysqli_fetch_array($q);


$d = mysqli_query($conn, "SELECT id, full_name, lat, lng from technician WHERE regency_id='$data[regency_id]'");
while($datas = mysqli_fetch_array($d)) {
    if (getTechAvailabe($datas['id'])) {
        $a[] = [
            'id' => $datas['id'],
            'full_name' => $datas['full_name'],
            'range' => round(getHaversine($datas['lat'],$datas['lng'], $data['lat'],$data['lng']),3),
        ];
    }
}
    $keys = array_column($a, 'range');
    array_multisort($keys, SORT_ASC, $a);
    $isi = json_encode($a);

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
                        <h4>Form pemilihan teknisi</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info alert-has-icon">
                        <div class="alert-icon"><i class="fas fa-info-circle"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Informasi</div>
                                Silahkan pilih terlebih dahulu Teknisi yang akan mengambil komplain klien ini. data Teknisi yang muncul dibawah telah disesuaikan dengan lokasi dari kota Klien.
                            </div>
                        </div>
                        <form action="?page=complainttechpro" method="post">
                            <div class="row">
                                <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Teknisi<small class="text-danger">*</small></label>
                                        <select class="form-control" name="tech" required>
                                        <option style="display:none;">-- pilih teknisi --</option>
                                            <?php
                                                foreach(json_decode($isi) as $val){
                                                    echo '<option value='.$val->id.'>'.$val->full_name.' ('.$val->range.' Km)</option>';
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