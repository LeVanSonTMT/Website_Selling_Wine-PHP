<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="dd.css">
    <title>Thư góp ý</title>
</head>

<body>
    <div class="main">
        <?php include_once("./heatder.php");?>
        <?php
            // session_start();
            //kiem tra coi neu da dang nhap thi lam.
            if(!isset($_SESSION['sdt']))
            { 
                echo "<meta http-equiv='refresh' content='0;URL=../../dangnhap.php?dc=".$_SERVER['REQUEST_URI']."'>";
            }
            $bienX = $_SESSION['sdt'];
            //tao ket noi
            include_once('quantri/conn.php');
            //viet cau lenh slp
            $sql1="SELECT * FROM nguoidung where sdt='$bienX'";
            // thuc hien truy van
                $resutl1 = $conn->query($sql1);
                $row1=$resutl1->fetch_assoc();
                        $sdt1=$row1['sdt']; 
                        $ten1=$row1['ten'];
                        $email1=$row1['email'];
                        $diachi1=$row1['diachi'];

            //viet cau lenh sql
            if(isset($_POST['gui']) )
            {
                $noidung = trim($_POST['noidung']," ");
                if($noidung =='')
                    echo "<script>alert('Bạn chưa nhập nội dung góp ý!');</script>"; 
                else{
                    $sql = " INSERT INTO thugopy(sdt,ten,email,diachi,thoigian,noidung,ttThu)
                    VALUES ('$sdt1','$ten1','$email1','$diachi1',now(),'$noidung',1) ";
                    //thuc hien truy van
                    $conn->query($sql);
                    echo "<script>alert('Gửi thành công!');</script>";
                }
            }  
            
        ?>

        <div id="divTable">
            <table border="0" id="bang1">
                <tr>
                    <th>
                        <h1> Thư Góp Ý </h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data" name="formThuGopY">
                            <table border="0" id="bang3">
                                <tr>
                                    <td>Tên khách hàng: <?php echo $ten1; ?></td>
                                </tr>
                                <tr>

                                    <td>Số điện thoại: <?php echo $sdt1; ?></td>
                                </tr>
                                <tr>
                                    <td>Email: <?php echo $email1; ?></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ: <?php echo $diachi1; ?></td>
                                </tr>
                                <tr>
                                    <td>Nội dung góp ý: </td>
                                </tr>
                                <tr>
                                    <td><textarea type="text" name="noidung" value=""
                                            style=" width: 330px; height:100px; font-size:20px; "> </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th id="thinput">
                                        <input class="in1" type="submit" name="gui" value="Gửi Đi" />
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
</body>

</html>