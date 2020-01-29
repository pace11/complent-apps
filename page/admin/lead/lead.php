<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lead Teknisi</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Lead Teknisi</h4>
                        <div class="card-header-action">
                            <a href="?page=leadadd" class="btn btn-primary btn-icon icon-left"><i class="fas fa-plus-circle"></i>Tambah data lead teknisi</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Lead Teknisi</th>
                                        <th>Nama</th>
                                        <th>Provinsi</th>
                                        <th>Kota</th>
                                        <th>Kecamatan</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1; 
                                $q = mysqli_query($conn, "SELECT lead_technician.id as id, lead_technician.handphone as handphone, lead_technician.full_name as full_name, provinces.name as provincy_name, regencies.name as regency_name, districts.name as district_name, lead_technician.full_address as address, lead_technician.handphone as handphone, lead_technician.status as status FROM lead_technician
                                                        JOIN provinces ON lead_technician.province_id=provinces.id
                                                        JOIN regencies ON lead_technician.regency_id=regencies.id
                                                        JOIN districts ON lead_technician.district_id=districts.id") or die (mysqli_error($conn));
                                while($data=mysqli_fetch_array($q)){
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td>
                                            <div class="badge badge-info"><i class="fas fa-user"></i> <?= $data['id'] ?></div>
                                        </td>
                                        <td><?= $data['fullname'] ?></td>
                                        <td><?= $data['provincy_name'] ?></td>
                                        <td><?= $data['regency_name'] ?></td>
                                        <td><?= $data['district_name'] ?></td>
                                        <td><?= $data['address'] ?></td>
                                        <td><?= $data['handphone'] ?></td>
                                        <td><?= $data['status'] == 'online' ? '<div class="badge badge-success">online</div>' : '<div class="badge badge-light">offline</div>' ?></td>
                                        <td>
                                            <a href="?page=leadedit&id=<?= $data['id'] ?>" class="btn btn-primary">edit</a>
                                            <a href="?page=leaddelete&id=<?= $data['id'] ?>" class="btn btn-danger">hapus</a>
                                        </td>
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