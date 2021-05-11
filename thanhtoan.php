<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="dd.css">
    <title>Thanh Toán Hóa Đơn</title>

<script>
    function kiemTra() {
        var kq = true;
        var diachi = document.forms["formThanhToan"]["diachi"].value;

        if (diachi == "") {
            document.getElementById("warningDiaChi").innerHTML = "Hãy nhập địa chỉ vào!";
            kq = false;
        } else {
            document.getElementById("warningDiaChi").style.display = "none";
        }
        return kq;
    }
</script>

</head>

<body>
    <div class="main">
        <?php include_once("./heatderClient.php");?>
        <?php
            if(!isset($_SESSION['sdt']))
            { 
                header("location: ../../dangnhap.php");
            }

            $bienX = $_SESSION['sdt'];
            $stt=$_GET['stt'];
            $dc = $_GET['dc'];
            //tao ket noi
            include_once('./quantri/conn.php');            
            //thuc hien truy van lấy thông tin SP Giỏi Hàng
                $sql1="SELECT * FROM giohang where STT='$stt'  ";
                $result1=$conn->query($sql1);
                if($result1->num_rows > 0) $row1=$result1->fetch_assoc();
                $masp = $row1['maSP'];
                //thuc hien truy van xem san pham con ton tai khong?
                    $sqlSP = "SELECT * FROM sanpham where maSP='$masp' ";
                    $resultSP = $conn->query($sqlSP);
                    $rowSP;
                    if($resultSP->num_rows > 0)
                    { 
                        $rowSP=$resultSP->fetch_assoc();
                        if($rowSP['soluongSP']==0 || $rowSP['ttSP']==0){
                            $sql4=" DELETE FROM giohang WHERE STT='$stt' ";
                            $conn->query($sql4);
                            echo "<script>alert('Sản phẩm không tồn tại!');</script>";
                            echo "<meta http-equiv='refresh' content='0;URL=./xemGioHang.php'>";
                        }
                    }
                    else {
                        $sql4=" DELETE FROM giohang WHERE STT='$stt' ";
                        $conn->query($sql4);
                        echo "<script>alert('Sản phẩm không tồn tại!');</script>";
                        echo "<meta http-equiv='refresh' content='0;URL=./xemGioHang.php'>";
                    }

            //thuc hien truy van lấy thông tin khách hàng
                $sql2="SELECT * FROM nguoidung where sdt='$bienX'  ";            
                $result2=$conn->query($sql2);
                if($result2->num_rows > 0) $row2=$result2->fetch_assoc();            
                    $sdt = $row2['sdt'];
                    $tenngdung = $row2['ten'];
                    $email = $row2['email'];
                    $diachi = $row2['diachi'];                
                    $tensp = $rowSP['tenSP'];
                    $giasp = $rowSP['giaSP'];
                    $kmsp = $rowSP['khuyenmaiSP'];
                    $soluong = $row1['soLuongMua'];
                    $tongtien = (($giasp*$soluong) - (($giasp*$soluong*$kmsp)/100));              
        ?>

        <div id="divTable">
            <table border="0" id="bang1">
                <tr>
                    <td id="in33"><a href="<?php echo $dc; ?>">
                            <img src="./hinhdaidien/anhX.jfif"></a></td>
                </tr>
                <tr>
                    <th>
                        <h1>Phiếu Thanh Toán
                            <hr>
                        </h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <table border="1" id="bang3" cellspacing="0">
                            <tr>
                                <th> Thông tin khách hàng </th>
                            </tr>
                            <tr>
                                <td><span>Tên khách hàng: </span> <?php echo $tenngdung; ?> </td>
                            </tr>
                            <tr>
                                <td> <span>Số điện thoại:</span> <?php echo $sdt; ?> </td>
                            </tr>
                            <tr>
                                <td><span>Email:</span> <?php echo $email; ?> </td>

                            </tr>
                            <tr>
                                <form action="" method="POST" enctype="multipart/form-data" name="formThanhToan">
                                    <td> <span>Địa chỉ nhận hàng: </span> <input type="text" onchange="return kiemTra()"
                                            name="diachi" value="<?php echo $diachi; ?>"> </td>
                            </tr>
                            <tr>
                                <td id="warningDiaChi" style="color: red; padding-left: 230px"></td>
                            </tr>
                            <tr>
                                <th>Thông tin sản phẩm</th>
                            </tr>
                            <tr>
                                <td> <span>Tên sản phẩm: </span><?php echo $tensp; ?> </td>
                            </tr>
                            <tr>
                                <td><span>Giá: </span> <?php echo number_format($giasp,0,",","."); ?> VNĐ </td>
                            </tr>
                            <tr>
                                <td> <span>Số lượng: </span> <?php echo $soluong; ?> </td>
                            </tr>
                            <tr>
                                <td><span>Khuyến mãi: </span> <?php echo $kmsp; ?>% </td>
                            </tr>
                            <tr>
                                <td> <span>Tổng thanh toán: </span> <?php echo number_format($tongtien,0,",","."); ?>
                                    VNĐ
                                </td>
                            </tr>
                            <tr>
                                <td> <span>Hình thức thanh toán: </span>Nhận tiền mặt khi giao hàng.</td>
                            </tr>

                            <tr>
                                <th id="thinput">
                                    <input class="in1" type="submit" name="thanhtoan" value="Thanh Toán" />

                                </th>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            </form>
        </div>

        <!-- Footer -->
        <?php include_once("./forder.php"); ?>
    </div>
</body>

</html>

<?php
    if(isset($_POST['thanhtoan']))
    {
        $diachi1 = $_POST['diachi'];
        //thuc hien truy van thêm SP đã thanh toán vào CSDL=> table HOADON
        $sql3 = "INSERT INTO hoadon(sdt, diachi, maSP, tenSP, giaSP, khuyenmaiSP, soLuongMua, thanhtien, thoigiandat, ttHD) 
                VALUES ( '$sdt', '$diachi1', '$masp', '$tensp', '$giasp', '$kmsp', '$soluong', '$tongtien', now(), '001')";
        $conn->query($sql3);

        //thuc hien truy van xóa SP đã thanh toán trong table GIOHANG thông qua STT cua SP
        $sql4=" DELETE FROM giohang WHERE STT='$stt' ";
        $conn->query($sql4);
        //dong ket noi    
        $conn->close();  
        echo "<script>alert('Thanh toán thành công!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=xemGioHang.php'>";
    } 
?>