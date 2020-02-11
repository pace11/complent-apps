<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Komplain Klien</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Komplain Klien</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Id User</th>
                                        <th>Nama User</th>
                                        <th>Alamat User</th>
                                        <th>Nama Lead Teknisi</th>
                                        <th>Nama Teknisi</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Update Terakhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1; 
                                $q = mysqli_query($conn, "SELECT * FROM complent_issue
                                                        JOIN users ON complent_issue.user_id=users.id") or die (mysqli_error($conn));
                                while($data=mysqli_fetch_array($q)){
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><div class="badge badge-info"><i class="fas fa-user"></i> <?= $data[0] ?></div></td>
                                        <td><div class="badge badge-info"><i class="fas fa-user"></i> <?= $data['user_id'] ?></div></td>
                                        <td><?= getDataUser($data['user_id']) ?></td>
                                        <td><?= $data['full_address'] ?></td>
                                        <td><?= getDataLead($data['lead_technician_id']) ?></td>
                                        <td><?= getDataTech($data['technician_id']) ?></td>
                                        <td><?= $data['description'] ?></td>
                                        <td><?= getStatus($data['status']) ?></td>
                                        <td><?= dateFormat($data[6]) ?></td>
                                        <td><?= dateFormat($data[7]) ?></td>
                                        <td>
                                            <?= getChooseLead($data[0], $data['lead_technician_id']) ?>
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