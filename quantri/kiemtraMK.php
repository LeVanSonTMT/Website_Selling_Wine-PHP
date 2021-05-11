<?php
    include_once('./conn.php');
    $kiemtra="";
    $mk=$_REQUEST['mk'];
    $sdt = $_REQUEST['sdt'];

    if($mk!=""){
        $sql="SELECT mk From nguoiquanly where sdt='$sdt' and mk='$mk'";

        $result=$conn->query($sql);
        if($result->num_rows == 0){ 
            $kiemtra = "Mật khẩu chưa đúng!";
        }
    }
    echo $kiemtra;
    $conn->close();
?>