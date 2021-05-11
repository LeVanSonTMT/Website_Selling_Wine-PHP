<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <title>Danh Sách Thư Đã Xem Góp Ý</title>

</head>

<body>
    <div class="main">
        <?php include_once("./heatderAdmin.php"); ?>
        <div id="divTable">
            <table border='0' id="bang1" cellpadding="0">
                <tr>
                    <th>
                        <h1> Danh Sách Thư Đã Xem </h1>
                    </th>
                </tr>
                <tr>
                    <td>
                        <table border='0' id="bang2" cellspacing="0">
                            <tr>
                                <th>STT</th>
                                <th>Người gửi</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Thời gian gửi</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                            </tr>
                            <?php                    
                                if(!isset($_SESSION['sdt']))
                                { 
                                    header("location: ../../dangnhap.php");
                                }
                                include_once('conn.php');
                                $sql = "SELECT * FROM thugopy where ttThu=0"; 
                                $result=$conn->query($sql);
                                if($result->num_rows > 0)
                                {       
                                    $i=1;            
                                    while($row=$result->fetch_assoc() )
                                    {
                                ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $row['ten']; ?> </td>
                                <td> <?php echo $row['sdt']; ?> </td>
                                <td> <?php echo $row['email']; ?> </td>
                                <td> <?php echo $row['diachi']; ?></td>
                                <td> <?php echo $row['thoigian']; ?></td>
                                <td> <?php echo $row['noidung']; ?> </td>
                                <td style="color: red;">Đã Xem</td>
                                <td> <a href="./xoaThu.php?STT=<?php echo $row['STTthu']?>">Xóa</a></td>
                            </tr>
                            <?php  $i=$i+1;} }  $conn->close();    ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <!-- Footer -->
        <?php include_once("../forder.php"); ?>

    </div>
</body>

</html>