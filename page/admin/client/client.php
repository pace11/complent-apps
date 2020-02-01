<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Klien</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Klien</h4>
                        <div class="card-header-action">
                            <a href="?page=clientadd" class="btn btn-primary btn-icon icon-left"><i class="fas fa-plus-circle"></i>Tambah data klien</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Klien</th>
                                        <th>Nama</th>
                                        <th>Provinsi</th>
                                        <th>Kota</th>
                                        <th>Kecamatan</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1; 
                                $q = mysqli_query($conn, "SELECT users.id as id, users.handphone as handphone, users.full_name as full_name, provinces.name as provincy_name, regencies.name as regency_name, districts.name as district_name, users.full_address as address, users.handphone as handphone FROM users
                                                        JOIN provinces ON users.province_id=provinces.id
                                                        JOIN regencies ON users.regency_id=regencies.id
                                                        JOIN districts ON users.district_id=districts.id") or die (mysqli_error($conn));
                                while($data=mysqli_fetch_array($q)){
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td>
                                            <div class="badge badge-info"><i class="fas fa-user"></i> <?= $data['id'] ?></div>
                                        </td>
                                        <td><?= $data['full_name'] ?></td>
                                        <td><?= $data['provincy_name'] ?></td>
                                        <td><?= $data['regency_name'] ?></td>
                                        <td><?= $data['district_name'] ?></td>
                                        <td><?= $data['address'] ?></td>
                                        <td><?= $data['handphone'] ?></td>
                                        <td>
                                            <a href="?page=clientedit&id=<?= $data['id'] ?>" class="btn btn-primary">edit</a>
                                            <a href="?page=clientdelete&id=<?= $data['id'] ?>" class="btn btn-danger">hapus</a>
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