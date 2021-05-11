<?php
    include_once('./quantri/conn.php');
    $kiemtra="";
    $mk=md5($_REQUEST['mk']) ;
    $sdt = $_REQUEST['sdt'];

    if($mk!=""){
        $sql="SELECT mk From nguoidung where sdt='$sdt' and mk='$mk'";

        $result=$conn->query($sql);
        if($result->num_rows == 0){ 
            $kiemtra = "Mật khẩu chưa đúng!";
        }
    }
    echo $kiemtra;
    $conn->close();
?>