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
                            <i class="fa fa-users"></i>
                        </div>
                        <h4>User Manager </h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="col-md-11 col-sm-6">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="titleStyle">Waiter Registration</h4>
                                <form name="form1" method="post" action="">
                                    <span class="mandoField">*</span> fields are required | <strong><em>password will be same as the username, please change the password after user first login</em></strong>
<table width="50%" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                                            <td width="34%" align="right"><strong>First Name</strong></td>
                                            <td width="2%"><span class="mandoField">*</span></td>
                                            <td width="64%"><input type="text" name="firstname" id="firstname"  class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><strong>Last Name</strong></td>
                                            <td>&nbsp;</td>
                                            <td><input type="text" name="lastname" id="lastname"  class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><strong>Username</strong></td>
                                            <td><span class="mandoField">*</span></td>
                                            <td><input type="text" name="username" id="username"  class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><strong>Telephone</strong></td>
                                            <td>&nbsp;</td>
                                            <td><input type="text" name="telephone" id="telephone"  class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><strong>Email</strong></td>
                                            <td><span class="mandoField">*</span></td>
                                            <td><input type="text" name="email" id="email"  class="form-control" required></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td><input type="submit" name="btnReg" value="Register" class="btn btn-warning"/>&nbsp;
                                                <input type="reset"  class="btn btn-default"/></td>
                                        </tr>
                                    </table>
                                </form>



                                <?php
                                if (isset($_POST['btnReg'])) {
                                    include './_function.php';

                                    //validation 
                                      
                                        $conn = getDBConnection();
                                        // Check connection
                                        if (!$conn) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }

                                        $sql = " INSERT INTO user
            (`firstname`,
             `lastname`,
             `username`,
             `password`,
             `email`,
             `telephone`,
             `role`)
VALUES ('" . $_POST['firstname'] . "',
        '" . $_POST['lastname'] . "',
        '" . $_POST['username'] . "',
        PASSWORD('" . $_POST['username'] . "'),
        '" . $_POST['email'] . "',
        '" . $_POST['telephone'] . "',
        'WTR'); ";

                                        // echo $sql;
                                        if (mysqli_query($conn, $sql)) {
                                            ?>
                                            <div class="msgCenter">
                                                <span class="btn btn-success">Waiter Registration successfully </span>
                                            </div><br>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="msgCenter">
                                                <span class="btn btn-danger">Duplicate or invalid entry found, please try again</span>
                                            </div><br>
                                            <?php
                                            echo "";
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

        <div class="row">
            <div class="col-md-12">





                <?php
                include_once './_function.php';
                $conn = getDBConnection();

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = " SELECT * FROM user ";
                $result = mysqli_query($conn, $sql);
				?>
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
  <tr>
    <td><strong>First Name</strong></td>
    <td><strong>Last Name</strong></td>
    <td><strong>Username</strong></td>
    <td><strong>Email</strong></td>
    <td><strong>Telephone</strong></td>
    <td><strong>Date Created</strong></td>
    <td><strong>Status</strong></td>
  
  </tr>
				
				
				<?php

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                       // echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                        ?>
                      
  <tr class="active">
    <td><?php echo $row["firstname"] ?></td>
    <td><?php echo $row["lastname"] ?></td>
    <td><?php echo $row["username"] ?></td>
    <td><?php echo $row["email"] ?></td>
    <td><?php echo $row["telephone"] ?></td>
    <td><?php echo $row["datecreated"] ?></td>
    <td><?php echo $row["status"] ?></td>
    
  </tr>


                        <?php
                    }
					
					
					
					
                } else {
                    echo "0 results";
                }
				
				?>
                
                </table>
                
                <?php

                mysqli_close($conn);
                ?>




              
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