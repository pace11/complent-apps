<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Teknisi</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Teknisi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Teknisi</th>
                                        <th>Nama</th>
                                        <th>Provinsi</th>
                                        <th>Kota</th>
                                        <th>Kecamatan</th>
                                        <th>Nama Lead Teknisi</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1; 
                                $q = mysqli_query($conn, "SELECT lead_technician.full_name as fullname_lead, technician.id as id_tech, technician.handphone as handphone_tech, provinces.name as provincy_name, regencies.name as regency_name, districts.name as district_name, technician.full_name as fullname_tech, technician.full_address as address_tech, technician.status as status_tech FROM technician
                                                        JOIN lead_technician ON technician.lead_technician_id=lead_technician.id
                                                        JOIN provinces ON technician.province_id=provinces.id
                                                        JOIN regencies ON technician.regency_id=regencies.id
                                                        JOIN districts ON technician.district_id=districts.id
                                                        WHERE technician.regency_id='$auth[regency_id]'") or die (mysqli_error($conn));
                                while($data=mysqli_fetch_array($q)){
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td>
                                            <div class="badge badge-info"><i class="fas fa-user"></i> <?= $data['id_tech'] ?></div>
                                        </td>
                                        <td><?= $data['fullname_tech'] ?></td>
                                        <td><?= $data['provincy_name'] ?></td>
                                        <td><?= $data['regency_name'] ?></td>
                                        <td><?= $data['district_name'] ?></td>
                                        <td><?= $data['fullname_lead'] ?></td>
                                        <td><?= $data['address_tech'] ?></td>
                                        <td><?= $data['handphone_tech'] ?></td>
                                        <td><?= getStatus($data['status_tech']) ?></td>
                                    </tr>
                                <?php $no++; } ?>
                            </table>
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