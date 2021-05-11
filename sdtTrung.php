<?php
    include_once('quantri/conn.php');
    $kiemtra="";
    $sdt=$_REQUEST['sdt'];
    if($sdt!=""){
        $sql="SELECT sdt From nguoidung where sdt='$sdt'";

        $result=$conn->query($sql);
        if($result->num_rows>0){
            $kiemtra="Số điện thoại đã được sử dụng!"; 
        }
    }
    echo $kiemtra;
    $conn->close();
?>