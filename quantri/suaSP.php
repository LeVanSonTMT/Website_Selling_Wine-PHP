<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <title> Sửa Sản Phẩm </title>
</head>

<body>
    <div class="main">
        <?php include_once("./heatderAdmin.php"); ?>

        <?php
            if(!isset($_SESSION['sdt'])){
                header("location: ../../dangnhap.php");
            }
            //tao ket noi
                include_once('conn.php');
                $maSPX=$_GET['masp'];
                $tenduongdan;
            //viet cau lenh slp
                $sql1="SELECT * FROM sanpham where maSP='$maSPX' ";
            //thuc hien truy van
                $resutl1 = $conn->query($sql1);
                $row1=$resutl1->fetch_assoc();  
                    $MaDMSP=$row1['MaDMSP'];
                    $masp=$row1['maSP'];                      
                    $tensp=$row1['tenSP'];
                    $giasp=$row1['giaSP'];
                    $gioithieusp=$row1['gioithieuSP'];
                    $nguyenlieusp=$row1['nguyenlieuSP'];
                    $thetichsp=$row1['thetichSP'];
                    $doconsp=$row1['doconSP'];
                    $khuyenmaisp=$row1['khuyenmaiSP'];
                    $noicungcapsp=$row1['noicungcapSP'];
                    $hinhanhsp=$row1['hinhanhSP'];
                    $soluongsp = $row1['soluongSP'];

        ?>

        <div id="divTable">
            <table border="0" id="bang1">
                <tr>
                    <td id="in33"><a href="./quanlySP.php"> <img src="../hinhdaidien/anhX.jfif"></a></td>
                </tr>
                <tr>
                    <th>
                        <h1>Sửa thông tin sản phẩm</h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data" name="formThemSP"
                            onsubmit="return kiemTra()">
                            <table border="0" id="bang3">
                                <tr>
                                    <th style="width: 200px; height:200px; "><img src="<?php echo $hinhanhsp; ?>" alt=""
                                            width="100%" height="100%"></th>
                                </tr>
                                <tr>
                                    <td>Sửa hình ảnh: <input type="file" name="hinhanhSP1"></td>
                                </tr>

                                <tr>
                                    <td>Danh mục sản phẩm:
                                        <?php 
                                    $LaymaDMSP = "SELECT tenDMSP From danhmucsanpham where MaDMSP='$MaDMSP'";
                                    $resutlLaymaDMSP = $conn->query($LaymaDMSP);
                                    $rowLaymaDMSP=$resutlLaymaDMSP->fetch_assoc();  
                                    echo $rowLaymaDMSP['tenDMSP'];
                                    ?></td>
                                </tr>
                                <tr>
                                    <td>Mã sản phẩm: <?php echo $masp ?></td>
                                </tr>
                                <tr>
                                    <td> Tên sản phẩm </td>
                                </tr>
                                <tr>
                                    <td> <input type="text" name="tenSP1" value="<?php echo $tensp; ?>" /> </td>
                                </tr>
                                <tr>
                                    <td id="warningtensp" style="color: red; font-style:italic"></td>
                                </tr>

                                <tr>
                                    <td> Giới thiệu sản phẩm </td>
                                </tr>
                                <tr>
                                    <td><textarea name="gioithieuSP1" class="a123" cols="30"
                                            rows="7"> <?php echo $gioithieusp; ?> </textarea></td>
                                </tr>
                                <tr>
                                    <td id="warninggioithieu" style="color: red; font-style:italic"></td>
                                </tr>

                                <tr>
                                    <td> Nguyên liệu sản phẩm </td>
                                </tr>
                                <tr>
                                    <td><textarea name="nguyenlieuSP1" class="a123" cols="30"
                                            rows="5"><?php echo $nguyenlieusp; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td id="warningngl" style="color: red; font-style:italic"></td>
                                </tr>

                                <tr>
                                    <td> Thể tích thực </td>
                                </tr>
                                <tr>
                                    <td><input type="int" name="thetichSP1" value="<?php echo $thetichsp; ?>" /> (ML)
                                    </td>
                                </tr>
                                <tr>
                                    <td id="warningthetich" style="color: red; font-style:italic"></td>
                                </tr>

                                <tr>
                                    <td> Độ cồn </td>
                                </tr>
                                <tr>
                                    <td><input type="int" name="doconSP1" value="<?php echo $doconsp; ?>" /> (&ordm;)
                                    </td>
                                </tr>
                                <tr>
                                    <td id="warningdocon" style="color: red; font-style:italic"></td>
                                </tr>

                                <tr>
                                    <td> Giá sản phẩm </td>
                                </tr>
                                <tr>
                                    <td><input type="int" name="giaSP1" value="<?php echo $giasp; ?>" /> (VND)</td>
                                </tr>
                                <tr>
                                    <td id="warninggia" style="color: red; font-style:italic"></td>
                                </tr>

                                <tr>
                                    <td> Nơi cung cấp sản phẩm </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="noicungcapSP1" value="<?php echo $noicungcapsp; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td id="warningncc" style="color: red; font-style:italic"></td>
                                </tr>

                                <tr>
                                    <td> Khuyến mãi </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="khuyenmaiSP1" value="<?php echo $khuyenmaisp; ?>" />
                                        (%)
                                    </td>
                                </tr>
                                <tr>
                                    <td id="warningkm" style="color: red; font-style:italic"></td>
                                </tr>

                                <tr>
                                    <td> Số lượng </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="soluongSP1" value="<?php echo $soluongsp; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td id="warningsl" style="color: red; font-style:italic"></td>
                                </tr>
                                <tr>
                                    <th id="thinput">
                                        <input class="in1" type="submit" name="capnhat" value="Cập Nhật" />
                                        <input class="in1" type="reset" name="nhaplai" value="Hủy" />
                                    </th>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>

