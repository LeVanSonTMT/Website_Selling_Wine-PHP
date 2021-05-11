<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dd.css">
    <link rel="stylesheet" type="text/css" href="./fomatTableDH.css">
    <title>Đăng ký tài khoản</title>
</head>

<body>
    <!-- Main -->
    <div class="main">
        <?php include_once("./heatder.php"); ?>

        <div id="divTable">
            <table border="0" id="bang1" cellpadding="0">
                <tr>
                    <th>
                        <h1>Đăng Ký Tài Khoản!</h1>
                    </th>
                </tr>
                <tr>
                    <th>
                        <hr> Điền đầy đủ các thông tin sau!
                        <hr>
                    </th>
                </tr>
                <tr>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data" name="formDangKy"
                            onsubmit="return kiemTra()">
                            <table border="0" id="bang3" cellpadding="3" width="100%">
                                <tr>
                                    <td>Số điện thoại đăng ký</td>
                                </tr>
                                <tr>
                                    <td class="tdDK"><input type="text" name="sdt" placeholder="ví dụ: 0987654321"
                                            onchange="return sdtTrung(this.value)"> (*)</td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningSDT"></td>
                                </tr>

                                <tr>
                                    <td>Mật khẩu</td>
                                </tr>
                                <tr>
                                    <td class="tdDK"><input type="password" name="matkhau" placeholder="ví dụ: abcd123"> (*)</td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningPass"></td>
                                </tr>

                                <tr>
                                    <td>Nhập lại mật khẩu</td>
                                </tr>
                                <tr>
                                    <td class="tdDK"><input type="password" name="ktmatkhau" placeholder="ví dụ: abcd123"> (*)</td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningPass2"></td>
                                </tr>

                                <tr>
                                    <td>Tên tài khoản</td>
                                </tr>
                                <tr>
                                    <td class="tdDK"><input type="text" name="ten" placeholder="ví dụ: Van Trung"> (*)</td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningTen"></td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                </tr>
                                <tr>
                                    <td class="tdDK"> <input type="text" name="email" placeholder="ví dụ: Trung@gmail.com"> (*)</td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningEmail"></td>
                                </tr>

                                <tr>
                                    <td>Giới tính</td>
                                </tr>
                                <tr>
                                    <td class="tdDK" style="font-weight: normal;">
                                        <input type="radio" name="gioitinh" value="Nam" checked> Nam
                                        <input type="radio" name="gioitinh" value="Nữ">Nữ
                                        <input type="radio" name="gioitinh" value="Khác">Khác
                                    </td>
                                </tr>

                                <tr>
                                    <td>Ngày sinh</td>
                                </tr>
                                <tr>
                                    <td class="tdDK"><input type="date" name="ngaysinh"></td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningNgaySinh"></td>
                                </tr>

                                <tr>
                                    <td>Địa chỉ</td>
                                </tr>
                                <tr>
                                    <td class="tdDK"><input type="text" name="diachi" placeholder="ví dụ: Q.Ninh Kiều, Cần Thơ"> (*)</td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningDiaChi"></td>
                                </tr>

                                <tr>
                                    <td>Ảnh đại diện</td>
                                </tr>
                                <tr>
                                    <td class="tdDK"><input type="file" name="avt"></td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningAvatar"></td>
                                </tr>

                                <tr>
                                    <th id="thinput">
                                        <input class="in1" type="submit" name="dangky" value="Đăng ký" />
                                        <input class="in1" type="reset" name="nhaplai" value="Nhập lại" />
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
    <!-- the end Main -->
</body>

</html>

<script>
    function kiemTra() {
        var kq = true;
        var sdt = document.forms["formDangKy"]["sdt"].value;
        var ten = document.forms["formDangKy"]["ten"].value;
        var pass = document.forms["formDangKy"]["matkhau"].value;
        var pass2 = document.forms["formDangKy"]["ktmatkhau"].value;
        var diachi = document.forms["formDangKy"]["diachi"].value;
        var email = document.forms["formDangKy"]["email"].value;

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

        var pattern_pass = /^[A-Za-z0-9]{3,12}/;
        if (!pattern_pass.test(pass) && pass != "") {
            document.getElementById("warningPass").innerHTML = "Nhập sai cú pháp mật khẩu(size > 3)!";
            kq = false;
        } else if (pass == "") {
            document.getElementById("warningPass").innerHTML = "Hãy nhập mật khẩu vào!";
            kq = false;
        } else {
            document.getElementById("warningPass").style.display = "none";
        }

        if (pass2 != pass) {
            document.getElementById("warningPass2").innerHTML = "Mật khẩu chưa đúng!";
            kq = false;
        } else {
            document.getElementById("warningPass2").style.display = "none";
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
            document.getElementById("warningSDT").innerHTML = "Hãy nhập số điện thoại vào!";
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
        xmlhttp.open("GET", "sdtTrung.php?sdt=" + sdt, true);
        xmlhttp.send();
    }
    </script>

<?php
    //tao ket noi
    include_once('quantri/conn.php');        
    if(isset($_POST['dangky']))
    {
        $sdt = $_POST['sdt'];
        $matkhau= md5($_POST["matkhau"]);
        $ten = $_POST['ten'];
        $email=$_POST["email"];
        $gioitinh = $_POST['gioitinh'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $avt="./hinhdaidien/".$_FILES['avt']['name'];
        
        $sql = " INSERT INTO nguoidung(sdt,mk,ten,email,gioitinh,ngaysinh,diachi,avt)
          VALUES ('$sdt','$matkhau','$ten','$email','$gioitinh','$ngaysinh','$diachi','$avt')";

        $conn->query($sql);
        move_uploaded_file($_FILES['avt']['tmp_name'],$avt);
        echo "<script>alert('Đăng ký thành công!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=dangnhap.php'>";
    }
    //dong ket noi    
    $conn->close();   
?>