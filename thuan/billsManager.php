<?php
    $idBill = $_POST["idBill"];
    $typeActionBill = $_POST["typeActionBill"];
    $res = "";
    require_once('../utils/connect_db.php');	
    if($typeActionBill == "edit") {
        $statusBill = $_POST["statusBill"];
        ['updateBill' => $check] = require '../Entities/bill.php';
        $flag = $check($conn,$idBill,$statusBill);
        if(!$flag) {
            $res = $res."<script>alert('update failed !');</script>";
        } else {
            $res = $res."<script>alert('update success !');</script>";
        }        
    } else if($typeActionBill == "delete") {
        ['deleteBill' => $check] = require '../Entities/bill.php';
        $flag = $check($conn,$idBill);
        if(!$flag) {
            $res = $res."<script>alert('delete failed !');</script>";
        } else {
            $res = $res."<script>alert('delete success !');</script>";
        }       
    } else {
        ['findDetailBillByIdBill' => $bill] = require '../Entities/bill.php';
        $data = $bill($conn,$idBill);
        if (count($data) != 0){
            //day du lieu vo code html de trinh bay (du lieu bao gom chitiethd,ten va gia sp) $data['MaHD'] va $data['chitiethd']['Ten'] 
            //['chitiethd']['Gia'] ['chitiethd']['MaSP']
            $res = $res."mahd = ".$data['MaHD']."<br>makh = ".$data['MaKH']."<br>ngayxuat = ".$data['NGAYXUAT']."<br>tinhtrang = ".$data['TinhTrang']."<br>thanhtien = ".$data['ThanhTien'];
        }
    }
    require_once('../utils/close_db.php');
    echo $res;
?>