<?php 
    
    $role = $_SESSION['role'];
    $email = $_SESSION['email'];
    switch($role){
        case 1:
            $sql = mysqli_query($conn, "SELECT * from admin WHERE email='$email'");
            $auth = mysqli_fetch_array($sql);
        break;
        case 2:
            $sql = mysqli_query($conn, "SELECT * from technician WHERE email='$email'");
            $auth = mysqli_fetch_array($sql);
        break;
        case 3:
            $sql = mysqli_query($conn, "SELECT * from lead_technician WHERE email='$email'");
            $auth = mysqli_fetch_array($sql);
        break;
        default: 
            $sql = mysqli_query($conn, "SELECT * from users WHERE email='$email'");
            $auth = mysqli_fetch_array($sql);
        break;
    }

    function getStatus($params) {
        $tmp = '';
        switch($params) {
            case 'inprogress':
                $tmp = '<div class="badge badge-warning">in progress</div>';
            break;
            case 'failed':
                $tmp = '<div class="badge badge-danger">failed</div>';
            break;
            case 'done':
                $tmp = '<div class="badge badge-success">done</div>';
            break;
            case 'online':
                $tmp = '<div class="badge badge-success">online</div>';
            break;
            default:
                $tmp = '<div class="badge badge-light">offline</div>';
            break;
        }
        return $tmp;
    }

    function getHaversine($latitude1, $longitude1, $latitude2, $longitude2) {
        $earth_radius = 6371;
        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;
        return $d;
    }

    function getNameProvince($params) {
        include './lib/koneksi.php';
        $q = mysqli_query($conn, "SELECT * FROM provinces WHERE id='$params'");
        $data = mysqli_fetch_array($q);
        return $data['name'];
    }

    function getNameRegency($params) {
        include './lib/koneksi.php';
        $q = mysqli_query($conn, "SELECT * FROM regencies WHERE id='$params'");
        $data = mysqli_fetch_array($q);
        return $data['name'];
    }

    function getNameDistrict($params) {
        include './lib/koneksi.php';
        $q = mysqli_query($conn, "SELECT * FROM districts WHERE id='$params'");
        $data = mysqli_fetch_array($q);
        return $data['name'];
    }

    function getDataUser($params) {
        $tmp = '';
        if (!empty($params)) {
            include './lib/koneksi.php';
            $q = mysqli_query($conn, "SELECT * FROM users WHERE id='$params'");
            $data = mysqli_fetch_array($q);
            $tmp = $data['full_name'];
        } else {
            $tmp = '<div class="badge badge-danger">data belum ada</div>';
        }
        return $tmp;
    }

    function getDataLead($params) {
        $tmp = '';
        if (!empty($params)) {
            include './lib/koneksi.php';
            $q = mysqli_query($conn, "SELECT * FROM lead_technician WHERE id='$params'");
            $data = mysqli_fetch_array($q);
            $tmp = $data['full_name'];
        } else {
            $tmp = '<div class="badge badge-danger">data belum ada</div>';
        }
        return $tmp;
    }

    function getDataTech($params) {
        $tmp = '';
        if (!empty($params)) {
            include './lib/koneksi.php';
            $q = mysqli_query($conn, "SELECT * FROM technician WHERE id='$params'");
            $data = mysqli_fetch_array($q);
            $tmp = $data['full_name'];
        } else {
            $tmp = '<div class="badge badge-danger">data belum ada</div>';
        }
        return $tmp;
    }

    function dateFormat($params) {
        return date('d F Y H:i:s', strtotime($params));
    }

    function getAccessDelete($params1, $params2) {
        $tmp = '';
        if ($params1 == 'inprogress') {
            $tmp = '<a href="?page=complaintdelete&id='.$params2.'" class="btn btn-danger">hapus</a>';
        }
        return $tmp;
    }

    function getChooseLead($params1, $params2) {
        $tmp = '';
        if (empty($params2)) {
            $tmp = '<a href="?page=complaintlead&id='.$params1.'" class="btn btn-info">Pilih PIC</a>';
        }
        return $tmp;
    }

    function getChooseTech($params1, $params2) {
        $tmp = '';
        if (empty($params2)) {
            $tmp = '<a href="?page=complainttech&id='.$params1.'" class="btn btn-info">Pilih Teknisi</a>';
        }
        return $tmp;
    }

    function getUpdateDone($params1, $params2) {
        $tmp = '';
        if ($params2 == 'inprogress') {
            $tmp = '<a href="?page=complaintdone&id='.$params1.'" class="btn btn-info">Selesai</a><a href="?page=complaintfailed&id='.$params1.'" class="btn btn-danger">Tidak Selesai</a>';
        }
        return $tmp;
    }

    function getTechAvailabe($params) {
        include './lib/koneksi.php';
        $hit = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM complent_issue WHERE technician_id='$params' AND status='inprogress'"));
        if ($hit > 0) {
            return false;
        } else {
            return true;
        }
    }

?>


