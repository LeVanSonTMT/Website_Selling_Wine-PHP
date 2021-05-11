<?php

    session_start();
    if(!isset($_SESSION['sdt']))
    {
        header("location: ../../dangnhap.php");
    }
          
    $stt=$_GET['stt'];
    
        include_once('./conn.php');
        
        $sql=" UPDATE hoadon SET ttHD=111, thoigiannhan=now() WHERE STTHD='$stt' ";
        
        $resutl = $conn->query($sql);
        echo "<script>alert('Đã xác nhận giao thành công!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=DonHangChoGiao.php'>";
    
    $conn->close();      
    
?>