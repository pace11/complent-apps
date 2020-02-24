<?php
use Dompdf\Dompdf;
require '../vendor/autoload.php';
$dompdf = new Dompdf();

if (isset($_POST['submit'])){
    $status = $_POST['status'];
    $html = file_get_contents("http://localhost:80/complent-apps/pdf/template.php?status=".$status);
}
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Cetak",array("Attachment"=>0));
