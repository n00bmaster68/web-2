<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data table</title>   
    <link rel="stylesheet" href="style.css">
</head>
<body>
<table class="fixed_header">
  <thead>
    <tr>
        
        <th><div class="thead">MaHD</div></th>
        <th>MaKH</th>
        <th>TinhTrang</th>
        <th>NGAYXUAT</th>
        <th>ThanhTien</th>
    </tr>
  </thead>
  <tbody id="table-result">
      <?php
        require_once('../utils/connect_db.php');	
        ['findBillsByStatus' => $Bills] = require '../Model/bill.php';
        $data = $Bills($conn,0);
        require_once('../utils/close_db.php');
        
        for($i=0;$i<count($data);$i++) {
            $price = intval($data[$i]['ThanhTien']);
            $price1 =  number_format($price, 0, '', '.');
            $status = "";
            if($data[$i]['TinhTrang'] == 0) {
                $status = "chua giao";
            } else {
                $status = "da giao";
            }
            echo "<tr><td>".$data[$i]['MaHD']."</td>"."<td>".$data[$i]['MaKH']."</td>"."<td>".$status."</td>"
            ."<td>".$data[$i]['NGAYXUAT']."</td>"."<td>".$price1." VND</td></tr>";
        }
        if(count($data) == 0) {
            echo "<tr style=\"border: 1px solid orange;\"><td style=\"border: 0px;\"></td><td style=\"border: 0px;\"></td><td style=\"border: 0px; width: 100%;\">Khong co du lieu nao duoc tim thay !</td><td style=\"border: 0px;\"></td><td style=\"border: 0px;\"></td></tr>";
        }
      ?>
    </tbody>
</table>
</body>
</html>