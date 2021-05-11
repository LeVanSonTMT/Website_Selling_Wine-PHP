<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="dd.css">
    <title>Danh Sách Sản Phẩm</title>

</head>

<body>
    <!-- Main -->
    <div class="main">
        <?php include_once("./heatder.php"); ?>
        <div id="divTong">
            <h1> Danh Sách Sản Phẩm </h1>
            <?php 
                          //tao ket noi
                          include_once('./quantri/conn.php');
                          //viet cau lenh slp
                          $sql="SELECT * FROM sanpham where soluongSP>0 and ttSP=1";
                          //thuc hien truy van
                          $result=$conn->query($sql);
                          if($result->num_rows > 0)
                            { 
                              while($row=$result->fetch_assoc() )
                              {
                        ?>
            <table border="0" id="bang1SP" cellpadding="0">
                <tr>
                    <th><a
                            href="./xemchitietSP.php?masp=<?php echo $row['maSP']; ?>&dc=<?php echo $_SERVER['REQUEST_URI']; ?>">
                            <img src="./quantri/<?php echo $row['hinhanhSP']; ?>" alt="Chưa có"> </a> </th>
                </tr>
                <tr>
                    <td id="td1" class="td11" style="font-weight: bold; color: red;">
                        <?php echo $row['tenSP']; ?> </td>
                </tr>
                <tr>
                    <td id="td1"> Giá: <?php echo number_format($row['giaSP'],"0","","."); ?>đ</td>
                </tr>
                <tr>
                    <td id="td1"> Khuyến mãi: <?php echo $row['khuyenmaiSP']; ?>% </td>
                </tr>
                <tr>
                    <td id="td1"> Kho: <?php echo $row['soluongSP'] ; ?> </td>
                </tr>
                <tr>
                    <td id="td1">Xuất xứ: <?php if(strpos($row['noicungcapSP'],',')>0) 
                                echo strrev(substr(strrev($row['noicungcapSP']),0,strpos(strrev($row['noicungcapSP']),','))); 
                                else echo $row['noicungcapSP']?> </td>
                </tr>
                <tr>
                    <td>
                        <table border="0" id="bang2SP">
                            <tr>
                                <td><a
                                        href="./xemchitietSP.php?masp=<?php echo $row['maSP']; ?>&dc=<?php echo $_SERVER['REQUEST_URI']; ?>">Xem
                                        chi tiết</a>
                                </td>
                                <td><a href="<?php  
                                            if(!isset($_SESSION['sdt'])) echo "";
                                            else if($_SESSION['sdt']=='admin') echo ""; 
                                                else {
                                                    $Mang = array($row['maSP'], '1');
                                                    $BienGui = implode("_",$Mang);
                                                    echo "./themSPvaoGioHangvaMuaNgay.php?masp=".$BienGui."&dc=".$_SERVER['REQUEST_URI'];
                                                }
                                        ?> ">Mua ngay</a>
                                    </td>
                                    <td><a href="<?php
                                            if(!isset($_SESSION['sdt'])) echo "";
                                            else if($_SESSION['sdt']=='admin') echo ""; 
                                                else {
                                                    echo "./themSPvaoGioHang.php?masp=".$BienGui."&dc=".$_SERVER['REQUEST_URI'];
                                                }
                                        ?>">Thêm vào giỏ</a>
                                    </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <?php } }  $conn->close();    ?>
        </div>

        <!-- Footer -->
        <?php include_once("./forder.php"); ?>
    </div>
    <!-- the end Main -->
</body>

</html>