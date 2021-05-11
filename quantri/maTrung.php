<?php
    include_once('conn.php');
    $kiemtra="";
    $ma=$_REQUEST['ma'];
    if($ma!="")
    {
        $sql="SELECT MaDMSP From danhmucsanpham where MaDMSP='$ma'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            $kiemtra="Mã danh mục này đã tồn tại!"; 
        }
    }
    echo $kiemtra;
    $conn->close();
?>