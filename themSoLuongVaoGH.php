<?php
    session_start();
    include_once('quantri/conn.php');
    $mangA = $_REQUEST['mangA'];
    $mangB = explode(",",$mangA);
    $soluongmua = $mangB[0];
    $stt = $mangB[1];
    if(($soluongmua!="")||$soluongmua>0){
        $sql = "UPDATE giohang SET soLuongMua='$soluongmua' WHERE STT='$stt'";
        $result=$conn->query($sql);
    }
    // echo "thanh cong";
    $conn->close();
?>