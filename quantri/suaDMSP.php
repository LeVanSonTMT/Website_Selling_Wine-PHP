<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <title> Sửa Danh Mục Sản Phẩm </title>
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
                $MaDM=$_GET['MaDM'];
            //viet cau lenh slp
                $sql1="SELECT * FROM danhmucsanpham where MaDMSP='$MaDM' ";
            //thuc hien truy van
                $resutl1 = $conn->query($sql1);
                $row1=$resutl1->fetch_assoc();  
                    $MaDMSP=$row1['MaDMSP'];
                    $ten = $row1['tenDMSP'];
        ?>

        <div id="divTable">
            <table border="1" id="bang1">
                <tr>
                    <td id="in33"><a href="./quanlyDanhMucSP.php"> <img src="../hinhdaidien/anhX.jfif"></a></td>
                </tr>
                <tr>
                    <th>
                        <h1>Sửa thông tin danh mục</h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data" name="formDMSP"
                            onsubmit="return kiemTra()">
                            <table border="1" id="bang3">
                                <tr><td>Mã danh mục: <?php echo $MaDMSP; ?> </td></tr>
                                <tr>
                                    <td> Tên danh mục: <input type="text" name="tenDM" value="<?php echo $ten; ?>" /> </td>
                                </tr>
                                <tr><td id="warningten" style="color: red; font-style:italic"></td></tr>
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
        $tenNew = $_POST['tenDM'];
        $sql22= " UPDATE danhmucsanpham SET tenDMSP='$tenNew' WHERE  MaDMSP='$MaDMSP'";
        //thuc hien truy van
        $resutl22 = $conn->query($sql22);
        if($resutl22) echo "<script>alert('Cập nhật thành công!');</script>";
        else echo "<script>alert('Cập nhật không thành công!');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=quanlyDanhMucSP.php'>";
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
        return kq;
    }

</script>