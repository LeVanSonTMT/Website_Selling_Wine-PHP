<?php

    session_start();
    if(!isset($_SESSION['sdt']))
    {
        header("location: ../../dangnhap.php");
    }
    $maSPX=$_GET['masp'];
    include_once('conn.php');
    $sql="UPDATE  sanpham SET ttSP=0 WHERE maSP='$maSPX'";
    $resutl = $conn->query($sql);
    echo "<script>alert('Đã xóa thành công!');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=quanlySP.php'>";
    
    $conn->close();      
    
?>