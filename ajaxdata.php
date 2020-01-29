<?php

include('lib/koneksi.php');

if(isset($_POST["provincy_id"]) && !empty($_POST["provincy_id"])){
    $provid = $_POST['provincy_id'];
    $query = mysqli_query($conn, "SELECT * FROM regencies WHERE province_id=$provid");
    $hit = mysqli_num_rows($query);
    if($hit > 0){
        while($row = mysqli_fetch_array($query)){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">-- kota tidak ditemukan --</option>';
    }
}

if(isset($_POST["regency_id"]) && !empty($_POST["regency_id"])){
    $regencyid = $_POST['regency_id'];
    $query = mysqli_query($conn, "SELECT * FROM districts WHERE regency_id=$regencyid");
    $hit = mysqli_num_rows($query);
    if($hit > 0){
        while($row = mysqli_fetch_array($query)){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">-- distrik tidak ditemukan --</option>';
    }
}

?>