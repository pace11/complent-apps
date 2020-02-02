<?php 

$hit = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM complent_issue"));
$hit2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM complent_issue WHERE status='inprogress'"));

?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php 

                if (isset($_POST['submit'])) {
                    $id         = $_POST['id'];
                    $fullname   = $_POST['fullname'];
                    $email      = $_POST['email'];
                    $password   = $_POST['password'];
                    $update     = date('Y-m-d H:i:s');

                    $update = mysqli_query($conn, "UPDATE admin SET
                                        full_name        = '$fullname',
                                        email            = '$email',
                                        password         = '$password',
                                        updated_at       = '$update'
                                        WHERE id         = '$id'")
                                        or die (mysqli_error($conn));
                    if ($update) {
                        echo '<div class="alert alert-success alert-dismissible show fade">'.
                                '<div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>'.
                                    'Update data berhasil <i class="fas fa-check-circle"></i>'.
                                '</div>'.
                            '</div>';
                        echo "<meta http-equiv='refresh' content='1;
                        url=?page=profile'>";
                    }
                }
                ?>
            </div>
            <div class="col-md-12">
                <div class="card profile-widget">
                    <div class="profile-widget-header">                     
                        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Komplain Masuk</div>
                                <div class="profile-widget-item-value"><?= $hit ?></div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Komplain Aktif</div>
                                <div class="profile-widget-item-value"><?= $hit2 ?></div>
                            </div>
                            <div class="profile-widget-item">
                                <button id="btn-edit-profile" class="btn btn-primary">Edit</button>
                                <button id="btn-cancel" class="btn btn-danger">Batal</button>
                            </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div id="profile-detail">
                                <div class="profile-widget-name"><h3><?= $auth['full_name'] ?></h3></div>
                                <p><?= $auth['email'] ?></p>
                            </div>
                            <div id="profile-edit">
                                <form action="?page=profile" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="id" value="<?= $auth['id'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Lengkap <small class="text-danger">*</small></label>
                                                <input type="text" class="form-control" name="fullname" placeholder="masukkan nama lengkap ..." value="<?= $auth['full_name'] ?>" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email <small class="text-danger">*</small></label>
                                                <input type="email" class="form-control" name="email" placeholder="masukkan nama lengkap ..." value="<?= $auth['email'] ?>" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password <small class="text-danger">*</small></label>
                                                <input id="password-field" type="password" class="form-control" name="password" placeholder="masukkan password ..." autocomplete="off" maxlength="10" value="<?= $auth['password'] ?>" required>
                                                <span toggle="#password-field" class="fa fa-eye field-icon toggle-password"></span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div id="form-footer" class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            </form>
                        </div>
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
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            console.log("Geolocation is not supported by this browser");
        }
    }

    function showPosition(position) {
        document.getElementById("lat").value = position.coords.latitude;
        document.getElementById("lng").value = position.coords.longitude;
    }

</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#profile-detail').show();
    $('#profile-edit, #form-footer, #btn-cancel').hide();

    $("#btn-edit-profile").click(function(){
        $('#profile-edit, #form-footer, #btn-cancel').show(500);
        $('#profile-detail, #btn-edit-profile').hide(500);
    });

    $("#btn-cancel").click(function(){
        $('#profile-edit, #form-footer, #btn-cancel').hide(500);
        $('#profile-detail, #btn-edit-profile').show(500);
    });

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