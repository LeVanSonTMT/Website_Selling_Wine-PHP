<?php

    session_start();
    if(!isset($_SESSION['sdt']))
    {
        header("location: ../../dangnhap.php");
    }
    //lay du lieu;
        
    $STT=$_GET['STT'];
    //tao ket noi
        include_once('conn.php');
    //viet cau lenh slp
        $sql="DELETE FROM thugopy WHERE STTthu='$STT'";
    //thuc hien truy van
        $resutl = $conn->query($sql);
        echo "<script>alert('Đã xóa thành công!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=xemThuGopYdaxem.php'>";
    //dong ket noi
    $conn->close();      
    
?>