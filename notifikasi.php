<?php
session_start();
include "lib/koneksi.php";
 
if ($_SESSION['role'] == 4){ 
$get    = mysqli_query($conn,"SELECT * FROM tbl_jadwal WHERE id_user='$_SESSION[iduser]' AND view <> 1 AND acc <> 0 AND file IS NOT NULL GROUP BY id_jadwal DESC");
$count  = mysqli_num_rows($get); ?>
<input id="count" type="hidden" value="<?= $count ?>">
<?php
if ($count >0 && $count <= 5) {
    while ($data = mysqli_fetch_array($get)){
?>
    <a href="?page=jadwalkerja&id=<?= $data['id_jadwal'] ?>" class="dropdown-item">
        <div class="dropdown-item-icon bg-info text-white">
            <i class="fas fa-bell"></i>
        </div>
        <div class="dropdown-item-desc">
            Jadwal baru untuk anda <b><?= $data['id_jadwal'] ?></b>
            <div class="time"><?= date('d-M-Y',strtotime($data['tgl_mulai'])) ?></div>
        </div>
    </a>    
<?php }} else { echo '<a class="dropdown-item">belum ada notifikasi</a>';}} elseif ($_SESSION['role'] == 2 || $_SESSION['role'] == 3) {
$get    = mysqli_query($conn,"SELECT * FROM tbl_jadwal WHERE acc <> 1 GROUP BY id_jadwal DESC");
$count  = mysqli_num_rows($get); ?>
<input id="count" type="hidden" value="<?= $count ?>">
<?php
if ($count > 0 && $count <= 5) {
    while ($data = mysqli_fetch_array($get)){
?>
    <a href="?page=jadwalacc&id=<?= $data['id_jadwal'] ?>" class="dropdown-item">
        <div class="dropdown-item-icon bg-info text-white">
            <i class="fas fa-bell"></i>
        </div>
        <div class="dropdown-item-desc">
            ada jadwal baru <b><?= $data['id_jadwal'] ?></b>
            <div class="time"><?= date('d-M-Y',strtotime($data['tgl_mulai'])) ?></div>
        </div>
    </a>    
<?php }} else { echo '<a class="dropdown-item">belum ada notifikasi</a>';}} else {
$get    = mysqli_query($conn,"SELECT * FROM tbl_jadwal WHERE acc <> 0 AND file IS NULL GROUP BY id_jadwal DESC");
$count  = mysqli_num_rows($get); ?>
<input id="count" type="hidden" value="<?= $count ?>">
<?php
if ($count > 0 && $count <= 5) {
    while ($data = mysqli_fetch_array($get)){
?>
    <a href="?page=jadwaledit&id=<?= $data['id_jadwal'] ?>" class="dropdown-item">
        <div class="dropdown-item-icon bg-info text-white">
            <i class="fas fa-bell"></i>
        </div>
        <div class="dropdown-item-desc">
            Jadwal <b><?= $data['id_jadwal'] ?></b> telah di ACC
            <div class="time"><?= date('d-M-Y',strtotime($data['tgl_mulai'])) ?></div>
        </div>
    </a>    
<?php }} else { echo '<a class="dropdown-item">belum ada notifikasi</a>';} } ?>