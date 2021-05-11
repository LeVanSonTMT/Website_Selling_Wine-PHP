<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">
    <title>Sửa mật khẩu!</title>

</head>

<body>
    <div class="main">
        <?php include_once("./heatderAdmin.php");?>
        <div id="divTable">
            <table border="0" id="bang1" cellpadding="0" style="border: 1px solid black;">
                <tr>
                    <td id="in33"><a href="./suaHoSoCuaToi.php"> <img src="../hinhdaidien/anhX.jfif"></a></td>
                </tr>
                <tr>
                    <?php 
                        include_once('./conn.php');
                        $Xsdt=$_SESSION['sdt'];
                        $sql="SELECT mk From nguoiquanly WHERE sdt='$Xsdt'";
                        $result=$conn->query($sql);
                        if($result->num_rows > 0)
                        { 
                            while($row=$result->fetch_assoc() )
                            {
                    ?>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data" name="formSuaTT"
                            onsubmit="return kiemTra()">
                            <table border="0" id="bang3" cellpadding="0">
                                <tr>
                                    <td>
                                        <span>Nhập mật khẩu cũ: </span>
                                        <input type="password" name="mk" onchange="return kiemtraMK(this.value)">
                                    </td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningmk"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Nhập mật khẩu mới:</span>
                                        <input type="password" name="pass1">
                                    </td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningpass1"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Nhập lại mật khẩu mới: </span>
                                        <input type="password" name="pass2">
                                    </td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td class="tdDK" id="warningpass2"></td>
                                </tr>
                                <?php }   } ?>
                                <tr>
                                    <th id="thinput">
                                        <input class="in1" type="submit" name="capnhat" value="Lưu">
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
        <?php include_once("../forder.php"); ?>
    </div>

    <script>
        function kiemTra() {
            var kq = true;
            var pass1 = document.forms["formSuaTT"]["pass1"].value;
            var pass2 = document.forms["formSuaTT"]["pass2"].value;

            if (pass1 == "") {
                document.getElementById("warningpass1").innerHTML = "Chưa nhập mật khẩu!";
                kq = false;
            } else {
                document.getElementById("warningpass1").style.display = "none";
            }

            if (pass2 != pass1) {
                document.getElementById("warningpass2").innerHTML = "Chưa đúng!";
                kq = false;
            } else {
                document.getElementById("warningpass2").style.display = "none";
            }
            return kq;
        }

        function kiemtraMK(mk) {
            if (mk == "") {
                document.getElementById("warningmk").innerHTML = "Chưa nhập mật khẩu";
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
                    result = document.getElementById("warningmk").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "kiemtraMK.php?sdt=<?php echo $Xsdt; ?>&mk=" + mk, true);
            xmlhttp.send();
        }
    </script>
</body>

</html>

<?php
            
    if(isset($_POST['capnhat']))
    {
        $bienMK = $_POST['pass1'];
        $sql = " UPDATE nguoiquanly SET mk='$bienMK' WHERE sdt='$Xsdt'";
        $conn->query($sql);
        echo "<script>alert('Đổi mật khẩu thành công!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=suaHoSoCuaToi.php'>";

    }
    $conn->close();   
?>