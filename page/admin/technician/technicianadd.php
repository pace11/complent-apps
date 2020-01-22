<div class="main-content">
    <?php 
        $get_id = mysqli_query($conn, "SELECT id FROM technician WHERE SUBSTRING(id,1,1)='T'") or die (mysqli_error($conn));
        $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id,-5,5) as hasil FROM technician WHERE SUBSTRING(id,1,1)='T' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
        $hit    = mysqli_num_rows($get_id);
        if ($hit == 0){
            $id_k   = "T00001";
        } else if ($hit > 0){
            $row    = mysqli_fetch_array($trim_id);
            $kode   = $row['hasil']+1;
            $id_k   = "T".str_pad($kode,5,"0",STR_PAD_LEFT); 
        }      
    ?>
    <section class="section">
        <div class="section-header">
            <h1>Teknisi</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form tambah teknisi</h4>
                    </div>
                    <div class="card-body">
                        <form action="?page=technicianaddpro" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="badge badge-primary"><?= $id_k ?></div>
                                    <input type="hidden" name="id" value="<?= $id_k ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" name="fullname" placeholder="masukkan nama lengkap ..." autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <small class="text-danger">*</small></label>
                                        <input type="email" class="form-control" name="email" placeholder="masukkan email ..." autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir <small class="text-danger">*</small></label>
                                        <input type="date" class="form-control" name="dob" placeholder="masukkan tanggal lahir ..." autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Provinsi <small class="text-danger">*</small></label>
                                                <select class="form-control" name="provincy" id="provincy">
                                                    <?php 
                                                        $q = mysqli_query($conn, "SELECT * from provinces");
                                                        while($datas = mysqli_fetch_array($q)){
                                                            echo '<option value='.$datas['id'].'>'.$datas['name'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Kota <small class="text-danger">*</small></label>
                                                <select class="form-control" name="regency" id="regency">
                                                    <option value="">-- select regency --</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Distrik <small class="text-danger">*</small></label>
                                                <select class="form-control" name="district" id="district">
                                                    <option value="">-- select district --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Lead Teknisi <small class="text-danger">*</small></label>
                                        <select class="form-control" name="leadtech">
                                            <?php 
                                                $qe = mysqli_query($conn, "SELECT lead_technician.full_name as fullname, lead_technician.id as idlead, regencies.name as nameregency from lead_technician
                                                                        JOIN regencies ON lead_technician.regency_id=regencies.id");
                                                while($data = mysqli_fetch_array($qe)){
                                                    echo '<option value='.$data['idlead'].'>'.$data['fullname'].' ['.$data['nameregency'].']</option>';
                                                }
                                                echo '<option value="">-- lead technician not available --</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password <small class="text-danger">*</small></label>
                                        <input id="password-field" type="password" class="form-control" name="password" placeholder="masukkan password ..." autocomplete="off" required>
                                        <span toggle="#password-field" class="fa fa-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Handphone <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" maxlength="12" onkeyup="this.value=this.value.replace(/[^\d]/,'')" name="hp" placeholder="masukkan no hp ..." autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat <small class="text-danger">*</small></label>
                                        <textarea class="form-control" name="address" placeholder="masukkan alamat ..." autocomplete="off" required></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                        <a href="?page=user" class="btn btn-secondary">Batal</a>
                    </div>
                    </form>
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
<script type="text/javascript">
$(document).ready(function(){
    $('#provincy').on('change',function(){
        var provincyId = $(this).val();
        if(provincyId){
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:'provincy_id='+provincyId,
                success:function(html){
                    $('#regency').html(html);
                    $('#district').html('<option value="">-- select district --</option>');
                }
            }); 
        }else{
            $('#regency').html('<option value="">-- select district --</option>');
            $('#district').html('<option value="">-- select regency --</option>');
        }
    });

    $('#regency').on('change',function(){
        var regencyId = $(this).val();
        if(regencyId){
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:'regency_id='+regencyId,
                success:function(html){
                    $('#district').html(html);
                }
            }); 
        }else{
            $('#district').html('<option value="">-- select district --</option>'); 
        }
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye-slash");
                var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>