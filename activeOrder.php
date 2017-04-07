<!DOCTYPE html>
<?php
session_start();
    include_once './_function.php';

?>
<head>
    <meta charset="utf-8">
    <title>E-Restaurant</title>
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
        <div id="top-header">
            <?php include './top_header.php'; ?>
        </div>
        <div id="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="#"><img src="images/logo.png" title="Grill Template" alt="Grill Website Template" ></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="main-menu">
                            <?php include './menu.php'; ?>
                        </div>
                    </div>
                    <div class="col-md-3">

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
                            <i class="fa fa-cutlery"></i>
                        </div>
                        <h4 >Active Orders </h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="col-md-11 col-sm-11">
                        <div class="row">
                          <h4  class="titleStyle"> Active Orders </h4>
                            
                                                     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
  <tr>
    <td width="9%"><strong>Order ID</strong></td>
    <td width="11%"><strong>Amount</strong></td>

    <td width="25%">&nbsp;</td>
    <td width="17%"><strong>Order By</strong></td>
    <td width="11%"><strong>Status</strong></td>
        <td width="27%">&nbsp;</td>
    
  </tr>
                            
                            
                            <?php
                            $conn = getDBConnection();

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
							
							$waiterID = $_SESSION['user_id'];

                            $sql = "SELECT order_tbl.*,user.username FROM order_tbl INNER JOIN user 
ON order_tbl.createduser = user.id 
WHERE order_tbl.status = 'ACT' AND order_tbl.updateuser = '".$waiterID."' ";
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
    <td><a class="btn btn-success" href="orderPreview.php?orderID=<?php echo $row["id"]; ?>&status=CLS&btn=Close and Bill"><?php echo $row["status"]; ?></a></td>
      <td><?php echo $row["updatedate"];?></td>
  </tr>
                                    <?php
                                }
                            } else {
                                echo "0 results";
                            }

                            mysqli_close($conn);
                            ?>   

</table>

                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <footer>
<?php include './footer.php'; ?>
    </footer>

    <script src="js/vendor/jquery-1.11.0.min.js"></script>
    <script src="js/vendor/jquery.gmap3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>


</body>
</html>