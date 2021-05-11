<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dd.css">
    <link rel="stylesheet" type="text/css" href="./fomatTableDH.css">
    <title>Đăng nhập</title>
</head>

<body>
    <!-- Main -->
    <div class="main">
        <?php include_once("./heatder.php"); ?>

        <div id="divTable">
            <table border="0" id="bang1" cellpadding="0">
                <tr>
                    <th>
                        <h1>Đăng Nhập!</h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return kiemTra()"
                            name="formDangNhap">
                            <table border="0" id="bang3" cellpadding="3" width="100%">
                                <tr>
                                    <td>Số điện thoại</td>
                                </tr>
                                <tr>
                                    <td> <input type="text" name="sdt" /> </td>
                                </tr>
                                <tr style="color:red; font-style:italic">
                                    <td id="warningSDT"></td>
                                </tr>
                                <tr>
                                    <td> Mật khẩu </td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="matkhau" /></td>
                                </tr>
                                <tr style="color:red; font-style:italic">

                                    <td id="warningPass"></td>
                                </tr>
                                <tr>
                                    <th id="thinput">
                                        <input class="in1" type="submit" name="dangnhap" value="Đăng nhập" />
                                        <input class="in1" type="reset" name="nhaplai" value="Nhập lại" />
                                    </th>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th style="padding-top: 10px;">
                        <a href="dangkytk.php" id="in3"> Đăng ký </a>
                    </th>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <?php include_once("./forder.php"); ?>
    </div>
</body>

</html>

<script>
    function kiemTra() {
        var kq = true;
        if (document.forms["formDangNhap"]["sdt"].value == "") {
            document.getElementById("warningSDT").innerHTML = "Nhập số điện thoại vào!";
            kq = false;
        } else {
            document.getElementById("warningSDT").style.display = "none";
        }
        if (document.forms["formDangNhap"]["matkhau"].value == "") {
            document.getElementById("warningPass").innerHTML = "Nhập mật khẩu vào!";
            kq = false;
        } else {
            document.getElementById("warningPass").style.display = "none";
        }
        return kq;
    }
</script>

<?php
    include_once('quantri/conn.php');
    $dc = $_GET['dc'];
    if(isset($_SESSION['sdt']))
    {
        if($_SESSION['sdt']=='admin')
            echo "<meta http-equiv='refresh' content='0;URL=./quantri/Trangadmin.php'>";
        else   
            echo "<meta http-equiv='refresh' content='0;URL=./index.php'>";
    }

    if(isset($_POST['dangnhap']))
    {
        $sdt1 = $_POST['sdt'];
        if($sdt1=='admin')
        {
            $matkhau1 = $_POST['matkhau'];
            $sql= "SELECT * FROM nguoiquanly Where sdt='$sdt1' and mk='$matkhau1' ";
            $result=$conn->query($sql);
            if($result->num_rows==1)
            {
                $row=$result->fetch_assoc();
                //lưu thông tin ng dang nhap
                $_SESSION['sdt']=$row['sdt'];
                $_SESSION['mk']=$row['mk'];
                $_SESSION['ten']=$row['ten'];
                echo " <script>  alert('Đăng nhập thành công');  </script> ";
                echo "<meta http-equiv='refresh' content='0;URL=./quantri/Trangadmin.php'>";
            }
            else echo " <script>  
                            document.getElementById('warningPass').style.display = 'block'; 
                            document.getElementById('warningPass').innerHTML = 'Mật khẩu hoặc SĐT chưa đúng!';
                        </script> ";
        }
        else
        {
            $matkhau1 = md5($_POST['matkhau']);
            $sql= "SELECT * FROM nguoidung Where sdt='$sdt1' and mk='$matkhau1' ";
            $result=$conn->query($sql);
            if($result->num_rows==1)
            {
                $row=$result->fetch_assoc();
                //lưu thông tin ng dang nhap
                $_SESSION['sdt']=$row['sdt'];
                $_SESSION['mk']=$row['mk'];
                $_SESSION['ten']=$row['ten'];
                echo " <script>  alert('Đăng nhập thành công');  </script> ";
                echo "<meta http-equiv='refresh' content='0;URL=".$dc."'/>";
            }
            else echo " <script>  
                            document.getElementById('warningPass').style.display = 'block'; 
                            document.getElementById('warningPass').innerHTML = 'Mật khẩu hoặc SĐT chưa đúng!';
                        </script> ";    
        } 
    }              
    $conn->close();

?>