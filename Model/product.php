<?php
    return [
        // 'findAllProducts' => function($conn) {
        //     $query ="SELECT * FROM sanpham";
        //     $result = mysqli_query($conn,$query);
        //     $data = array();
        //     while($row = mysqli_fetch_array($result)){
        //         $data[] = $row;
        //     }
        //     return $data;
        // },
        'SearchProducts' => function($conn,$name,$type,$price,$typeId) {
            $condition1 = " = ";
            if (empty($typeId)) {
                $condition1 = " <> ";
                $typeId = 0;
            }
            if (empty($type)) {
                $type = ">=";
                $price = 0;
            }
            $query = "SELECT * FROM sanpham WHERE (MaLoai".$condition1.$typeId. " AND Giaban ".$type." ".$price." AND Ten LIKE '%".$name."%')";

            $result = mysqli_query($conn,$query);
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[] = $row;
            }
            return $data;
        },
    ];

