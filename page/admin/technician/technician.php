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
                        <div class="card-header-action">
                            <a href="?page=technicianadd" class="btn btn-primary btn-icon icon-left"><i class="fas fa-plus-circle"></i>Tambah data teknisi</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Technician</th>
                                        <th>Full Name</th>
                                        <th>Full Name Lead Technician</th>
                                        <th>Address</th>
                                        <th>Lat</th>
                                        <th>Lng</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1; 
                                $q = mysqli_query($conn, "SELECT lead_technician.full_name as fullname_lead, technician.id as id_tech, technician.full_name as fullname_tech, technician.full_address as address_tech, technician.lat as lat_tech, technician.lng as lng_tech, technician.status as status_tech FROM technician
                                                        JOIN lead_technician ON technician.lead_technician_id=lead_technician.id");
                                while($data=mysqli_fetch_array($q)){
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td>
                                            <div class="badge badge-info"><i class="fas fa-user"></i> <?= $data['id_tech'] ?></div>
                                        </td>
                                        <td><?= $data['fullname_tech'] ?></td>
                                        <td><?= $data['fullname_lead'] ?></td>
                                        <td><?= $data['address_tech'] ?></td>
                                        <td><?= $data['lat_tech'] ?></td>
                                        <td><?= $data['lng_tech'] ?></td>
                                        <td><?= $data['status_tech'] == 'online' ? '<div class="badge badge-success">online</div>' : '<div class="badge badge-light">offline</div>' ?></td>
                                        <td>
                                            <a href="?page=technicianedit&id=<?= $data['id_tech'] ?>" class="btn btn-primary">edit</a>
                                            <a href="?page=techniciandelete&id=<?= $data['id_tech'] ?>" class="btn btn-danger">hapus</a>
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