<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-6015261015-project</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: red;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>CED60</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>แสดงรุ่นรถ</h4>
                    <a href="ducati_add.php" class="btn btn-link">เพิ่มรุ่นรถ</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>รหัส</th>
                                    <th>ชื่อรุ่น</th>
                                    <th>ราคา</th>
                                    <th>รายละเอียดเครื่องยนต์</th>
                                    <th>ขนาดเครื่องยนต์</th>
                                    <th>น้ำมันเชื้อเพลิง</th>
                                    <th>แรงม้า</th>
                                    <th>น้ำหนัก</th>
                                    <th>ระบบกันสะเทือน</th>
                                    <th>ประเภทรถ</th>
                                    <th>สีรถ</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                        include 'connectdb.php';                        
                        $sql =  'SELECT * FROM view_bigbike order by du_id';
                        $result = mysqli_query($conn,$sql);
                        while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                            echo '<tr>';
                            echo '<td>' . $row['du_id'] . '</td>';
                            echo '<td>' . $row['du_name'] . '</td>';
                            echo '<td>' . $row['du_price'] . '</td>';
                            echo '<td>' . $row['du_enginedetails'] . '</td>';
                            echo '<td>' . $row['du_enginesize'] . '</td>';
                            echo '<td>' . $row['du_fuel'] . '</td>';
                            echo '<td>' . $row['du_horsepower'] . '</td>';
                            echo '<td>' . $row['du_weight'] . '</td>';
                            echo '<td>' . $row['du_suspension'] . '</td>';
                            echo '<td>' . $row['tc_typeb'] . '</td>';
                            echo '<td>' . $row['cc_color'] . '</td>';
                            echo '<td>';
                            ?>
                                <a href="ducati_edit.php?du_id=<?php echo $row['du_id'];?>" class="btn btn-warning">แก้ไข</a>
                                <a href="JavaScript:if(confirm('ยืนยันการลบ')==true)
                                   {window.location='ducati_delete.php?du_id=<?php echo $row["du_id"];?>'}" class="btn btn-danger">ลบ</a>
                            <?php
                                    echo '</td>';                            
                            echo '</tr>';
                        }
                        mysqli_free_result($result);
                        echo '</table>';
                        mysqli_close($conn);
                    ?>
                            </tbody>
                        </table>    
                </div>    
            </div>
            <div class="row">
            <address>นายนฤมิต บุญเส็ง รหัส 6015261015</address>
                <address>คณะครุศาสตร์ สาขาคอมพิวเตอร์ศึกษา ปี 2</address>
            </div>
        </div>    
    </body>
</html>