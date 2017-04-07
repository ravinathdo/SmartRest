<!DOCTYPE html>
<?php
session_start();
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

    <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    
    
    <script type="text/javascript">
   
	
	function printMe(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
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
                    <div class="col-md-6">
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
                <div class="col-md-12">
                    <h4>&nbsp;</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <h4>Table Reservation </h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="col-md-11 col-sm-6">
                        <div class="row">
                            Order Preview 

                            <?php
                            if (isset($_POST['btnStatus'])) {

                                $orderID = $_POST['orderID'];
								$status = $_POST['status'];

                                include './_function.php';
                                $conn = getDBConnection();
								
								
								//Order State change
								$upuser = $_SESSION['user_id'];
								
								$usql = " UPDATE order_tbl SET STATUS = '".$status."', updateuser = '".$upuser."',updatedate = NOW() WHERE id = '".$orderID."' ";
							if (mysqli_query($conn, $usql)) {
    echo "Status Changed successfully";
	
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
								


                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = " SELECT order_tbl.*,user.username FROM order_tbl INNER JOIN user
ON order_tbl.createduser = user.id  WHERE order_tbl.id = $orderID ";

                                $result = mysqli_query($conn, $sql);
								
								

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row["id"];
                                        ?>


<div id="printDiv">
<a href="#" onClick="printMe('printDiv')">Print</a>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td><?php echo $row["id"]; ?></td>
                                                <td><?php echo $row["totalamount"]; ?></td>
                                                <td><?php echo $row["username"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><?php echo $row["createddate"]; ?></td>
                                                <td><?php echo $row["status"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="32%">Item</td>
                                                            <td width="22%">Qty</td>
                                                            <td width="18%">Price</td>
                                                            <td width="28%">&nbsp;</td>
                                                        </tr>

                                                        <?php
                                                        $sql_2 = " SELECT item.itemname,orderitem.qty,item.price FROM orderitem 
INNER JOIN item ON orderitem.itemid = item.id
WHERE orderitem.orderid = $id ";

                                                        //echo $sql_2;
                                                        $result_2 = mysqli_query($conn, $sql_2);
                                                        while ($row2 = mysqli_fetch_assoc($result_2)) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row2["itemname"]; ?></td>
                                                                <td><?php echo $row2["qty"]; ?><?php echo $row2["price"]; ?></td>
                                                                <td>&nbsp;</td>
                                                                <td><?php echo $row2["qty"]*$row2["price"] ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </table></td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                </td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
</div>

                                        <?php
                                    }
                                } else {
                                    echo "0 results";
                                }

                                mysqli_close($conn);
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

</body>
</html>