<?php

    session_start();
    if(!isset($_SESSION['sdt']))
    {
        header("location: ../../dangnhap.php");
    } 
    $maSPX=$_GET['masp'];
    include_once('conn.php');
    $sql="DELETE FROM sanpham WHERE maSP='$maSPX'";
    $resutl = $conn->query($sql);
    echo "<script>alert('Đã xóa vĩnh viễn!');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=khoiphucSP.php'>";
    
    $conn->close();      
    
?>