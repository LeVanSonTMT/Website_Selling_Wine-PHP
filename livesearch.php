    <?php
    include_once('./quantri/conn.php');
    session_start();
    $str=$_REQUEST['str'];
   
        if($str!=""){
            $sql=" SELECT DISTINCT * From sanpham Where tenSP like '%$str%' ";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                $i=0;
                while($row=$result->fetch_assoc()){
                    echo "<a id='hienthi' href='./xemchitietSP.php?masp=".$row['maSP']."'>".$row['tenSP']."</a>";
                    $i=$i+1;
                    if($i>=15) break;
                }
            }
            else echo "<a id='hienthi' style='color: red;'> Không tìm thấy! </a>";
        }
        $conn->close();
    echo"<style>  
        #hienthi{    
            display: block;
            font-weight: normal;
            position: relative;
            position: 5;    
            padding: 3px;
            text-align:center;
            background-color: #ffffff	;
            color: black;
            width:100%;
        }
        #hienthi:hover{
            background-color: #B0C4DE;
        }
        </style>";
    ?>