<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <title>Quản Lý Danh Mục Sản Phẩm</title>

</head>

<body>
    <div class="main">
        <?php include_once("./heatderAdmin.php"); ?>
        <?php                             
                        if(!isset($_SESSION['sdt']))
                            { 
                                header("location: ../../dangnhap.php");
                            }
                        include_once('conn.php');
                        $sql = "SELECT * FROM danhmucsanpham"; 
                        $result=$conn->query($sql);
                        $sl = $result->num_rows;
                      ?>
        <div id="divTable">
            <h1>Danh Mục Sản Phẩm</h1>
            <table id="bang1" border="0" cellspacing="0" style="text-align:center;">
                <tr>
                    <td style="text-align:left;" colspan="5">Tổng số danh mục là: <?php echo $sl; ?> <hr></td>
                    <td id="tdDM"> <a href="./themDMSP.php"> Thêm++ </a> </td>
                </tr>
                <tr style="background-color: #696969;">
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Tổng số sản phẩm</th>
                    <th colspan="2">Chức năng</th>
                </tr>
                <?php                             
                          if($result->num_rows > 0)
                          { 
                            $i=1;
                            while($row=$result->fetch_assoc() )
                            {
                      ?>
                <tr>
                    <td> <?php echo $i ;?></th>
                    <td> <?php $MaDM = $row['MaDMSP']; echo $MaDM ?> </td>
                    <td> <?php echo $row['tenDMSP']; ?> </td>
                    <td><?php   
                            $sql1="SELECT Count(*) as SL FROM sanpham where MaDMSP='$MaDM' and ttSP>0";
                            //thuc hien truy van
                                $resutl1 = $conn->query($sql1);
                                $row1=$resutl1->fetch_assoc();
                                echo $row1['SL'];
                        ?>  Sản phẩm</td>
                    <td id="tdDM"> <a href="suaDMSP.php?MaDM=<?php echo $MaDM; ?>">Sửa</a> </td>
                    <td id="tdDM"> <a href="xoaDMSP.php?MaDM=<?php echo $MaDM; ?>">Xóa</a> </td>
                    <style>
                        #tdDM a {                            
                            background-color: #f58c02;
                            padding: 3px 15px;                    
                        }
                        #tdDM a:hover {
                            background-color: green;
                        }
                    </style>
                </tr>
                <?php $i=$i+1; } }  $conn->close();    ?>

            </table>
        </div>
        <!-- Footer -->
        <?php include_once("../forder.php"); ?>

    </div>
</body>

</html>