<?php
    session_start();
    $dc = $_GET['dc'];
    $BienNhan = $_GET['masp'];
    $mang = explode("_",$BienNhan); 
    //kiem tra coi neu da dang nhap thi lam. 
    if(!isset($_SESSION['sdt'])){ 
        echo "<meta http-equiv='refresh' content='0;URL=dangnhap.php?dc=".$dc."'>";
    }
    else{                
        $bienX = $_SESSION['sdt'];
        include_once('./quantri/conn.php');            
        if($bienX=='admin') echo "<meta http-equiv='refresh' content='0;URL=".$dc."'>";
        else{
            $sql1="SELECT maSP FROM giohang where sdt='$bienX' and maSP='$mang[0]'";
            $result1=$conn->query($sql1);
            if($result1->num_rows > 0) 
            {
                    echo "<meta http-equiv='refresh' content='0;URL=xemGioHangvaMuaNgay.php?maspmua=$mang[0]&dc=".$dc."'>";
            }
            else
            {
                $sql="INSERT INTO giohang(sdt, maSP, soLuongMua, ttGH) 
                       VALUES ('$bienX', '$mang[0]', '$mang[1]', 1)";
                $resutl = $conn->query($sql);                
            }
            echo "<meta http-equiv='refresh' content='0;URL=xemGioHangvaMuaNgay.php?maspmua=$mang[0]&dc=".$dc."'>";
        }
        $conn->close(); 
    }
?>