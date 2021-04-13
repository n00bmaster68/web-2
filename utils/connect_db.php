<?php
    // require_once('../config/config.php');
    $conn = new mysqli("localhost","root","","ecommerce");
    mysqli_set_charset($conn, 'UTF8');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
