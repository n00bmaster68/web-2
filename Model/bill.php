<?php
    return [
        'findAllBills' => function($conn) {
            $query ="SELECT * FROM hoadon";
            $result = mysqli_query($conn,$query);
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[] = $row;
            }
            return $data;
        },
        'findBillsByStatus' => function($conn,$status) {
            $query ="SELECT * FROM hoadon WHERE TinhTrang = ".$status;
            $result = mysqli_query($conn,$query);
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[] = $row;
            }
            return $data;
        },
        'insertBill' => function($conn,$MaKH,$TinhTrang,$ThanhTien,$NgayXuat) {
            //date('Y-m-d H:i:s')
            $query ="INSERT INTO hoadon(MaKH,TinhTrang,ThanhTien,NGAYXUAT) VALUES ($MaKH,$TinhTrang,$ThanhTien,$NgayXuat)";
            $result = mysqli_query($conn,$query);
            if(!$result) {
                return false;
            }
            return true;
        },
        'countBills' => function($conn) {
            $query ="SELECT COUNT(*) FROM hoadon";
            $result = mysqli_query($conn,$query);
            $result = $result->fetch_array();
            return intval($result[0]);
        },
        'countBillsByStatus' => function($conn,$status) {
            $query ="SELECT COUNT(*) FROM hoadon WHERE TinhTrang = ".$status;
            $result = mysqli_query($conn,$query);
            $result = $result->fetch_array();
            return intval($result[0]);
        },
        'deleteBill' => function($conn,$MaHD) {
            $query ="DELETE FROM hoadon WHERE ".$MaHD;
            $result = mysqli_query($conn,$query);
            if(!$result) {
                return false;
            }
            return true;
        },
        'updateBill' => function($conn,$MaHD) {
            $query ="UPDATE hoadon SET TinhTrang = 1 WHERE ".$MaHD;
            $result = mysqli_query($conn,$query);
            if(!$result) {
                return false;
            }
            return true;
        },
        'findBillById' => function($conn,$MaHD) {
            $query ="SELECT * FROM hoadon WHERE MaHD = ".$MaHD;
            $result = mysqli_query($conn,$query);
            $data = array();
            if ($result) {
                while($row = mysqli_fetch_array($result)){
                    $data[] = $row;
                }
            }
            return $data;
        },
    ];

