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
                    <h4>เพิ่มข้อมูลรุ่นรถ</h4>
                    <?php
                        if(isset($_GET['submit'])){
                            $du_id = $_GET['du_id'];
                            $du_name = $_GET['du_name'];
                            $du_price = $_GET['du_price'];
                            $du_enginedetails = $_GET['du_enginedetails'];
                            $du_enginesize = $_GET['du_enginesize'];
                            $du_fuel = $_GET['du_fuel'];
                            $du_horsepower = $_GET['du_horsepower'];
                            $du_weight = $_GET['du_weight'];
                            $du_suspension = $_GET['du_suspension'];
                            $du_cc_id = $_GET['du_cc_id'];
                            $du_tc_id = $_GET['du_tc_id'];
                            $sql = "insert into ducati";
                            $sql .= " values (null,'$du_name','$du_price','$du_enginedetails','$du_enginesize','$du_fuel','$du_horsepower','$du_weight','$du_suspension','$du_cc_id','$du_tc_id' )";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มรุ่นรถ $du_name เรียบร้อยแล้ว<br>";
                            echo '<a href="ducati_list.php">แสดงรุ่นรถทั้งหมด</a>';
                        }else{
                    ?>
                        <form class="form-horizontal" role="form" name="ducati_add" action="<?php echo $_SERVER['PHP_SELF'];?>">     
                        <div class="form-group">
                            <label for="du_name" class="col-md-2 col-lg-2 control-label">ชื่อรุ่น</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="du_name" id="du_name" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="du_price" class="col-md-2 col-lg-2 control-label">ราคา</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="du_price" id="du_price" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="du_enginedetails" class="col-md-2 col-lg-2 control-label">รายละเอียดเครื่องยนต์</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="du_enginedetails" id="du_enginedetails" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="du_enginesize" class="col-md-2 col-lg-2 control-label">ขนาดเครื่องยนต์</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="du_enginesize" id="du_enginesize" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="du_fuel" class="col-md-2 col-lg-2 control-label">น้ำมันเชื้อเพลิง</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="du_fuel" id="du_fuel" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="du_horsepower" class="col-md-2 col-lg-2 control-label">แรงม้า</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="du_horsepower" id="du_horsepower" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="du_weight" class="col-md-2 col-lg-2 control-label">น้ำหนัก</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="du_weight" id="du_weight" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="du_suspension" class="col-md-2 col-lg-2 control-label">ระบบกันสะเทือน</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="du_suspension" id="du_suspension" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <label for="du_tc_id" class="col-md-2 col-lg-2 control-label">ประเภทรถ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="du_tc_id" id="du_tc_id" class="form-control">  
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM typecar order by tc_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['tc_id'] . '">';
                                        echo $row['tc_typeb'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="du_cc_id" class="col-md-2 col-lg-2 control-label">สีรถ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="du_cc_id" id="du_cc_id" class="form-control">  
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM colorcar order by cc_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['cc_id'] . '">';
                                        echo $row['cc_color'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div> 
                    </form>
                    <?php
                        }
                    ?>
                </div>    
            </div>
            <div class="row">
            <address>นายนฤมิต บุญเส็ง รหัส 6015261015</address>
                <address>คณะครุศาสตร์ สาขาคอมพิวเตอร์ศึกษา ปี 2</address>
            </div>
        </div>    
    </body>
</html>