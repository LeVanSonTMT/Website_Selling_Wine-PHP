<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <title> Thêm Danh Mục Sản Phẩm </title>
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
        ?>

        <div id="divTable">
            <table border="1" id="bang1">
                <tr>
                    <td id="in33"><a href="./quanlyDanhMucSP.php"> <img src="../hinhdaidien/anhX.jfif"></a></td>
                </tr>
                <tr>
                    <th>
                        <h1>Thêm danh mục sản phẩm</h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data" name="formDMSP"
                            onsubmit="return kiemTra()">
                            <table border="1" id="bang3">
                                <tr><td>Mã danh mục: </td></tr>
                                <tr><td> <input type="text" name="maDM" onchange="return maTrung(this.value)"/>  </td></tr>
                                <tr><td id="warningma" style="color: red; font-style:italic"></td></tr>
                                <tr>
                                    <td> Tên danh mục:</td>
                                </tr>
                                <tr><td> <input type="text" name="tenDM" />  </td></tr>
                                <tr><td id="warningten" style="color: red; font-style:italic"></td></tr>
                                <tr>
                                    <th id="thinput">
                                        <input class="in1" type="submit" name="capnhat" value="Thêm" />
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
        $ma = $_POST['maDM'];
        $ten = $_POST['tenDM'];
        $sql22= "INSERT INTO danhmucsanpham VALUES ('$ma', '$ten')";
        //thuc hien truy van
        $resutl22 = $conn->query($sql22);
        if($resutl22) echo "<script>alert('Thêm thành công!');</script>";
        else echo "<script>alert('Thêm không thành công!');</script>";
    }
    //dong ket noi 
    $conn->close();
?>

<script>
    function kiemTra() {
        var kq = true;
        var tenDM = document.forms["formDMSP"]["tenDM"].value;
        
        if (tenDM == "") {
            document.getElementById("warningten").innerHTML = "Chưa nhập tên vào!";
            kq = false;
        } else {
            document.getElementById("warningten").style.display = "none";
        }

        var maDM = document.forms["formDMSP"]["maDM"].value;
        
        if (tenDM == "") {
            document.getElementById("warningma").innerHTML = "Chưa nhập mã vào!";
            kq = false;
        } else {
            document.getElementById("warningma").style.display = "none";
        }   

        if(document.getElementById("warningma").innerHTML == "Mã danh mục này đã tồn tại!")   
        kq=false;

        return kq;
    }

    function maTrung(ma) {
        if (ma == "") {
            document.getElementById("warningma").innerHTML = "Hãy nhập mã vào!";
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
                result = document.getElementById("warningma").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "maTrung.php?ma=" + ma, true);
        xmlhttp.send();
    }

</script>