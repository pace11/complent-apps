<div class="main-content">
    <?php 
        $g      = mysqli_query($conn, "SELECT * FROM lead_technician WHERE id='$_GET[id]'");
        $data   = mysqli_fetch_array($g);    
    ?>
    <section class="section">
        <div class="section-header">
            <h1>Lead Teknisi</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form edit lead teknisi</h4>
                    </div>
                    <div class="card-body">
                        <form action="?page=leadeditpro" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="badge badge-primary"><?= $data['id'] ?></div>
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" name="fullname" placeholder="masukkan nama lengkap ..." autocomplete="off" value="<?= $data['full_name'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <small class="text-danger">*</small></label>
                                        <input type="email" class="form-control" name="email" placeholder="masukkan email ..." autocomplete="off" value="<?= $data['email'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir <small class="text-danger">*</small></label>
                                        <input type="date" class="form-control" name="dob" placeholder="masukkan tanggal lahir ..." autocomplete="off" value="<?= date('Y-m-d', strtotime($data['date_of_birth'])) ?>" required>
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
                                                <option style="display:none;">-- pilih salah satu provinsi --</option>
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
                                                    <option value="">-- pilih salah satu kota --</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Distrik <small class="text-danger">*</small></label>
                                                <select class="form-control" name="district" id="district">
                                                    <option value="">-- pilih salah satu distrik --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>password <small class="text-danger">*</small></label>
                                        <input id="password-field" type="password" class="form-control" name="password" placeholder="masukkan password ..." autocomplete="off" value="<?= $data['password'] ?>" maxlength="10" required>
                                        <span toggle="#password-field" class="fa fa-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Handphone <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control" maxlength="12" onkeyup="this.value=this.value.replace(/[^\d]/,'')" name="hp" placeholder="masukkan no hp ..." autocomplete="off" value="<?= $data['handphone'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat <small class="text-danger">*</small></label>
                                        <textarea class="form-control" name="address" placeholder="masukkan alamat ..." autocomplete="off" required><?= $data['full_address'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                        <a href="?page=lead" class="btn btn-secondary">Batal</a>
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
                    $('#district').html('<option value="">-- pilih salah satu distrik --</option>');
                }
            }); 
        }else{
            $('#regency').html('<option value="">-- pilih salah satu kota --</option>');
            $('#district').html('<option value="">-- pilih salah satu distrik --</option>');
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
            $('#district').html('<option value="">-- pilih salah satu distrik --</option>'); 
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