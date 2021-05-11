<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="dd.css">

    <title>Giỏ Hàng</title>

</head>

<body>
    <div class="main">
        <?php include_once("./heatderClient.php");?>
        <div id="divTable">
            <table border='0' id="bang1" cellpadding="0">
                <tr>
                    <th>
                        <h1> Giỏ Hàng Của Bạn </h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <table border='0' id="bang2" cellspacing="0">
                            <tr id="tr1">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Khuyến mãi</th>
                                <th>Số lượng mua</th>
                            </tr>
                            <?php                            
                            if(!isset($_SESSION['sdt']))
                            {
                                echo "<meta http-equiv='refresh' content='0;URL=dangnhap.php?dc=".$_SERVER['REQUEST_URI']."'>";
                                
                            }                            
                            else
                            {
                            //lay du lieu;
                                $bienX = $_SESSION['sdt'];
                            //tao ket noi
                                include_once('./quantri/conn.php');
                            //viet cau lenh slp
                                $sql="SELECT * FROM giohang where sdt='$bienX'  ";
                            //thuc hien truy van
                                $result=$conn->query($sql);
                                if($result->num_rows > 0)
                                { 
                                    $i=1;
                                    while($row=$result->fetch_assoc() )
                                    {
                                        $bienMASP = $row['maSP'];
                                        $sqlSP = "SELECT * From sanpham where maSP='$bienMASP'";
                                        $resultSP = $conn->query($sqlSP);
                                        if($resultSP->num_rows > 0)  $rowSP=$resultSP->fetch_assoc();
                        ?>
                            <tr>
                                <td> <?php echo $i?> </td>
                                <td> <?php echo $rowSP['tenSP']; ?> </td>
                                <td> <?php echo number_format($rowSP['giaSP'],"0","","."); ?>đ </td>
                                <td> <?php echo number_format($rowSP['khuyenmaiSP'],"0",",","."); ?>% </td>
                                <td>
                                    <form action="" method="POST" enctype="multipart/form-data" name="formSoLuongMua">
                                        <input type="number" name="soluong"
                                            onchange="return kiemTra(this.value,stt=<?php echo $row['STT'];?>)"
                                            value="<?php echo $row['soLuongMua'];?>"
                                            style=" width: 50px; text-align: center; font-size: 19px">
                                    </form>
                                </td>
                                <td id="warningSL"></td>
                                <td>
                                    <a
                                        href="thanhtoan.php?stt=<?php echo $row['STT']; ?>&dc=<?php echo $_SERVER['REQUEST_URI'];?>">Mua</a>
                                </td>
                                <td><a
                                        href="xoaSPofGioHang.php?stt=<?php echo $row['STT']; ?>&dc=<?php echo $_SERVER['REQUEST_URI'];?>">Xóa</a>
                                </td>
                            </tr>
                            <?php    $i=$i+1; }
                                }
                                 } 
                                 $conn->close(); 
                        ?>
                        </table>

                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <?php include_once("./forder.php"); ?>
    </div>

    <script>
    function kiemTra(soluong, stt) {
        var mangA = new Array(soluong, stt);
        // alert(mangA);
        if ((soluong != "") && (soluong > 0)) {
            var xmlhttp;
            if (window.XMLHttpRequest) { // code IE7+, firefox,chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { //IE6 IE5
                xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
            }
            var result = "";
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    result = document.getElementById("warningSL").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET", "themSoLuongVaoGH.php?mangA=" + mangA, true);
            xmlhttp.send();
        }
    }
    </script>

</body>

</html>