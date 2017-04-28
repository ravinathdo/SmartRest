<!DOCTYPE html>
<?php
session_start();
include_once './_function.php';
?>
<head>
    <meta charset="utf-8">
    <title>Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/templatemo_style.css">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/testimonails-slider.css">
    <link href="css/erest-style.css" rel="stylesheet" type="text/css"/>
    <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
</head>
<body>

   <header>
      <div id="main-header" >
          <div class="container">
           <?php include './top_header.php'; ?>

            
            
                <div class="row">
                    <div id="menuDiv">
                    <center>
                   <?php
                            include './menu.php';
                            ?>
                      </center>
                    </div>
                  
                </div>

        </div>
      </div>
    </header>

    <div id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <h4>Order Explorer </h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="col-md-11 col-sm-11">
                        <div class="row">
                            <h4 class="titleStyle">Close Order History</h4>
                            <form action="" method="post">
                                <table width="50%" border="0" cellspacing="0" cellpadding="0" >
                                    <tr>
                                        <td>From Date</td>
                                        <td><input type="date" name="fromdate" id="fromdate" placeholder="YYYY-MM-DD"></td>
                                    </tr>
                                    <tr>
                                        <td>To Date</td>
                                        <td><input type="date" name="todate" id="todate" placeholder="YYYY-MM-DD"></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><input type="submit" value="Search" name="btnSearch" class="btn btn-warning"/> &nbsp;</td>
                                    </tr>
                                </table>
                            </form>


                            <?php
                            if (isset($_POST['btnSearch'])) {
                                ?>

                                <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-bordered">
                                    <tr>
                                        <td width="9%"><strong>Order_no</strong></td>
                                        <td width="11%"><strong>Amount</strong></td>

                                        <td width="25%">&nbsp;</td>
                                        <td width="17%"><strong>Order By</strong></td>
                                        <td width="15%"><strong>Status</strong></td>
                                        <td width="23%">&nbsp;</td>

                                    </tr>


                                    <?php
                                    $conn = getDBConnection();

                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }



                                    $sql = "SELECT order_tbl.*,user.username FROM order_tbl INNER JOIN user 
ON order_tbl.createduser = user.id 
WHERE order_tbl.status = 'CLS'  AND DATE(order_tbl.updatedate) >= '" . $_POST['fromdate'] . "' 
AND DATE(order_tbl.updatedate) <= '" . $_POST['todate'] . "'   ";

//echo $sql;
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>



                                            <tr>
                                                <td><a href="orderPreview.php?orderID=<?php echo $row["id"]; ?>&status=NO"><?php echo $row["id"]; ?></a></td>
                                                <td><?php echo $row["totalamount"]; ?></td>
                                                <td><?php echo $row["createddate"]; ?></td>
                                                <td><?php echo $row["username"]; ?></td>
                                                <td><?php echo $row["status"]; ?></td>
                                                <td><?php echo $row["updatedate"]; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                    mysqli_close($conn);
                                    ?>   

                                </table>

                                <?php
                            } else {
                                ?> 
                                <h4>Todays Activity</h4>
                                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="9%"><strong>Order_no</strong></td>
                                        <td width="11%"><strong>Amount</strong></td>

                                        <td width="25%">&nbsp;</td>
                                        <td width="17%"><strong>Order By</strong></td>
                                        <td width="16%"><strong>Status</strong></td>
                                        <td width="22%">&nbsp;</td>

                                    </tr>


                                    <?php
                                    $conn = getDBConnection();

                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }



                                    $sql = "SELECT order_tbl.*,user.username FROM order_tbl INNER JOIN user 
ON order_tbl.createduser = user.id 
WHERE order_tbl.status = 'CLS' AND DATE(order_tbl.updatedate) = DATE(now()) ";

//echo $sql;
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>



                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["totalamount"]; ?></td>
                                                <td><?php echo $row["createddate"]; ?></td>
                                                <td><?php echo $row["username"]; ?></td>
                                                <td><?php echo $row["status"]; ?></td>
                                                <td><?php echo $row["updatedate"]; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                    mysqli_close($conn);
                                    ?>   

                                </table>

                                <?php
                            }
                            ?>










                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <footer>
        
    </footer>

    <script src="js/vendor/jquery-1.11.0.min.js"></script>
    <script src="js/vendor/jquery.gmap3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>


</body>
</html>