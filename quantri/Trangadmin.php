<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thông tin khách hàng</title>
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">

</head>

<body>
    <style>
    .thb1 a {
        color: black;
        border: black 2px solid;
        background-color: green;
        padding: 2px 5px;
    }

    .thb1 a:hover {
        color: white;
    }
    </style>
    <div class="main">
        <?php include_once("./heatderAdmin.php"); ?>
        <div id="divTable">
            <table border='0' id="bang1" cellpadding="0">
                <tr>
                    <th>
                        <h1> <hr> Đơn Hàng Chờ Duyệt <hr> </h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <table border='0' id="bang2" cellspacing="0">
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
                                <th>Thời gian đã đặt</th>
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
                                        b.thoigiandat, b.STTHD, b.ttHD
                                        FROM hoadon as b, nguoidung as a where a.sdt=b.sdt and ttHD=1 ";
                                    //thuc hien truy van
                                        $result=$conn->query($sql);
                                        $sl=$result->num_rows;
                                        if($sl > 0)
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
                                <td> <?php echo $row['thoigiandat']; ?> </td>
                                <td class="tdtt"> <a href="duyetDonHang.php?stt=<?php echo $row['STTHD'] ?>">Duyệt</a>
                                </td>
                            </tr>
                            <?php $i=$i+1;  if($i>=4) break; } } ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Tổng đơn hàng đã đặt là: <?php echo $sl; ?> </td>
                </tr>
                <tr>
                    <th class="thb1"><?php if($sl>=4) echo "<a href='./DonHangChoDuyet.php'>Xem Thêm...</a>"; ?></th>
                </tr>
               
                <tr>
                    <th>
                        <h1><hr> Đơn Hàng Chờ Giao <hr> </h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <table border='0' id="bang2" cellspacing="0">
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
                                <th>Thời gian đã duyệt</th>
                            </tr>
                            <?php 
                                //viet cau lenh slp
                                    $sql1="SELECT a.sdt, a.ten, a.email, b.diachi, b.maSP,
                                    b.tenSP, b.giaSP, b.khuyenmaiSP, b.soLuongMua, b.thanhtien,
                                    b.thoigianduyet, b.STTHD, b.ttHD
                                    FROM hoadon as b, nguoidung as a where a.sdt=b.sdt and ttHD=11 ";
                                //thuc hien truy van
                                    $result1=$conn->query($sql1);
                                    $sl1 = $result1->num_rows;
                                    if( $sl1 > 0)
                                    { 
                                        $i=1;
                                        while($row=$result1->fetch_assoc() )
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
                                <td> <?php echo $row['thoigianduyet']; ?> </td>
                                <td class="tdtt"> <a href="XNgiaoDonHang.php?stt=<?php echo $row['STTHD'] ?>">Giao</a>
                                </td>

                            </tr>
                            <?php $i=$i+1;  if($i>=4) break; } } ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Tổng đơn hàng chờ duyệt là: <?php echo $sl1; ?> </td>
                </tr>
                <tr>
                    <th class="thb1"><?php if($sl1>=4) echo "<a href='./DonHangChoGiao.php'>Xem Thêm...</a>" ?> </th>
                </tr>
                
                <tr>
                    <th>
                        <h1> <hr> Đơn Hàng Đã Giao <hr> </h1>
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
                             //viet cau lenh slp
                                $sql2="SELECT a.sdt, a.ten, a.email, b.diachi, b.maSP,
                                b.tenSP, b.giaSP, b.khuyenmaiSP, b.soLuongMua, b.thanhtien,
                                b.thoigiannhan, b.STTHD, b.ttHD
                                FROM hoadon as b, nguoidung as a where a.sdt=b.sdt and ttHD=111 ";
                            //thuc hien truy van
                                $result2=$conn->query($sql2);
                                $sl2 = $result2->num_rows;
                                if($sl2 > 0)
                                { 
                                    $i=1;
                                    while($row=$result2->fetch_assoc() )
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
                                <td class="tdtt" style="color: red;"> Đã Giao </td>
                            </tr>
                            <?php $i=$i+1; if($i>=4) break; } }   ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Tổng đơn hàng đã giao là: <?php echo $sl2; ?> </td>
                </tr>
                <tr>
                    <th class="thb1"> <?php if($sl2>=4) echo "<a href='./DonHangDaGiao.php'>Xem Thêm...</a>"; ?></th>
                </tr>

                <tr>
                    <th>
                        <h1> <hr> Đơn Hàng Đã Hủy <hr></h1>
                    </th>
                </tr>
                <tr>
                    <td>

                        <table border='0' id="bang2" cellspacing="0">
                            <tr id="tr1">
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>email</th>
                                <th>Địa chỉ giao</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Khuyến mãi</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Thời gian hủy</th>
                            </tr>
                            <?php 
                                //viet cau lenh slp
                                    $sql3="SELECT a.sdt, a.ten, a.email, b.diachi, b.maSP,
                                    b.tenSP, b.giaSP, b.khuyenmaiSP, b.soLuongMua, b.thanhtien,
                                    b.thoigianhuy, b.STTHD, b.ttHD
                                    FROM hoadon as b, nguoidung as a where a.sdt=b.sdt and ttHD=0 ";
                                //thuc hien truy van
                                    $result3=$conn->query($sql3);
                                    $sl3 = $result3->num_rows;
                                    if($sl3 > 0)
                                    { 
                                        $i=1;
                                        while($row=$result3->fetch_assoc() )
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
                                <td> <?php echo $row['thoigianhuy']; ?> </td>
                                <td class="tdtt" style="color: red;">Đã Hủy</td>
                            </tr>
                            <?php $i=$i+1; if($i>=4) break; }   } $conn->close(); ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Tổng đơn hàng đã hủy là: <?php echo $sl3; ?> </td>
                </tr>
                <tr>
                    <th class="thb1"> <?php if($sl3>=4) echo "<a href='./DonHangDaHuy.php'>Xem Thêm...</a>"; ?> </th>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <?php include_once("../forder.php"); ?>
    </div>

</body>

</html>