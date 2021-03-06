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
                <h4>แก้ไขข้อมูลประเภทรถ</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $tc_id     = $_GET['tc_id'];
                        $tc_typeb   = $_GET['tc_typeb'];
                        $sql        = "update typecar set tc_typeb='$tc_typeb' where tc_id='$tc_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "แก้ไข $tc_typeb เรียบร้อยแล้ว<br>";
                        echo '<a href="typecar_list.php">แสดงประเภทรถทั้งหมด</a>';
                    }else{
                        $ftc_id = $_REQUEST['tc_id'];
                        $sql =  "SELECT * FROM typecar where tc_id='$ftc_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $ftc_typeb = $row['tc_typeb'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="typecar_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="tc_id" id="tc_id" value="<?php echo "$ftc_id";?>">
                        <div class="form-group">
                            <label for="tc_typeb" class="col-md-2 col-lg-2 control-label">ชื่อประเภทรถ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="tc_typeb" id="tc_typeb" class="form-control" value="<?php echo "$ftc_typeb";?>">
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
