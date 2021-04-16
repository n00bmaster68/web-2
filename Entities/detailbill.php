<?php
    return [
        'findByIdBill' => function($conn,$MaHD) {
            $query ="SELECT * FROM chitiethd WHERE MaHD = ".$MaHD;
            $result = mysqli_query($conn,$query);
            $data = array();
            if ($result) {
                while($row = mysqli_fetch_array($result)){
                    $data[] = $row;
                }
            }
            ['findProductByIdForBill' => $obj] = require '../Entities/product.php';
            for ($i=0; $i < count($data); $i++) { 
                $dataDetail = $obj($conn,data[$i]['MaSP']);
                $data[i] = array_merge($data[i],$dataDetail);
            }
            return $data;
        },
    ];

