<?php
    session_start();
    if(!isset($_SESSION['sdt']))
    {
        if($_SESSION['sdt']!='admin')
            header("location: ../../dangnhap.php");
    }
    //lay du lieu;
    $STTthuX=$_GET['STTthu'];
    //tao ket noi
        include_once('conn.php');
    //viet cau lenh slp
        $sql="UPDATE  thugopy SET ttThu=0 WHERE STTthu='$STTthuX'";
    //thuc hien truy van
        $resutl = $conn->query($sql);
        echo "<script>alert('Đã duyệt thư!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=xemThuGopY.php'>";
    //dong ket noi
    $conn->close();      
    
?>