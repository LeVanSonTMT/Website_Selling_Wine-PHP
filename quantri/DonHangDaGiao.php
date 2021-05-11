<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <title>Đơn hàng đã giao</title>

</head>

<body>
    <div class="main">
        <?php include_once("./heatderAdmin.php"); ?>
        <div id="divTable">
            <table border='0' id="bang1" cellpadding="0">
                <tr>
                    <th>
                        <h1> Đơn Hàng Đã Giao </h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <table border='0' cellspacing="0" id="bang2">
                            <tr id="tr1">
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>email</th>
                                <th>Địa chỉ giao</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Khuyến mãi</th>
                                <th>Số lượng mua</th>
                                <th>Thành tiền</th>
                                <th>Thời gian đã giao</th>
                            </tr>
                            <?php 
                                if(!isset($_SESSION['sdt']))
                                { 
                                    header("location: ../../dangnhap.php");
                                }
                            //tao ket noi
                                include_once('./conn.php');
                            //viet cau lenh slp
                                $sql="SELECT a.sdt, a.ten, a.email, b.diachi, b.maSP,
                                b.tenSP, b.giaSP, b.khuyenmaiSP, b.soLuongMua, b.thanhtien,
                                b.thoigiannhan, b.STTHD, b.ttHD
                                FROM hoadon as b, nguoidung as a where a.sdt=b.sdt and ttHD=111 ";
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
                                <td> <?php echo $row['ten']; ?> </td>
                                <td> <?php echo $row['sdt']; ?> </td>
                                <td> <?php echo $row['email']; ?> </td>
                                <td> <?php echo $row['diachi']; ?> </td>
                                <td> <?php echo $row['maSP']; ?>-<?php echo $row['tenSP']; ?> </td>
                                <td> <?php echo number_format($row['giaSP'],"0","","."); ?>đ </td>
                                <td> <?php echo $row['khuyenmaiSP']; ?>% </td>
                                <td> <?php echo $row['soLuongMua'];?> </td>
                                <td> <?php echo number_format($row['thanhtien'],"0","",".");?>đ </td>
                                <td> <?php echo $row['thoigiannhan']; ?> </td>
                            </tr>
                            <?php $i=$i+1; } } $conn->close(); ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <?php include_once("../forder.php"); ?>

    </div>
</body>

</html>