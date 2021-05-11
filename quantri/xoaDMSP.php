<?php

    session_start();
    if(!isset($_SESSION['sdt']))
    {
        header("location: ../../dangnhap.php");
    } 
    $MaDM=$_GET['MaDM'];
    include_once('conn.php');
    $sql="DELETE FROM danhmucsanpham WHERE MaDMSP='$MaDM'";
    $resutl = $conn->query($sql);
    echo "<script>alert('Đã xóa vĩnh viễn!');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=quanlyDanhMucSP.php'>";
    
    $conn->close();      

?>