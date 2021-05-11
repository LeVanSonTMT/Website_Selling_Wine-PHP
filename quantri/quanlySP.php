<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../fomatTableDH.css">
    <link rel="stylesheet" type="text/css" href="../dd.css">
    <title>Quản Lý Sản Phẩm</title>

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
                        $sql = "SELECT * FROM sanpham where ttSP=1"; 
                        $result=$conn->query($sql);
                        $sl = $result->num_rows;
                      ?>
        <div id="divTable">
            <h1>Danh Sách Sản Phẩm</h1>
            <table id="bangQL" border="0" cellspacing="0">
                <tr>
                    <td colspan="16">Tổng số sản phẩm là: <?php echo $sl; ?> </td>
                </tr>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Giới thiệu</th>
                    <th>Nguyên liệu</th>
                    <th>Thể tích</th>
                    <th>Độ cồn</th>
                    <th>Giá</th>
                    <th>Nơi cung cấp</th>
                    <th>Ảnh</th>
                    <th>Khuyến mãi</th>
                    <th>Tổng SL</th>
                    <th>SL còn lại</th>
                    <th>SL bán được</th>
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
                    <th id="td4" style="text-align:center;"> <?php echo $i ;?> </th>
                    <th id="td4"> <?php echo $row['maSP']; ?> </th>
                    <th id="td4"> <?php echo $row['tenSP']; ?> </th>
                    <td id="td4"> <?php echo $row['gioithieuSP']; ?> </td>
                    <td id="td4"> <?php echo $row['nguyenlieuSP']; ?> </td>
                    <th id="td4"> <?php echo $row['thetichSP']; ?>ml</th>
                    <th id="td4"> <?php echo $row['doconSP']; ?>&deg;</th>
                    <th id="td4"> <?php  echo number_format($row['giaSP'],0,",","."); ?>đ</th>
                    <td id="td4"> <?php echo $row['noicungcapSP']; ?> </td>
                    <th id="td4"> <img src="<?php echo $row['hinhanhSP']; ?> " alt="No img" width="50px" height="50px">
                    </th>
                    <th id="td4"> <?php echo $row['khuyenmaiSP']; ?>%</th>
                    <th id="td4"> <?php echo $row['soluongSP'] + $row['soluongSPban']; ?> </th>
                    <th id="td4"> <?php echo $row['soluongSP']; ?> </th>
                    <th id="td4"> <?php echo $row['soluongSPban']; ?> </th>
                    <th id="td4"> <a style="text-decoration: none;"
                            href="suaSP.php?masp=<?php echo $row['maSP']; ?>">Sửa</a> </th>
                    <th id="td4"> <a style="text-decoration: none;"
                            href="xoaSP.php?masp=<?php echo $row['maSP']; ?>">Xóa</a> </th>
                </tr>
                <?php $i=$i+1; } }  $conn->close();    ?>

            </table>
        </div>
        <!-- Footer -->
        <?php include_once("../forder.php"); ?>

    </div>
</body>

</html>