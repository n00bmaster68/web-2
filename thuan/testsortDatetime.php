<?php
    require_once('../utils/connect_db.php');	
    ['findAllBills' => $Bills] = require '../Model/bill.php';
    $data = $Bills($conn);
    require_once('../utils/close_db.php');
    usort($data, function ($a, $b) {
        return strtotime($a['NGAYXUAT']) - strtotime($b['NGAYXUAT']);
    });

    print_r($data);
?>