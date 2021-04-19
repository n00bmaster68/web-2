<?php
require_once('../utils/connect_db.php');
['statisticProducts' => $statistic] = require '../Entities/detailbill.php';
$data = $statistic($conn,4,2021,12,1);
require_once('../utils/close_db.php');
$res = "";
for ($i=0; $i <count($data) ; $i++) { 
    $res = $res.$data[$i]['MaSP']."<br>"
    .$data[$i]['TenLoai']."<br>".$data[$i]['Ten']."<br>"
    .$data[$i]['tongsoluong']."<br>".$data[$i]['tonggia']."<br><br><br>";
}
echo $res;
