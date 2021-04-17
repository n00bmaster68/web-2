<?php
    return [
        'sellproducts' => function($conn,$MaHD) {
            $query ="SELECT sp.MaSP,sp.Ten,sp.MaLoai,sp.GiaBan as GiaSP,cthd.SoLuong FROM chitiethd AS cthd INNER JOIN sanpham AS sp ON cthd.MaSP = sp.MaSP WHERE MaHD = $MaHD";
            $result = mysqli_query($conn,$query);
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[] = $row;
            }
            return $data;
        },
    ];

