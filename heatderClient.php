    <?php
        include_once("./quantri/conn.php");
        session_start();
        if(!isset($_SESSION['sdt']))
        {
            echo "<meta http-equiv='refresh' content='0;URL=dangnhap.php'/>";   
        }
        if($_SESSION['sdt']=="admin") echo "<meta http-equiv='refresh' content='0;URL=./quantri/Trangadmin.php'>";
        $BienSDT = $_SESSION['sdt'];
        $BienTen = $_SESSION['ten'];
    ?>

    <!-- TITLE -->
    <div class="title">
        <div id="divTEN">
            <h1>BTN_Shop</h1>
            <p>Cửa hàng chuyên buôn bán sỉ lẻ rượu các loại</p>
        </div>
    </div> <!-- the end TITLE -->

    <div class="search">
        <table id="timkiem" border="0">
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
            <li> <img src="./hinhdaidien/anhUser.jpg" width="30px" height="34px" alt="no img"> <a
                    href="./TrangClient.php"> <?php echo $BienTen; ?></a>
                <ol id="cc">
                    <li> <a
                            href="<?php if($BienSDT=='admin') echo './quantri/hosocuatoi.php'; else echo './ThongTinClient.php'?>">Hồ
                            sơ của tôi</a> </li>
                    <li> <a href="<?php if($BienSDT=='admin') echo ''; else echo './donhang.php'?>"> Đơn hàng</a></li>
                    <li> <a href="./dangxuat.php">Đăng xuất</a> </li>
                </ol>
            </li>
        </ul>
    </div>


    <div class="menu">
        <ul>
            <li><a href="index.php">Trang Chủ</a></li>
            <li><a href="./donhang.php">Đơn Hàng Của Tôi</a>
                <ol>
                    <li><a href="./donhangDaDat.php">Đơn Chờ Xác Nhận</a></li>
                    <li><a href="./donhangDaDuyet.php">Đơn Chờ Nhận</a></li>
                    <li><a href="./donhangDaGiao.php">Đơn Đã Nhận</a></li>
                    <li><a href="./donhangDaHuy.php">Đơn Đã Hủy</a></li>
                </ol>
            </li>
            <li><a
                    href="<?php if($BienSDT=='admin') echo './quantri/hosocuatoi.php'; else echo './ThongTinClient.php'?>">Hồ
                    Sơ Của Tôi</a></li>
            <li id="li_gh"><a style="padding-bottom: 0px;" href="./xemGioHang.php" id="gh"> <img
                        src="./hinhdaidien/anhgioihang.png" width="60px" height="30px" alt="no img"> </a></li>
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
            xmlhttp.open("GET", "livesearch.php?str=" + str, true);
            xmlhttp.send();
        }
    </script>
    <?php
        include_once('./quantri/conn.php');
        if(isset($_POST['submitTK']))
        {
            $keyX = $_POST['tukhoa'];
            if($keyX!="")
            {
                $sql=" SELECT DISTINCT * From sanpham Where tenSP like '%$keyX%' ";
                $result=$conn->query($sql);
                if($result->num_rows > 0)
                    echo "<meta http-equiv='refresh' content='0;URL=timkiemSP.php?key=".$keyX."'>";             
            }
                
        }

    ?>