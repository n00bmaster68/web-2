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
        'findBillsByMAndY' => function($conn,$month,$year) {
            $query ="SELECT * FROM hoadon";
            $result = mysqli_query($conn,$query);
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[] = $row;
            }
            $i = 0;
            $flag = false;
            $deleted = false;
            if($month == 0) {
                $flag = true;
            }
            foreach($data as $rs) {
                if($flag) {
                    if ($year == date("Y", strtotime($rs['NGAYXUAT']))) {
                        $deleted = true;
                    }
                } else {
                    if ($month == date("m", strtotime($rs['NGAYXUAT'])) && $year == date("Y", strtotime($rs['NGAYXUAT']))) {
                        $deleted = true;
                    }
                }
                if(!$deleted) {
                    unset($data[$i]);
                } else {
                    $deleted = false;
                }
                $i++;
            }
            usort($data, function ($a, $b) {
                return -strtotime($a['NGAYXUAT']) + strtotime($b['NGAYXUAT']);
            });
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
            return $data[0];
        },
    ];

