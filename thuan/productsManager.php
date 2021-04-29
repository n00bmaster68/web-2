<?php
    $res = "";
    echo $_POST["typeActionProd"];
    require_once('../utils/connect_db.php');	
    if(isset($_POST["idProd"])){
        $idProd = $_POST["idProd"];
        $typeActionProd = $_POST["typeActionProd"];
        if($typeActionProd == "delete") {
            ['deleteProduct' => $check] = require '../Entities/product.php';
            $flag = $check($conn,$idProd);
            if(!$flag) {
                $res = $res."<script>document.getElementById('btnConfirm').style=\"display: none\";
                document.getElementById('message-confirm').style=\"color: red\";
                document.getElementById('message-confirm').innerHTML=\"Delete product failed !\";
                document.getElementById('btnConfirmNo').innerHTML=\"Close\";</script>";
            } else {
                $res = $res."<script>document.getElementById('btnConfirm').style=\"display: none\";
                document.getElementById('message-confirm').style=\"color: green\";
                document.getElementById('message-confirm').innerHTML=\"Delete product success !\";
                document.getElementById('btnConfirmNo').innerHTML=\"Close\";</script>";
            }       
        } else if($typeActionProd == "findProd") {
            $selectType = "";
            ['findProductById' => $func] = require '../Entities/product.php';
            ['findAllTypes' => $arrayType] = require '../Entities/category.php';
            $product = $func($conn,$idProd);
            $types = $arrayType($conn);
            for($i=0;$i<count($types);$i++) {
                $selected = "";
                if($product['MaLoai'] == $types[$i]['MaLo']){
                    $selected = "selected";
                }
                $selectType = $selectType . "<option ".$selected." value=\"".$types[$i]['MaLo']."\">".$types[$i]['TenLoai']."</option>";
            }
            $res = $res . "<script> document.getElementById('addProductForm').style.top = \"15%\";document.getElementById('addProductForm').style.height = \"393px\";".
            "document.getElementById('addProductForm').innerHTML = '<a class=\"closeDetail2\" onclick=\"closeDetail()\" style=\"cursor: pointer;color: #ff8c00;\">×</a><form action=\"\" method=\"POST\" id=\"formAddOrUpdateProduct\"><h2>UPDATE PRODUCT</h2><input type=\"text\" class=\"inputForm\" value=\"".$product['Ten']."\" placeholder=\"Product name\" id=\"product-name\" name=\"product-name\">".
            "<input type=\"text\" class=\"inputForm\" value=\"".$product['GiaBan']."\" placeholder=\"Price\" id=\"product-price\" name=\"product-price\"><input type=\"text\" class=\"inputForm\" value=\"".$product['SoLuongTon']."\" placeholder=\"Quantity in stock\" id=\"quantity-in-stock\" name=\"quantity-in-stock\"><select class=\"inputForm\" id=\"updateType\" name=\"updateType\">"
            .$selectType."</select><p style=\"margin-top: -4px; margin-bottom: -4px\">Product image:</p><input type=\"file\" class=\"inputForm\" placeholder=\"Image\" id=\"product-image\" name=\"product-image\"><button class=\"btn2\" onclick = \"editProduct(".$product['MaSP'].")\" style=\"width: 64%;margin-left: 5%;\">Update</button>"."<input type=\"hidden\" name=\"idAddOrUpdateProd\" value=\"\" "
            ."id=\"idAddOrUpdateProd\"><input type=\"submit\" name=\"submitProduct\" value=\"Submit-Product\" id=\"btnAddOrUpdateProduct\" style=\"visibility: hidden; opacity: 0;\" /></form>'; 	document.getElementById('addProductForm').style.display=\"block\"; closeSideBar(); </script>";

        }
    }

    if(isset($_POST['idAddOrUpdateProd'])){
        $id = $_POST["idAddOrUpdateProd"];
        $name = $_POST["productName"];
        $price = $_POST["productPrice"];
        $quantity = $_POST["quantityInStock"];
        $type = $_POST["updateType"];
        $image = $_POST["productImage"];
        $productObj = [];
        array_push($productObj, (object)[
            'Ten' => $name,
            'Hinh' => $image,
            'GiaBan' => $price,
            'MaLoai' => $type,
            'SoLuongTon' => $quantity,
        ]);
        if(!empty($id)) {
    //         array_push($productObj, (object)[
    //             'MaSP' => $id,
    //         ]);
    //         ['updateProduct' => $func] = require '../Entities/product.php';
    //         $productUpdate = $func($conn,$productObj);
    //         f(!$productUpdate) {
    //             $res = $res."<script>document.getElementById('btnConfirm').style=\"display: none\";
    //             document.getElementById('message-confirm').style=\"color: red\";
    //             document.getElementById('message-confirm').innerHTML=\"Update product failed !\";
    //             document.getElementById('btnConfirmNo').innerHTML=\"Close\";</script>";
    //         } else {
                $res = $res."<script>document.getElementById('btnConfirm').style=\"display: none\";
                document.getElementById('message-confirm').style=\"color: green\";
                document.getElementById('message-confirm').innerHTML=\"Update product success !\";
                document.getElementById('btnConfirmNo').innerHTML=\"Close\";</script>";
    //         }     
    //     } else {
    //         ['insertProduct' => $func] = require '../Entities/product.php';
    //         $productCreate = $func($conn,$productObj);
    //         f(!$flag) {
    //             $res = $res."<script>document.getElementById('btnConfirm').style=\"display: none\";
    //             document.getElementById('message-confirm').style=\"color: red\";
    //             document.getElementById('message-confirm').innerHTML=\"Create product failed !\";
    //             document.getElementById('btnConfirmNo').innerHTML=\"Close\";</script>";
    //         } else {
    //             $res = $res."<script>document.getElementById('btnConfirm').style=\"display: none\";
    //             document.getElementById('message-confirm').style=\"color: green\";
    //             document.getElementById('message-confirm').innerHTML=\"Create product success !\";
    //             document.getElementById('btnConfirmNo').innerHTML=\"Close\";</script>";
    //         }     
        }
    }
    require_once('../utils/close_db.php');
    echo $res;
?>