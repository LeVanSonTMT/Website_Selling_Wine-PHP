<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="dd.css">
    <title>Đơn Hàng Đã Nhận</title>

</head>

<body>
    <div class="main">
        <?php include_once("./heatderClient.php");?>
        <div id="divTable">
            <table border='0' id="bang1" cellpadding="0">
                <tr>
                    <th>
                        <h1>Đơn Hàng Đã Nhận</h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <table border='0' id="bang2" cellspacing="0">
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Khuyến mãi</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Địa chỉ giao</th>
                                <th>Thời gian nhận hàng</th>
                            </tr>
                            <?php 
                            if(!isset($_SESSION['sdt']))
                            { 
                                header("location: ../../dangnhap.php");
                            }
                            //lay du lieu;
                            $bienX = $_SESSION['sdt'];
                            //tao ket noi
                                include_once('./quantri/conn.php');
                            //viet cau lenh slp
                                $sql="SELECT * FROM hoadon where sdt='$bienX' and ttHD=111 ";
                            //thuc hien truy van
                                $result=$conn->query($sql);
                                if($result->num_rows > 0)
                                { 
                                    $i=1;
                                    while($row=$result->fetch_assoc() )
                                    {
                            ?>
                            <tr>
                                <td> <?php echo $i?> </td>
                                <td> <?php echo $row['tenSP']; ?> </td>
                                <td> <?php echo number_format($row['giaSP'],"0","","."); ?>đ </td>
                                <td> <?php echo number_format($row['khuyenmaiSP'],0,",","."); ?>% </td>
                                <td> <?php echo $row['soLuongMua'];?> </td>
                                <td> <?php echo number_format($row['thanhtien'],"0","",".");?>đ </td>
                                <td> <?php echo $row['diachi']; ?> </td>
                                <td> <?php echo $row['thoigiannhan'];?> </td>
                                <td>
                                    <a href="./themSPvaoGioHangvaMuaNgay.php?masp=<?php 
                                            $Mang = array($row['maSP'], '1');
                                            $BienGui = implode("_",$Mang);
                                            echo $BienGui;
                                            ?>">Mua lại</a>
                                </td>
                            </tr>
                            <?php $i=$i+1; } } $conn->close(); ?>
                        </table>

                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <?php include_once("./forder.php"); ?>
    </div>
</body>

</html>