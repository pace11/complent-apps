<div class="main-content">
    <?php 
        $g      = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id_user='$_GET[id]'");
        $data   = mysqli_fetch_array($g);    
    ?>
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <?php 
                
                if (isset($_POST['submit'])){
                    $id         = $_POST['id'];
                    $nama       = $_POST['nama_lengkap'];
                    $email      = $_POST['email'];
                    $username   = $_POST['username'];
                    $password   = $_POST['password'];

                    $input = mysqli_query($conn,"UPDATE tbl_user SET
                        nama_lengkap    = '$nama',
                        email           = '$email',
                        username        = '$username',
                        password        = '$password'
                        WHERE id_user   = '$id'
                        ") or die (mysqli_error($conn));
                    
                    if ($input){
                        echo '<div class="alert alert-success alert-dismissible show fade">'.
                                '<div class="alert-body"><button class="close" data-dismiss="alert"><span>×</span></button>'.
                                    'Edit profil berhasil <i class="fas fa-check-circle"></i>'.
                                '</div>'.
                            '</div>';
                        echo "<meta http-equiv='refresh' content='1;
                        url=?page=profil&id=$data[id_user]'>";
                    }
                }
                
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form edit data</h4>
                    </div>
                    <div class="card-body">
                        <form action="?page=profil&id=<?= $data['id_user'] ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="badge badge-primary"><?= $data['id_user'] ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="hidden" name="id" value="<?= $data['id_user'] ?>">
                                        <input type="text" class="form-control" name="nama_lengkap" placeholder="masukkan nama lengkap ..." value="<?= $data['nama_lengkap'] ?>" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="masukkan email ..." value="<?= $data['email'] ?>" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <p><?= $data['jabatan'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="masukkan username ..." value="<?= $data['username'] ?>" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password-field" name="password" maxlength="5" type="text" class="form-control" placeholder="masukkan password (maks 5 karatker) ..." value="<?= $data['password'] ?>" autocomplete="off" required>
                                        <span toggle="#password-field" class="fas fa-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role Sebagai</label><br>
                                        <?= getRole($data['role']) ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                        <a href="?page=beranda" class="btn btn-secondary">Batal</a>
                    </div>
                    </form>
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