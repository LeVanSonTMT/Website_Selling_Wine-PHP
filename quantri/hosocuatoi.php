<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">
    <title>Thông tin của tôi</title>

</head>

<body>
    <div class="main">
        <?php include_once("./heatderAdmin.php");?>
        <div id="divTable">
            <?php 
                    //tao ket noi
                    include_once('./conn.php');
                    // session_start();
                    $Xsdt=$_SESSION['sdt'];
                    $sql="SELECT * From nguoiquanly WHERE sdt='$Xsdt'";
                    $result=$conn->query($sql);
                    if($result->num_rows > 0)
                    { 
                        while($row=$result->fetch_assoc() )
                        {
                ?>
            <table border="0" id="bang1" cellpadding="0" style="border: 1px solid black;background-color: #d3d3d3;">
                <tr>
                    <th rowspan="3" width="250px" height="250px"><img src="<?php echo $row['avt'] ?>" width="100%"
                            height="100%" alt="not avt">
                    </th>
                </tr>
                <tr>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data" name="formSuaTT"
                            onsubmit="return kiemTra()">
                            <table border="0" id="bang3" cellpadding="0">
                                <tr>
                                    <td>
                                        <span>Tên tài khoản: </span><?php echo $row['ten'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Số điện thoại: </span><?php echo $row['sodienthoai'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Email: </span><?php echo $row['email'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Giới tính: </span><?php echo $row['gioitinh'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Ngày sinh: </span> <?php echo $row['ngaysinh'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Địa chỉ: </span><?php echo $row['diachi'] ?>
                                    </td>
                                </tr>
                                <?php }   } $conn->close();?>
                            </table>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th style="padding-top: 10px;"><a id="in3" href="./suaHoSoCuaToi.php">Cập nhật</a></th>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <?php include_once("../forder.php"); ?>
    </div>

</body>

</html>