    <?php
        session_start();
        include_once("./conn.php");    
        $tk = $_SESSION['ten'];
        if(!isset($_SESSION['sdt']))
        {
            if($_SESSION['sdt']!='admin')
            {
                echo "<script>alert('Vui lòng đăng nhập');</script>";
                header("location: ../dangnhap.php");
            }
        }

        
    ?>

    <!-- TITLE -->
    <div class="title">
        <div id="divTEN">
            <h1>BTN_Shop</h1>
            <p>Cửa hàng chuyên buôn bán sỉ lẻ rượu các loại</p>
        </div>
    </div> <!-- the end TITLE -->

    <div class="search">
        <table id="timkiem">
            <tr>
                <form action="" method="POST" enctype="multipart/form-data" name="formSearch">
                    <th>Search</th>
                    <th><input onkeyup="liveSearch(this.value)" type="text" name="tukhoa"
                            placeholder="Nhập tên sản phẩm vào..." /></th>
                    <th><input type="submit" name="submitTK" value="Tìm kiếm" /></th>
                </form>
            </tr>
            <tr>
                <th></th>
                <th id="livesearch"></th>
                <th></th>
            </tr>
        </table>
        <ul id="ccc">
            <li> <img src="../hinhdaidien/anhUser.jpg" width="30px" height="34px" alt="no img">
                <a href="./Trangadmin.php"> <?php echo $tk; ?> </a>
                <ol id="cc">

                    <li> <a href="./hosocuatoi.php">Hồ sơ của tôi</a> </li>
                    <li> <a href="../dangxuat.php">Đăng xuất</a> </li>
                </ol>
            </li>
        </ul>
    </div>

    <div class="menu">
        <ul>
            <li><a href="../index.php">Trang Chủ</a></li>
            <li>
                <a href="./Trangadmin.php">Quản Lý Đơn Hàng</a>
                <ol>
                    <li> <a href="./DonHangChoDuyet.php"> Đơn Hàng Chờ Duyệt</a></li>
                    <li> <a href="./DonHangChoGiao.php"> Đơn Hàng Chờ Giao</a></li>
                    <li> <a href="./DonHangDaGiao.php"> Đơn Hàng Đã Giao</a></li>
                    <li> <a href="./DonHangDaHuy.php">Đơn Hàng Đã Hủy</a></li>
                </ol>
            </li>
            <li><a href="./quanlyDanhMucSP.php">Quản Lý Danh Mục</a></li>
            <li><a href="./quanlySP.php">Quản Lý Sản Phẩm</a>
                <ol>
                    <li><a href="./khoiphucSP.php">Phục Hồi Sản Phẩm</a></li>
                    <li><a href="./themSP.php">Thêm Sản Phẩm Mới</a></li>
                </ol>
            </li>
            <li><a href="">Xem Thư</a>
                <ol>
                    <li><a href="./xemThuGopY.php">Thư Chưa Xem</a></li>
                    <li><a href="./xemThuGopYdaxem.php">Thư Đã Xem</a></li>
                </ol>
            </li>
        </ul>
    </div>


    <script>
        function liveSearch(str) {
            var xmlhttp;
            if (str == "") {
                document.getElementById("livesearch").style.display = "none";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("livesearch").innerHTML = this.responseText;
                    document.getElementById("livesearch").style.display = "block";
                }
            };
            xmlhttp.open("GET", "../livesearch.php?str=" + str, true);
            xmlhttp.send();
        }
    </script>
    <?php
        include_once('./conn.php');
        if(isset($_POST['submitTK']))
        {
            $keyX = $_POST['tukhoa'];
            if($keyX!="")
            {
                $sql=" SELECT DISTINCT * From sanpham Where tenSP like '%$keyX%' ";
                $result=$conn->query($sql);
                if($result->num_rows > 0)
                    echo "<meta http-equiv='refresh' content='0;URL=../timkiemSP.php?key=".$keyX."'>";             
            }
                
        }
    ?>