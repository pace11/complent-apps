<?php

    function getDataUser($params) {
        $tmp = '';
        if (!empty($params)) {
            include '../lib/koneksi.php';
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
            include '../lib/koneksi.php';
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
            include '../lib/koneksi.php';
            $q = mysqli_query($conn, "SELECT * FROM technician WHERE id='$params'");
            $data = mysqli_fetch_array($q);
            $tmp = $data['full_name'];
        } else {
            $tmp = '<div class="badge badge-danger">data belum ada</div>';
        }
        return $tmp;
    }

    function getStatus($params) {
        switch($params) {
            case 'failed':
                return 'Failed';
            break;
            case 'done':
                return 'Done';
            break;
            default:
                return 'In Progress';
            break;
        }
    }

    function dateFormat($params) {
        return date('d F Y H:i:s', strtotime($params));
    }

?>