<?php
    if(isset($_POST['capnhat']))
    {
        $tenSP = $_POST['tenSP1'];
        $giaSP = $_POST['giaSP1'];
        $gioithieuSP= $_POST['gioithieuSP1'];
        $nguyenlieuSP= $_POST['nguyenlieuSP1'];
        $noicungcapSP= $_POST['noicungcapSP1'];
        $khuyenmaiSP= $_POST['khuyenmaiSP1'];
        $doconSP= $_POST['doconSP1'];
        $thetichSP= $_POST['thetichSP1'];
        $soluongSP = $_POST['soluongSP1'];

        $hinhCu = $hinhanhsp;
        $HinhAnh=$_FILES['hinhanhSP1'];
        $TenAnh=$HinhAnh['name'];        
        if($TenAnh!=""){
            $hinhCu = "./anhSP/".$_FILES['hinhanhSP1']['name'];           
        }

        $sql = "UPDATE  sanpham SET 
                tenSP='$tenSP', gioithieuSP='$gioithieuSP',
                nguyenlieuSP='$nguyenlieuSP', thetichSP='$thetichSP',
                doconSP='$doconSP', giaSP='$giaSP', hinhanhSP='$hinhCu',
                noicungcapSP='$noicungcapSP', khuyenmaiSP='$khuyenmaiSP', 
                soluongSP='$soluongSP'       WHERE maSP='$maSPX'";
        //thuc hien truy van
        $resutl = $conn->query($sql);
        move_uploaded_file($_FILES['hinhanhSP']['tmp_name'],$hinhCu);
        if($resutl) echo "<script>alert('Cập nhật thành công!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=quanlySP.php'>";
    }
    //dong ket noi 
    $conn->close();
?>

<script>
function kiemTra() {
    var kq = true;
    var tenSP = document.forms["formThemSP"]["tenSP1"].value;
    var giaSP = document.forms["formThemSP"]["giaSP1"].value;
    var gioithieuSP = document.forms["formThemSP"]["gioithieuSP1"].value;
    var nguyenlieuSP = document.forms["formThemSP"]["nguyenlieuSP1"].value;
    var thetichSP = document.forms["formThemSP"]["thetichSP1"].value;
    var doconSP = document.forms["formThemSP"]["doconSP1"].value;
    var noicungcapSP = document.forms["formThemSP"]["noicungcapSP1"].value;
    var khuyenmaiSP = document.forms["formThemSP"]["khuyenmaiSP1"].value;
    var soluongSP = document.forms["formThemSP"]["soluongSP1"].value;

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