<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dd.css">
    <link rel="stylesheet" type="text/css" href="./fomatTableDH.css">
    <title>Sửa thông tin tài khoản</title>

</head>

<body>
    <div class="main">
        <?php include_once("./heatderClient.php");?>
        <div id="divTable">
            <table border="0" id="bang1" cellpadding="0" style="border: 1px solid black;">
                <tr>
                    <td id="in33"><a href="./ThongTinClient.php"> <img src="./hinhdaidien/anhX.jfif"></a></td>
                </tr>
                <tr>
                    <?php 
                    //tao ket noi
                    include_once('quantri/conn.php');
                    // session_start();
                    $Xsdt=$_SESSION['sdt'];
                    $sql="SELECT * From nguoidung WHERE sdt='$Xsdt'";
                    $result=$conn->query($sql);
                    $tenduongdan;
                    $STTUSER;
                    if($result->num_rows > 0)
                    {
                        while($row=$result->fetch_assoc() )
                        {
                            $STTUSER = $row['STTuser'];
                ?>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data" name="formSuaTT"
                            onsubmit="return kiemTra()">
                            <table border="0" id="bang3" cellpadding="0">
                                <tr>
                                    <th>
                                        <img style="border: 2px black solid;" src="<?php $tenduongdan=$row['avt'];
                                         echo $row['avt']; ?>" alt="" width="200px" height="120px">
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Hình ảnh: </span>
                                        <input type="file" name="hinhanh1">
                                    </td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningTen"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Tên tài khoản: </span>
                                        <input type="text" name="ten1" value="<?php echo $row['ten']; ?>">
                                    </td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningTen"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Số điện thoại: </span> <?php echo $row['sdt']; ?>
                                        <!-- <input type="text" name="sdt1" value=""  onchange="return sdtTrung(this.value)"  > -->
                                    </td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningSDT"></td>
                                </tr>
                                <tr>
                                    <td><span>Mật khẩu: </span> <a style="background-color: #f58c02;
                                        padding: 2px 5px;" href="./doipass.php">Đổi mật khẩu</a> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Email: </span>
                                        <input type="email" name="email1" value="<?php echo $row['email']; ?>">
                                    </td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningEmail"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Giới tính: </span>
                                        <input type="radio" name="gioitinh1"
                                            <?php if($row['gioitinh']=="Nam") echo "checked"; ?> value="Nam"> Nam
                                        <input type="radio" name="gioitinh1"
                                            <?php if($row['gioitinh']=="Nữ") echo "checked"; ?> value="Nữ">Nữ
                                        <input type="radio" name="gioitinh1"
                                            <?php if($row['gioitinh']=="Khác") echo "checked"; ?> value="Khác">Khác

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Ngày sinh: </span>
                                        <input type="date" name="ngaysinh1"
                                            value="<?php echo date_format(date_create($row['ngaysinh']),"Y-m-d"); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Địa chỉ: </span>
                                        <input type="text" name="diachi1" value="<?php echo $row['diachi']; ?>">
                                    </td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningDiaChi"></td>
                                </tr>
                                <?php }   } ?>
                                <tr>
                                    <th id="thinput">
                                        <input class="in1" type="submit" name="capnhat" value="Cập Nhật">
                                        <input class="in1" type="reset" name="reset" value="Hủy">
                                    </th>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <?php include_once("./forder.php"); ?>
    </div>

    <script>
    function kiemTra() {
        var kq = true;
        var ten = document.forms["formSuaTT"]["ten1"].value;
        var diachi = document.forms["formSuaTT"]["diachi1"].value;
        var email = document.forms["formSuaTT"]["email1"].value;
        var sdt = document.forms["formSuaTT"]["sdt1"].value;
        var pattern_sdt = /^[0-9]{10}/;
        if (!pattern_sdt.test(sdt) && sdt != "") {
            document.getElementById("warningSDT").innerHTML = "Số điện thoại chưa đúng!";
            kq = false;
        } else if (sdt == "") {
            document.getElementById("warningSDT").innerHTML = "Hãy nhập số điện thoại vào!";
            kq = false;
        } else {
            document.getElementById("warningSDT").style.display = "none";
        }

        if (ten == "") {
            document.getElementById("warningTen").innerHTML = "Chưa nhập tên!";
            kq = false;
        } else {
            document.getElementById("warningTen").style.display = "none";
        }

        var pattern_email = /^[A-Za-z0-9]+\@[A-Za-z]+\.[A-Za-z]+[\.A-z0-9]*$/;
        if (!pattern_email.test(email) && email != "") {
            document.getElementById("warningEmail").innerHTML = "Sai cú pháp email(VD: User@gmail.com)!";
            kq = false;
        } else if (email == "") {
            document.getElementById("warningEmail").innerHTML = "Hãy nhập email vào!";
            kq = false;
        } else {
            document.getElementById("warningEmail").style.display = "none";
        }

        if (diachi == "") {
            document.getElementById("warningDiaChi").innerHTML = "Hãy nhập địa chỉ vào!";
            kq = false;
        } else {
            document.getElementById("warningDiaChi").style.display = "none";
        }

        if (document.getElementById("warningSDT").innerHTML == "Số điện thoại đã được sử dụng!") {
            kq = false;
        }

        return kq;
    }

    function sdtTrung(sdt) {
        if (sdt == "") {
            document.getElementById("warningSDT").innerHTML = "";
            return false;
        }

        var xmlhttp;
        if (window.XMLHttpRequest) { // code IE7+, firefox,chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { //IE6 IE5
            xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
        }
        var result = "";
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                result = document.getElementById("warningSDT").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "sdtTrung2.php?sttuser=<?php echo $STTUSER; ?>&sdt=" + sdt, true);
        xmlhttp.send();
    }
    </script>
</body>

</html>

<?php
            
    if(isset($_POST['capnhat']))
    {
        $sdt = $_POST['sdt1'];
        $ten = $_POST['ten1'];
        $email=$_POST["email1"];
        $diachi = $_POST['diachi1']; 
        $gioitinh = $_POST['gioitinh1'];
        $ngaysinh = $_POST['ngaysinh1'];

        $hinhCu = $tenduongdan;
        $HinhAnh=$_FILES['hinhanh1'];
        $TenAnh=$HinhAnh['name'];        
        if($TenAnh!=""){
            unlink($hinhCu);
           $hinhCu = "./hinhdaidien/".$_FILES['hinhanh1']['name'];           
        }

        $sql = " UPDATE nguoidung SET ten='$ten', email='$email', ngaysinh='$ngaysinh',
                            diachi='$diachi', gioitinh='$gioitinh', avt='$hinhCu'
          WHERE STTuser='$STTUSER' and sdt='$Xsdt' ";
        
        $conn->query($sql);
        move_uploaded_file($_FILES['hinhanh1']['tmp_name'],$hinhCu);
        echo "<script>alert('Cập nhật thành công!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=ThongTinClient.php'>";
    }
    //dong ket noi    
    $conn->close();   
?>