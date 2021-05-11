<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <title> Thêm Sản Phẩm </title>
</head>

<body>
    <div class="main">
        <?php include_once("./heatderAdmin.php"); ?>
        <?php
    
            if(!isset($_SESSION['sdt']))
            {
                header("location: ../../dangnhap.php");
            }    
            include_once('conn.php');
            //viet cau lenh sql            
            if(isset($_POST['Save']))
            {
                $MaDMSP = $_POST['danhmucSP'];
                $SLSP=1;
                $laySL = "SELECT MAX(CONVERT(SUBSTRING(maSP,2) , SIGNED)) AS SL FROM sanpham WHERE left(maSP,1)='$MaDMSP'";
                $resultSL=$conn->query($laySL);
                while($rowSL=$resultSL->fetch_assoc() )
                    $SLSP = $rowSL["SL"]+1;
                $masp = $MaDMSP.$SLSP;
                $tenSP = $_POST['tenSP'];
                $hinhanhSP= "./anhSP/" .$_FILES['fileanhSP']['name']; 
                $gioithieuSP = $_POST['gioithieuSP']; 
                $nguyenlieuSP = $_POST['nguyenlieuSP']; 
                $thetichSP = $_POST['thetichSP'];
                $doconSP = $_POST['doconSP'];
                $giaSP = $_POST['giaSP'];
                $noicungcapSP = $_POST['noicungcapSP'];
                $khuyenmaiSP = $_POST['khuyenmaiSP'];
                $soluongSP = $_POST['soluongSP'];
                $sql = " INSERT INTO sanpham(masp ,tenSP, hinhanhSP, gioithieuSP, nguyenlieuSP, thetichSP, doconSP, giaSP, noicungcapSP, khuyenmaiSP, soluongSP,soluongSPban,thoigian, ttSP )
                    VALUES ('$masp','$tenSP','$hinhanhSP','$gioithieuSP','$nguyenlieuSP','$thetichSP','$doconSP','$giaSP', '$noicungcapSP','$khuyenmaiSP','$soluongSP',0,now(),1)";
            //thuc hien truy van
                $resutl = $conn->query($sql);
                move_uploaded_file($_FILES['fileanhSP']['tmp_name'],$hinhanhSP);
                if($resutl) echo "<script>alert('Thêm thành công!');</script>";
                else echo "<script>alert('Thêm không thành công!');</script>";
            }
            
        ?>

        <div id="divTable">
            <table border="0" id="bang1" cellpadding="0px">
                <tr>
                    <th>
                        <h1>Thêm Sản Phẩm Mới</h1>
                    </th>
                </tr>
                <tr>
                    <th>
                        Vui lòng điền đầy đủ thông tin của sản phẩm vào bên dưới.
                        <hr><br>
                    </th>
                </tr>
                <tr>
                    <td>

                        <table border="0" id="bang3" cellpadding="3px">
                            <form action="" method="POST" enctype="multipart/form-data" name="formThemSP"
                            onsubmit="return kiemTra()">
                                <tr><td>Danh mục sản phẩm</td></tr>
                                <tr>                                            
                                    <td>                                        
                                        <select name="danhmucSP" id="danhmucSP">                                            
                                            <?php $lietkeDMSP = "SELECT * FROM danhmucsanpham"; //
                                                        $resultDMSP=$conn->query($lietkeDMSP);
                                                        if($resultDMSP->num_rows > 0)
                                                        {
                                                        while($rowDMSP=$resultDMSP->fetch_assoc() )
                                                        {
                                            ?>
                                            <option value="<?php echo $rowDMSP["MaDMSP"]; ?>"><?php echo $rowDMSP["tenDMSP"]; ?></option>
                                            <?php 
                                                    }
                                                    }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Tên sản phẩm </td>
                                </tr>
                                <tr>
                                    <td> <input type="text" name="tenSP" /> </td>
                                </tr>
                                <tr>
                                    <td id="warningtensp" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <td> Ảnh sản phẩm </td>
                                </tr>
                                <tr>
                                    <td> <input type="file" name="fileanhSP" value="hinhanhSP" /> </td>
                                </tr>
                                <tr>
                                    <td id="warninghinhanh" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <td> Giới thiệu sản phẩm </td>
                                </tr>
                                <tr>
                                    <td><textarea name="gioithieuSP" class="a123" cols="30" rows="7"></textarea></td>
                                </tr>
                                <tr>
                                    <td id="warninggioithieu" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <td> Nguyên liệu sản phẩm </td>
                                </tr>
                                <tr>
                                    <td><textarea name="nguyenlieuSP" class="a123" cols="30" rows="5"></textarea></td>
                                </tr>
                                <tr>
                                    <td id="warningngl" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <td> Thể tích thực </td>
                                </tr>
                                <tr>
                                    <td><input type="int" name="thetichSP" /> (ML)</td>
                                </tr>
                                <tr>
                                    <td id="warningthetich" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <td> Độ cồn </td>
                                </tr>
                                <tr>
                                    <td><input type="int" name="doconSP" /> (&ordm;)</td>
                                </tr>
                                <tr>
                                    <td id="warningdocon" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <td> Giá sản phẩm </td>
                                </tr>
                                <tr>
                                    <td><input type="int" name="giaSP" /> (VNĐ)</td>
                                </tr>
                                <tr>
                                    <td id="warninggia" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <td> Nơi cung cấp sản phẩm </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="noicungcapSP" /></td>
                                </tr>
                                <tr>
                                    <td id="warningncc" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <td> Khuyến mãi </td>
                                </tr>
                                <tr>
                                    <td> <input type="text" name="khuyenmaiSP" value="0"/> (%)</td>
                                </tr>
                                <tr>
                                    <td id="warningkm" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <td> Số lượng </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="soluongSP" /> </td>
                                </tr>
                                <tr>
                                    <td id="warningsl" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <th id="thinput">
                                        <input class="in1" type="submit" name="Save" value="Thêm" />
                                        <input class="in1" type="reset" name="nhaplai" value="Hủy" />

                                    </th>
                                </tr>
                            </form>
                        </table>

                    </td>
                </tr>
            </table>
        </div>
        <!-- Footer -->
        <?php include_once("../forder.php");  
                //dong ket noi 
                $conn->close();
        ?>

    </div>

