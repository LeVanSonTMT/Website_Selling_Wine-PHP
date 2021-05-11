<?php

    session_start();
    if(!isset($_SESSION['sdt']))
    {
        header("location: ../../dangnhap.php");
    }
    //lay du lieu;   
    $bienX = $_SESSION['sdt'];     
    $stt = $_GET['stt'];
    $dc = $_GET['dc'];
    //tao ket noi
        include_once('./quantri/conn.php');
    //viet cau lenh slp
        $sql1="SELECT ttHD FROM hoadon where STTHD='$stt' and sdt='$bienX' and ttHD=1";
        $resutl1 = $conn->query($sql1);
        if($resutl1->num_rows > 0)
        {
            $sql=" UPDATE hoadon SET ttHD=0, thoigianhuy=now() WHERE STTHD='$stt' ";
            //thuc hien truy van
            $resutl = $conn->query($sql);
            echo "<script>alert('Đã hủy thành công!');</script>";
        }
        else echo "<script>alert('Không hủy được!');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=".$dc."'>";
    //dong ket noi
    $conn->close();      
    
?>