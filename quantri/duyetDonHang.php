<?php
    session_start();
    if(!isset($_SESSION['sdt']))
    {
        header("location: ../../dangnhap.php");
    }
    //lay du lieu;       
    $stt=$_GET['stt'];
    //tao ket noi
        include_once('./conn.php');

        $sqlHD = "SELECT * FROM hoadon where ttHD=1 and STTHD=$stt";
            $resultHD=$conn->query($sqlHD);
            if($resultHD->num_rows > 0) $row=$resultHD->fetch_assoc(); 
                   
        $masp = $row['maSP'];

        $sqlSP = "SELECT soluongSP, soluongSPban FROM sanpham where maSP='$masp' and ttSP=1 ";
            $resultSP=$conn->query($sqlSP);
            if($resultSP->num_rows > 0) $row1=$resultSP->fetch_assoc();

        $soluongconlai = $row1['soluongSP'] - $row['soLuongMua'];
        $soluongban = $row1['soluongSPban'] + $row['soLuongMua'];

        $sql1 = "UPDATE sanpham SET soluongSP='$soluongconlai' , soluongSPban='$soluongban' WHERE maSP='$masp' and ttSP=1  ";
        $result1 = $conn->query($sql1);

        $sql=" UPDATE hoadon SET ttHD=11, thoigianduyet=now() WHERE STTHD='$stt' ";
   
        $resutl = $conn->query($sql);
        echo "<script>alert('Đã duyệt đơn hàng thành công!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=DonHangChoDuyet.php'>";
    //dong ket noi
    $conn->close();      
    
?>