</body>

</html>

<script>
    function kiemTra() {
        var kq = true;
        var tenSP = document.forms["formThemSP"]["tenSP"].value;
        var giaSP = document.forms["formThemSP"]["giaSP"].value;
        var gioithieuSP = document.forms["formThemSP"]["gioithieuSP"].value;
        var nguyenlieuSP = document.forms["formThemSP"]["nguyenlieuSP"].value;
        var thetichSP = document.forms["formThemSP"]["thetichSP"].value;
        var doconSP = document.forms["formThemSP"]["doconSP"].value;
        var noicungcapSP = document.forms["formThemSP"]["noicungcapSP"].value;
        var khuyenmaiSP = document.forms["formThemSP"]["khuyenmaiSP"].value;
        var soluongSP = document.forms["formThemSP"]["soluongSP"].value;

        if (tenSP == "") {
            document.getElementById("warningtensp").innerHTML = "Chưa nhập tên vào!";
            kq = false;
        } else {
            document.getElementById("warningtensp").style.display = "none";
        }

        if (giaSP == "") {
            document.getElementById("warninggia").innerHTML = "Chưa nhập giá vào!";
            kq = false;
        } else {
            document.getElementById("warninggia").style.display = "none";
        }

        if (gioithieuSP == "") {
            document.getElementById("warninggioithieu").innerHTML = "Chưa nhập thông tin vào!";
            kq = false;
        } else {
            document.getElementById("warninggioithieu").style.display = "none";
        }

        if (thetichSP == "") {
            document.getElementById("warningthetich").innerHTML = "Chưa nhập thể tích vào!";
            kq = false;
        } else {
            document.getElementById("warningthetich").style.display = "none";
        }

        if (doconSP == "") {
            document.getElementById("warningdocon").innerHTML = "Chưa nhập độ cồn vào!";
            kq = false;
        } else {
            document.getElementById("warningdocon").style.display = "none";
        }

        if (noicungcapSP == "") {
            document.getElementById("warningncc").innerHTML = "Chưa nhập nơi cung cấp vào!";
            kq = false;
        } else {
            document.getElementById("warningncc").style.display = "none";
        }

        if (nguyenlieuSP == "") {
            document.getElementById("warningngl").innerHTML = "Chưa nhập nguyên liệu vào!";
            kq = false;
        } else {
            document.getElementById("warningngl").style.display = "none";
        }

        if (khuyenmaiSP == "") {
            document.getElementById("warningkm").innerHTML = "Chưa nhập khuyến mãi vào!";
            kq = false;
        } else if ((khuyenmaiSP < 0) || (khuyenmaiSP > 100)) {
            document.getElementById("warningkm").innerHTML = "Nhập chưa đúng(0%->100%)!";
            kq = false;
        } else {
            document.getElementById("warningkm").style.display = "none";
        }

        if (soluongSP == "") {
            document.getElementById("warningsl").innerHTML = "Chưa nhập số lượng vào!";
            kq = false;
        } else if (soluongSP <= 0) {
            document.getElementById("warningsl").innerHTML = "Nhập chưa đúng(số lượng > 0)!";
            kq = false;
        } else {
            document.getElementById("warningsl").style.display = "none";
        }

        return kq;
    }
</script>