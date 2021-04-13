<?php
    require_once('../utils/connect_db.php');	
	$page = $_GET["page"];
	$maxPageItem = $_GET["maxPageItem"];
	$typeID = $_GET["typeID"];
    echo $typeID;
	settype ($page, "int");
	$from = ($page - 1) * $maxPageItem;
	$query = "SELECT * FROM sanpham WHERE MaLo = ".$typeID."
		LIMIT $from, $maxPageItem
	";
    $query1 ="SELECT tenloai FROM loai"."WHERE MaLo = ".$typeID;
    $tin1 = mysqli_query($conn, $query1);
    // $data1 = "";
    // while($row1 = mysqli_fetch_array($tin1)){
    //     $data1[] = $row1[];
    // }

	$tin = mysqli_query($conn, $query);
    echo $query;
    $data = array();
    while($row = mysqli_fetch_array($tin)){
        $data[] = $row;
    }
    require_once('../utils/close_db.php');

    $products = "";
    $temp = "";
    $i = 0;
    
    foreach ($data as $values) {
        $price = intval($data[$i]['GiaBan']);
        $price1 =  number_format($price, 0, '', '.');

        $temp = $temp.'<div class="col4" id="'.$data[$i]['MaSP'].'">'.'<img src="'.$data[$i]['Hinh'].'"><h4>'.$data[$i]['Ten'].'</h4><p>'.$price1.' VND'.'</p><button class="DetailBtn" id="'.$data[$i]['MaSP'].'"' . ' onclick="showProductDetail(this.id)">Details</button></div>';
        if ($i + 1 != 0 && ($i + 1)%4 == 0 || $i == count($data)-1)
        {
            $products = $products.'<div class="row2" style="margin-top: 10%;margin-bottom: -12%">'.$temp.'</div>';
            $temp = '';
        }
        $i++;
    }
    echo($products);
?>