    <?PHP
        session_start();
        //kiem tra coi neu da dang nhap thi lam.
        $tenTK = "";
        $sdtTK="";
        $dc = $_GET['dc'];
        if(isset($_SESSION['sdt']))
            { 
                $tenTK = $_SESSION['ten'];
                $sdtTK = $_SESSION['sdt'];
                echo "<script>document.getElementById('dagky').style.display = 'none';</script>";
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
        <table id="timkiem" border="0">
            <tr>
                <form action="" method="POST" enctype="multipart/form-data" name="formSearch">
                    <th>Search</th>
                    <th><input onkeyup="liveSearch(this.value)" type="text" name="tukhoa"
                            placeholder="Nhập tên sản phẩm vào..." /></th>
                    <th><input type="submit" name="submitTK" value="Tìm kiếm" onclick="timkiemSP()" /></th>
                </form>
            </tr>
            <tr>
                <th></th>
                <th id="livesearch"></th>
                <th></th>
            </tr>
        </table>
        <table border="0" id="bangForm">
            <tr>
                <th id="dagky"> <a href="<?php if(isset($_SESSION['sdt'])) echo ""; else echo "dangkytk.php"; ?>"> Đăng
                        Ký </a></th>
                <th><a id="dagnhap" href="<?php if(isset($_SESSION['sdt'])) echo ""; else echo "dangnhap.php"; ?>"> Đăng
                        Nhập </a>
                </th>
                <th>
                    <a id="TKuser"
                        href="<?php if($sdtTK=='admin') echo 'quantri/Trangadmin.php'; else echo 'TrangClient.php'; ?> ">
                        <img src="../hinhdaidien/anhUser.jpg" width="30px" height="24px" alt="no img">
                        <?php if(isset($_SESSION['sdt'])) echo $tenTK; else echo ''; ?> </a>
                </th>
            </tr>
        </table>
    </div>

    <!-- MENU -->
    <div class="menu">
        <ul>
            <li><a href="index.php">Trang Chủ</a></li>
            <li><a href="danhMucSP.php">Danh Mục Sản phẩm</a>
                <ol>
                    <li class="li1"><a href="ruouMBac.php">Rượu Miền Bắc</a>
                    <li class="li1"><a href="ruouMTrung.php">Rượu Miền Trung</a>
                    <li class="li1"><a href="ruouMNam.php">Rượu Miền Nam</a>
                </ol>
            </li>
            <li><a href="khuyenMaiSP.php">Khuyến Mãi</a></li>
            <li><a href="spMoiNhat.php">Hàng Mới Nhất</a></li>
            <li><a href="<?php if($sdtTK=='admin') echo ""; else echo "./gopY.php"; ?>">Góp Ý</a></li>
            <li><a href="gioithieu.php">Giới Thiệu</a></li>
            <li id="li_gh"><a style="padding-bottom: 0px;"
                    href="<?php if($sdtTK=='admin') echo ""; else echo "./xemGioHang.php"; ?>" id="gh"> <img
                        src="./hinhdaidien/anhgioihang.png" width="60px" height="30px" alt="no img"> </a> </li>
        </ul>

    </div>
    <!-- the end MENU -->



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