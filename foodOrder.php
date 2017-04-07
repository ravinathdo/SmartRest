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

    <style type="text/css">
        .movieWap{
            width: 200px;
            /*height: 250;*/
            float: left;
            margin: 10px;
        }
    </style>

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
                            <?php include './menu-customer.php'; ?>
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
                            <i class="fa fa-cutlery"></i>
                        </div>
                        <h4>Food Ordering</h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.
                        
                        </p>
                        <p><form action="custOrderHistory.php">
                        <input type="submit" value="My Order History" class="btn btn-warning"/>
                        </form>
                        </p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="col-md-12 col-sm-6">
                        <div class="row">




                            <a href="cartEmplty.php">Empty Order </a>
                            <hr>
                            <?php
                            if (!isset($_SESSION['cart_items'])) {
                                echo 'No Order item found';
                            } else {
                                ?>
                                <div class="table-responsive">
                                <table width="50%" border="1" cellspacing="0" cellpadding="0" class="table table-condensed">
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td><strong>Qty</strong></td>
                                        <td><strong>Price</strong></td>
                                        <td><strong>Total</strong></td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <?php
                                    $itemArray = $_SESSION['cart_items'];
                                    $itemArraylength = count($itemArray);

                                    for ($x = 0; $x < $itemArraylength; $x++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $itemArray[$x]["name"]; ?></td>
                                            <td><?php echo $itemArray[$x]["qty"]; ?></td>
                                            <td><?php echo $itemArray[$x]["price"]; ?></td>
                                            <td><?php echo $itemArray[$x]["price"] * $itemArray[$x]["qty"]; ?></td>
                                            <td><a href="cartItemRemove.php?id=<?php echo $x; ?>">remove</a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>Subtotal</td>
                                        <td><?php
                                            echo $_SESSION['total_price'];
                                            ?></td>
                                    </tr>

                                </table>
                                </div>
                            <form action="foodOrderPlace.php" method="post" >
                                    <input type="submit" value="Order" class="btn btn-warning"/>
                                </form>

                                <?php
                            }
                            ?>
                            <hr>

                            <table width="100%">
                                <tr>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>


                                        <?php
                                        include './_function.php';


                                        $foodItemList = getfoodItemList();

                                        if (mysqli_num_rows($foodItemList) > 0) {
                                            // output data of each row
                                            $index = 0;
                                            while ($row = mysqli_fetch_assoc($foodItemList)) {
//                                    echo "id: " . $row["id"] . " - Name: " . $row["itemname"];
                                                ?>
                                                <div class="movieWap">
                                                    <h5 style="color: orange;font-weight: bold"><?php echo $row['itemname']; ?></h5>
                                                    <form action="cartAdd.php?id=<?php echo $index; ?>" method="post">
                                                        <img src="food_item/<?php echo $row['imagepath']; ?>" width="200px" height="200px" />
                                                        <input type="hidden" name="itemid" value="<?php echo $row['id']; ?>" /><br>
                                                        <input type="text" name="qty" class="form-control" placeholder="Quantity" /><br>
                                                        <input type="text" name="price" value="<?php echo $row['price']; ?>" class="form-control" readonly /><br>
                                                        <input type="hidden" name="itemName" value="<?php echo $row['itemname']; ?>" /><br>
                                                        <input type="submit" value="Add" class="btn btn-warning"/>
                                                    </form>
                                                </div>

                                                <?php
                                                $index++;
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>








                                    </td>

                                </tr>
                            </table>



                            <?php

                            function getfoodItemList() {
                                $conn = getDBConnection();
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                                $sql = "SELECT * FROM item";
                                $result = mysqli_query($conn, $sql);

                                mysqli_close($conn);
                                return $result;
                            }
                            ?>


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

</body>
</html>