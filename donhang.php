<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="dd.css">
    <title>Đơn Hàng</title>
    <style>
    #divTable #bang1 .tieumuc {
        padding: 7px 0px 0px 7px;
        color: #f58c02;
        font-size: 25px;
        text-align: left;
    }

    #divTable #bang1 .aXT {
        color: blue;
        border: 1px blue solid;
        margin-left: 20%;
        padding: 3px;
    }

    #divTable #bang1 .aXT:hover {
        color: red;
        border: 1px red solid;
    }
    </style>
</head>

<body>
    <div class="main">
        <?php include_once("./heatderClient.php"); ?>
        <div id="divTable">
            <table border='0' id="bang1" cellpadding="0" width="100%">
                <tr>
                    <th>
                        <h1>Tất Cả Đơn Hàng
                            <hr>
                        </h1>
                    </th>
                </tr>
                <tr>
                    <td colspan="8" class="tieumuc">Đơn Hàng Chờ Xác Nhận</td>
                </tr>
                <tr>
                    <td>
                        <table border='0' id="bang2" cellspacing="0" width="100%">
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Khuyến mãi</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Địa chỉ giao</th>
                                <th>Thời gian đặt</th>
                                
                            </tr>
                            <?php 
                                if(!isset($_SESSION['sdt']))
                                { 
                                    header("location: ../../dangnhap.php");
                                }                            
                                $bienX = $_SESSION['sdt'];
                                //tao ket noi
                                    include_once('./quantri/conn.php');
                                //viet cau lenh slp
                                    $sql="SELECT * FROM hoadon where sdt='$bienX' and ttHD=1 ";
                                //thuc hien truy van
                                    $result=$conn->query($sql);
                                    $sl = $result->num_rows;
                                    if($result->num_rows > 0)
                                    { 
                                        $i=1;
                                        while($row=$result->fetch_assoc() )
                                        {                    
                            ?>
                            <tr>
                                <td class="td222"> <?php echo $i?> </td>
                                <td class="td222"> <?php echo $row['tenSP']; ?> </td>
                                <td class="td222"> <?php echo number_format($row['giaSP'],"0","","."); ?>đ </td>
                                <td class="td222"> <?php echo number_format($row['khuyenmaiSP'],0,",","."); ?>% </td>
                                <td class="td222"> <?php echo $row['soLuongMua'];?> </td>
                                <td class="td222"> <?php echo number_format($row['thanhtien'],"0","",".");?>đ </td>
                                <td class="td222"> <?php echo $row['diachi']; ?> </td>
                                <td class="td222"> <?php echo $row['thoigiandat'];?> </td>
                                
                                <td class="td222">
                                    <a id="huyDH"
                                        href="<?php  if($row['ttHD']>=11) echo ""; else  echo "huyDonHang.php";?>?stt=<?php echo $row['STTHD']; ?>&dc=<?php echo $_SERVER['REQUEST_URI']; ?>">Hủy</a>
                                </td>
                            </tr>
                            <?php $i=$i+1; if($i>=4) break; } }?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Tổng đơn hàng chờ xác nhận là: 
                        <?php echo $sl; if($sl>=4) echo "<a class='aXT' href='./donhangDaDat.php'>Xem Thêm</a>"; ?> 
                    </td>
                </tr>
            </table>

            <table border='0' id="bang1" cellpadding="0" width="100%">
                <tr>
                    <td colspan="8" class="tieumuc">Đơn Hàng Chờ Nhận</td>
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
                                <th>Thời gian duyệt</th>
                            </tr>
                            <?php 
                            //viet cau lenh slp
                                $sql1="SELECT * FROM hoadon where sdt='$bienX' and ttHD=11 ";
                            //thuc hien truy van
                                $result1=$conn->query($sql1);
                                $sl1 = $result1->num_rows;
                                if($sl1 > 0)
                                { 
                                    $i=1;
                                    while($row=$result1->fetch_assoc() )
                                    {                    
                            ?>
                            <tr>
                                <td class="td222"> <?php echo $i?> </td>
                                <td class="td222"> <?php echo $row['tenSP']; ?> </td>
                                <td class="td222"> <?php echo number_format($row['giaSP'],"0","","."); ?>đ </td>
                                <td class="td222"> <?php echo number_format($row['khuyenmaiSP'],0,",","."); ?>% </td>
                                <td class="td222"> <?php echo $row['soLuongMua'];?> </td>
                                <td class="td222"> <?php echo number_format($row['thanhtien'],"0","",".");?>đ </td>
                                <td class="td222"> <?php echo $row['diachi']; ?> </td>
                                <td class="td222"> <?php echo $row['thoigianduyet'];?> </td>
                            </tr>
                            <?php $i=$i+1; if($i >= 4) break; } } ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Tổng đơn hàng chờ nhận là: 
                        <?php echo $sl1; if($sl1>=4) echo "<a class='aXT' href='./donhangDaDuyet.php'>Xem Thêm</a>"; ?> 
                    </td>
                </tr>
            </table>

            <table border='0' id="bang1" cellpadding="0" width="100%">
                <tr>
                    <td colspan="8" class="tieumuc">Đơn Hàng Đã Nhận</td>
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
                                <th>Thời gian nhận</th>
                            </tr>
                            <?php 
                            //viet cau lenh slp
                                $sql2="SELECT * FROM hoadon where sdt='$bienX' and ttHD=111 ";
                            //thuc hien truy van
                                $result2=$conn->query($sql2);
                                $sl2 = $result2->num_rows;
                                if( $sl2 > 0)
                                { 
                                    $i=1;
                                    while($row=$result2->fetch_assoc() )
                                    {                    
                            ?>
                            <tr>
                                <td class="td222"> <?php echo $i?> </td>
                                <td class="td222"> <?php echo $row['tenSP']; ?> </td>
                                <td class="td222"> <?php echo number_format($row['giaSP'],"0","","."); ?>đ </td>
                                <td class="td222"> <?php echo number_format($row['khuyenmaiSP'],0,",","."); ?>% </td>
                                <td class="td222"> <?php echo $row['soLuongMua'];?> </td>
                                <td class="td222"> <?php echo number_format($row['thanhtien'],"0","",".");?>đ </td>
                                <td class="td222"> <?php echo $row['diachi']; ?> </td>
                                <td class="td222"> <?php echo $row['thoigiannhan'];?> </td>
                                <td class="td222">
                                    <a href="./themSPvaoGioHangvaMuaNgay.php?masp=<?php 
                                            $Mang = array($row['maSP'], '1');
                                            $BienGui = implode("_",$Mang);
                                            echo $BienGui;
                                            ?>&dc=<?php echo $_SERVER['REQUEST_URI']?>">Mua lại</a>
                                </td>
                            </tr>
                            <?php $i=$i+1; if($i >= 4) break; } }  ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Tổng đơn hàng đã nhận là: 
                        <?php echo $sl2; if($sl2>=4) echo "<a class='aXT' href='./donhangDaGiao.php'>Xem Thêm</a>"; ?> 
                    </td>
                </tr>
            </table>

            <table border='0' id="bang1" cellpadding="0" width="100%">
                <tr>
                    <td colspan="8" class="tieumuc">Đơn Hàng Đã Hủy</td>
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
                                <th>Thời gian hủy</th>
                            </tr>
                            <?php 
                            //viet cau lenh slp
                                $sql3="SELECT * FROM hoadon where sdt='$bienX' and ttHD=0 ";
                            //thuc hien truy van
                                $result3=$conn->query($sql3);
                                $sl3 = $result3->num_rows;
                                if( $sl3 > 0)
                                { 
                                    $i=1;
                                    while($row=$result3->fetch_assoc() )
                                    {                    
                            ?>
                            <tr>
                                <td class="td222"> <?php echo $i?> </td>
                                <td class="td222"> <?php echo $row['tenSP']; ?> </td>
                                <td class="td222"> <?php echo number_format($row['giaSP'],"0","","."); ?>đ </td>
                                <td class="td222"> <?php echo number_format($row['khuyenmaiSP'],0,",","."); ?>% </td>
                                <td class="td222"> <?php echo $row['soLuongMua'];?> </td>
                                <td class="td222"> <?php echo number_format($row['thanhtien'],"0","",".");?>đ </td>
                                <td class="td222"> <?php echo $row['diachi']; ?> </td>
                                <td class="td222"> <?php echo $row['thoigianhuy'];?> </td>
                                <td class="td222">
                                    <a href="./themSPvaoGioHangvaMuaNgay.php?masp=<?php 
                                            $Mang = array($row['maSP'], '1');
                                            $BienGui = implode("_",$Mang);
                                            echo $BienGui;
                                            ?>&dc=<?php echo $_SERVER['REQUEST_URI']?>">Mua lại</a>
                                </td>
                            </tr>
                            <?php $i=$i+1; if($i >= 4) break; } } $conn->close(); ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Tổng đơn hàng đã hủy là: 
                        <?php echo $sl3; if($sl3>=4) echo "<a class='aXT' href='./donhangDaHuy.php'>Xem Thêm</a>"; ?> 
                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <?php include_once("./forder.php"); ?>
    </div>
</body>

</html>