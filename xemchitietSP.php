<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="./dd.css">
    <title>Xem chi tiết Sản Phẩm</title>

</head>

<body>
    <!-- Main -->
    <div class="main">
        <?php include_once("./heatder.php"); ?>
        <?php 
                //lay du lieu;
                $masp=$_GET['masp'];
                //tao ket noi
                include_once('./quantri/conn.php');
                //viet cau lenh slp
                    $sql="SELECT * FROM sanpham where maSP='$masp' and soluongSP>0 and ttSP=1";
                //thuc hien truy van
                    $result=$conn->query($sql);
                    if($result->num_rows > 0)
                    { 
                        while($row=$result->fetch_assoc() )
                        {
            ?>
        <div id="divTable">
            <table border="0" id="bang1" cellpadding="0">
                <tr>
                    <td colspan="2" id="in33"><a id="in33" href="<?php $dc=$_GET['dc']; echo $dc; ?>">
                            <img src="./hinhdaidien/anhX.jfif"></a></td>
                </tr>
                <tr>
                    <th width="400px" height="350px"> <img src="./quantri/<?php echo $row['hinhanhSP']; ?>"
                            alt="Chưa có" width="100%" height="100%"> </th>
                    <th>
                        <table border="0" style=" padding: 10px" width="" height="100%">
                            <tr>
                                <td colspan="2" style="font-size: 40px; color: red;">
                                    <?php echo $row['tenSP']; ?> </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 25px; color: #f97a12 ;"> Giá:
                                    <?php echo number_format($row['giaSP'],"0","","."); ?>đ</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 22px; color: #f97a12;"> Giảm:
                                    <?php echo number_format($row['khuyenmaiSP'],"0",",","."); ?>% </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 21px; font-weight: normal;"> Số lượng có sẵn:
                                    <?php echo number_format($row['soluongSP'],"0",","," "); ?> </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 21px; font-weight: normal;"> Số lượng bán được:
                                    <?php echo number_format($row['soluongSPban'],"0",","," "); ?> </td>
                            </tr>
                            <tr>
                                    <th><a href="<?php  
                                            if(!isset($_SESSION['sdt'])) echo "";
                                            else if($_SESSION['sdt']=='admin') echo ""; 
                                                else {
                                                    $Mang = array($row['maSP'], '1');
                                                    $BienGui = implode("_",$Mang);
                                                    echo "./themSPvaoGioHangvaMuaNgay.php?masp=".$BienGui."&dc=".$_SERVER['REQUEST_URI'];
                                                }
                                        ?> ">Mua ngay</a>
                                    </th>
                                    <th><a href="<?php
                                            if(!isset($_SESSION['sdt'])) echo "";
                                            else if($_SESSION['sdt']=='admin') echo ""; 
                                                else {
                                                    echo "./themSPvaoGioHang.php?masp=".$BienGui."&dc=".$_SERVER['REQUEST_URI'];
                                                }
                                        ?>">Thêm vào giỏ</a>
                                    </th>
                            </tr>
                            <style>
                            #bang1 a {
                                text-decoration: none;
                                background-color: #f58c02;
                                padding: 10px 20px;
                                font-size: 22px;
                            }

                            #bang1 {
                                border: solid 1px black;
                            }

                            #bang1 a:hover {
                                background-color: #696969;
                            }
                            </style>

                        </table>
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <table border="0" width="100%" height="" id="bangTam">
                            <tr>
                                <th>
                                    <hr> Thông tin chi tiết về sản phẩm
                                    <hr>
                                </th>
                            </tr>
                            <tr>
                                <td>Xuất xứ: <?php echo $row['noicungcapSP']; ?></td>
                            </tr>
                            <tr>
                                <td>Thể tích: <?php echo $row['thetichSP']; ?>ml</td>
                            </tr>
                            <tr>
                                <td>Độ cồn: <?php echo $row['doconSP'];?>&ordm;</td>
                            </tr>
                            <tr>
                                <td>Thành phần:
                                    <?php echo $row['nguyenlieuSP']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="font-size:24px">
                                    <hr> Giới thiệu về sản phẩm
                                    <hr>
                                </th>
                            </tr>
                            <tr>
                                <td> <?php echo $row['gioithieuSP']; ?> </td>
                            </tr>
                        </table>
                        <style>
                        #bangTam th {
                            font-size: 25px;
                            padding: 7px 0px;
                        }

                        #bangTam td {
                            font-size: 21x;
                            padding: 5px 0px 5px 50px;
                        }
                        </style>
                    </td>
                </tr>
            </table>
        </div>
        <?php } }  $conn->close();    ?>

        <!-- Footer -->
        <?php include_once("./forder.php"); ?>
    </div>
</body>

</html>