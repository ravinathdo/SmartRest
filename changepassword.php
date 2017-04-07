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


                            <h4 class="titleStyle">Change Password</h4>
                            <form name="form1" method="post" action="changepassword.php">
                                <table width="50%" border="0">
                                    <tr>
                                        <td width="50%" align="right"><strong>Current password</strong></td>
                                        <td width="50%"><input type="password" name="cpword" id="cpword" required></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><strong>New password</strong></td>
                                        <td><input type="password" name="npword" id="npword" required></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><strong>Retype new password</strong></td>
                                        <td><input type="password" name="rnpword" id="rnpword" required></td>
                                    </tr>
                                    <tr>
                                        <td align="right">&nbsp;</td>
                                        <td><input type="submit" name="btnPword" id="button" value="Change Password"></td>
                                    </tr>
                                </table>
                            </form>


                            <?php
                            if (isset($_POST['btnPword'])) {

                                if (($_POST['npword'] == $_POST['rnpword']) && $_POST['npword'] >= 6) {
                                    //changing the password
                                    // Create connection
                                    $conn = getDBConnection();
// Check connection
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }


                                    $sql = "SELECT * FROM  user WHERE PASSWORD=PASSWORD('" . $_POST['cpword'] . "') AND id = '" . $_SESSION['user_id'] . "'";

                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {


                                        $sql = "UPDATE user SET PASSWORD=PASSWORD('" . $_POST['npword'] . "') WHERE PASSWORD=PASSWORD('" . $_POST['cpword'] . "') AND id = '" . $_SESSION['user_id'] . "'";

                                        if (mysqli_query($conn, $sql)) {
                                            echo ' <div class="msgCenter">
<span class="btn btn-success">Password Changed successfully</span>
</div> ';
                                        } else {
                                            echo "Error updating record: " . mysqli_error($conn);
                                        }
                                    } else {
                                        echo " <div class='msgCenter'> <span class='btn btn-danger'>Invalid Password</span> </div> ";
                                    }



                                    mysqli_close($conn);
                                } else {
                                    echo " <div class='msgCenter'> <span class='btn btn-danger'>Password should be at lease 6 characters</span> </div> ";
                                }
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