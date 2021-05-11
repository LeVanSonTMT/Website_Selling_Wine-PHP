<?php

    session_start();
    if(!isset($_SESSION['sdt']))
    {
        header("location: ../../dangnhap.php");
    }
    //lay du lieu;        
    $stt=$_GET['stt'];
    $dc=$_GET['dc'];
    //tao ket noi
        include_once('./quantri/conn.php');
    //viet cau lenh slp
        $sql=" DELETE FROM giohang WHERE STT='$stt' ";
    //thuc hien truy van
        $resutl = $conn->query($sql);
        echo "<script>alert('Đã xóa thành công!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=".$dc."'>";
    //dong ket noi
    $conn->close();      
    
?>