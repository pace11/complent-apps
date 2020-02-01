<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card profile-widget">
                    <div class="profile-widget-header">                     
                        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Komplain Masuk</div>
                                <div class="profile-widget-item-value">187</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Komplain Aktif</div>
                                <div class="profile-widget-item-value">6,8K</div>
                            </div>
                            <div class="profile-widget-item">
                                <button class="btn btn-primary">Ubah Data</button>
                            </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"><h3><?= $auth['full_name'] ?></h3></div>
                            <p><?= getNameProvince($auth['province_id']).' / '.getNameRegency($auth['regency_id']).' / '.getNameDistrict($auth['district_id']) ?></p>
                            <p><?= date('d F Y', strtotime($auth['date_of_birth'])) ?></p>
                            <p><?= $auth['email'] ?></p>
                            <p><?= $auth['handphone'] ?></p>
                        </div>
                        <div class="card-footer text-center">
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