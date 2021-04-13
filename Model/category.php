<?php
return [
    'findAllTypes' => function($conn) {
        $query ="SELECT * FROM loai";
        $result = mysqli_query($conn,$query);
        $data = array();
        while($row = mysqli_fetch_array($result)){
            $data[] = $row;
        }
        return $data;
    },
];
