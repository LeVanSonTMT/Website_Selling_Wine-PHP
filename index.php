<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTN_Shop - Cửa Hàng Bán Rượu</title>
    <link rel="stylesheet" type="text/css" href="dd.css">
    <link rel="stylesheet" type="text/css" href="fomatTableDH.css">

    <script>
    var img = [];
    var i = 0;
    img[0] = "./quantri/anhSP/avt1.jpg";
    img[1] = "./quantri/anhSP/avt2.jpg";
    img[2] = "./quantri/anhSP/avt3.jpg";
    img[3] = "./quantri/anhSP/avt4.jpg";
    img[4] = "./quantri/anhSP/avt5.jpg";
    img[5] = "./quantri/anhSP/avt6.jpg";
    img[6] = "./quantri/anhSP/avt7.jpg";
    img[7] = "./quantri/anhSP/avt8.jpg";
    img[8] = "./quantri/anhSP/avt9.jpg";
    img[9] = "./quantri/anhSP/avt10.jpg";

    setInterval(function() {
        i++;
        if (i > img.length - 1) i = 0;
        document.getElementById("a1").setAttribute("src", img[i]);
        document.getElementById("a2").setAttribute("src", img[i]);
        document.getElementById("a3").setAttribute("src", img[i]);
    }, 3000);

    function plusSlides(pos) {
        if (pos == 1) {
            i++;
            if (i > img.length - 1) i = 0;
        }
        if (pos == -1) {
            i--;
            if (i < 0) i = img.length - 1;
        }
        document.getElementById("a1").setAttribute("src", img[i]);
        document.getElementById("a2").setAttribute("src", img[i]);
        document.getElementById("a3").setAttribute("src", img[i]);
    }
    </script>
</head>

<body>
    <!-- main -->
    <div class="main">
        <?php include_once("./heatder.php"); ?>

        <div class="showslide">
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <img id="a2" src="./quantri/anhSP/avt1.jpg" alt="no">
            <img id="a1" src="./quantri/anhSP/avt1.jpg" alt="no">
            <img id="a3" src="./quantri/anhSP/avt1.jpg" alt="no">
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <div class="content">

            <div id="divTong">
                <h1>Sản Phẩm Mới Nhất</h1>
                <?php 
                    //tao ket noi
                    include_once('./quantri/conn.php');
                    //viet cau lenh slp
                    $sql1="SELECT * FROM sanpham 
                where soluongSP>0 and ttSP=1 and date(thoigian)=(select max(date(thoigian)) from sanpham where soluongSP>0 and ttSP=1)" ;
                          //thuc hien truy van
                          $result1=$conn->query($sql1);
                          if($result1->num_rows > 0)
                            { 
                                $dk= $result1->num_rows;
                                $dksl=$dk;
                                if($dk>4) $dk=4;
                              for($i=0; $i<$dk;$i++)
                              {                                
                                ($row=$result1->fetch_assoc())
                    ?>
                <table border="0" id="bang1SP" cellpadding="0">
                    <tr>
                        <th> <a
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
                <?php } 
                if($dksl>4) echo "<p><a href='./spMoiNhat.php'>Xem Thêm...</a></p>";
            } ?>
                
            </div>

            <div id="divTong">
                <h1>Sản Phẩm Khuyến Mãi</h1>
                <?php 
            //viet cau lenh slp
            $sql2="SELECT * FROM sanpham where soluongSP>0 and ttSP=1 and khuyenmaiSP>0";
            //thuc hien truy van
            $result2=$conn->query($sql2);
            if($result2->num_rows > 0)
            { 
                $dk= $result2->num_rows;
                $dksl=$dk;
                            if($dk>4) $dk=4;
                for($i=0;$i<$dk;$i++)
                {
                    ($row=$result2->fetch_assoc())
            ?>
                <table border="0" id="bang1SP" cellpadding="0">
                    <tr>
                        <th> <a
                                href="./xemchitietSP.php?masp=<?php echo $row['maSP']; ?>&dc=<?php echo $_SERVER['REQUEST_URI']; ?>">
                                <img src="./quantri/<?php echo $row['hinhanhSP']; ?>" alt="Chưa có"> </a>
                        </th>
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
                <?php } 
                if($dksl>4) echo "<p><a href='./khuyenMaiSP.php'>Xem Thêm...</a></p>";
            }   ?>
                
            </div>

            <div id="divTong">
                <h1> </h1>
                <?php 
                          //viet cau lenh slp
                          $sql="SELECT * FROM sanpham where soluongSP>0 and ttSP=1";
                          //thuc hien truy van
                          $result=$conn->query($sql);
                          if($result->num_rows > 0)
                            { 
                                $dk= $result->num_rows;
                                $dksl=$dk;
                                            if($dk>8) $dk=8;
                              for($i=0; $i<$dk;$i++)
                              {
                                  $row=$result->fetch_assoc()
                    ?>
                <table border="0" id="bang1SP" cellpadding="0">
                    <tr>
                        <th> <a
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
                <?php } 
                if($dksl>8) echo "<p><a href='./danhMucSP.php'>Xem Thêm...</a></p>";
            }  $conn->close();  ?>
                
            </div>
            <br><br><br>
        </div>

        <!-- Footer -->
        <?php include_once("./forder.php"); ?>
    </div>

</body>

</html>