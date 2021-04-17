<?php
require_once('../utils/connect_db.php');	
['sellproducts' => $detailBill] = require '../Entities/detailbill.php';
$idBill = 10;
$data = $detailBill($conn,$idBill);
require_once('../utils/close_db.php');
print_r($data);
// $res = $data['MaHD']."<br>".$data['NGAYXUAT']."<br>";
// for ($i=0; $i <count($data['chitiethd']) ; $i++) { 
//     $res = $res.$data['chitiethd'][$i]['MaSP']."<br>"
//     .$data['chitiethd'][$i]['GiaBan']."<br>".$data['chitiethd'][$i]['Ten']."<br>"
//     .$data['chitiethd'][$i]['MaLoai']."<br>";
// }
// echo $res;
