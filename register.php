<!DOCTYPE html>
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
      <div id="main-header" >
          <div class="container">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="41%">&nbsp;</td>
    <td width="24%"><span class="logo"><a href="#"><img src="images/logo.png" title="Grill Template" alt="Grill Website Template" ></a></span></td>
    <td width="35%"><table width="50%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td>   <a href="register.php" class="btn btn-default">Register Free</a>
                            &nbsp;<a href="login.php" class="btn btn-default">Login</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

            
            
                <div class="row">
                    <div id="menuDiv">
                    <center>
                    <?php
                             if(isset($_SESSION['user_role'])){
								  if ($_SESSION['user_role'] == 'CUS')
                                include './menu-customer.php';
								 if ($_SESSION['user_role'] == 'ADM')
                                include './menu-admin.php';
								 }else{
									 	 include './menu-visitor.php';
									 }
                            ?>
                      </center>
                    </div>
                    
                    
                 
                    
                    
                    
                    
                </div>
                
                
                
                
                
                
        </div>
      </div>
    </header>

    <div id="slider">


    </div>


    <div id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="titleStyle">Customer Registration</h4>
                    <form name="form1" method="post" action="">
                        <span class="mandoField">*</span> fields are required
                        <table width="50%" border="0" align="center" cellpadding="2" cellspacing="2">
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
                                <td align="right"><strong>Password</strong></td>
                                <td><span class="mandoField">*</span></td>
                                <td><input type="password" name="password" id="password"  class="form-control" required></td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Retype Password</strong></td>
                                <td>&nbsp;</td>
                                <td><input type="password" name="repassword" id="repassword"  class="form-control"></td>
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
                                <td><input type="submit" name="btnReg" value="Register" class="btn btn-primary"/>&nbsp;
                                    <input type="reset"  class="btn btn-default"/></td>
                            </tr>
                        </table>
                    </form>



                    <?php
                    if (isset($_POST['btnReg'])) {
                        include './_function.php';

                        //validation 
                        if ($_POST['password'] != $_POST['repassword']) {
                          ?>
                                <div class="msgCenter">
                                    <span class="btn btn-danger">Password mismatch,please retry</span>
                                </div><br>
                                <?php
                        } else {
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
        PASSWORD('" . $_POST['password'] . "'),
        '" . $_POST['email'] . "',
        '" . $_POST['telephone'] . "',
        'CUS'); ";

                            // echo $sql;
                            if (mysqli_query($conn, $sql)) {
                                ?>
                                <div class="msgCenter">
                                    <span class="btn btn-success">Registration successfully, please <a href="login.php">login</a> </span>
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
                    }
                    ?>  


                </div>
            </div>
            <div class="row"></div>
        </div>
    </div>





    <div id="latest-blog">
        <div class="container">
            <div class="row"></div>
            <div class="row"></div>
        </div>
    </div>


    <div id="testimonails"></div>

    <footer>

    </footer>


    <script src="js/vendor/jquery-1.11.0.min.js"></script>
    <script src="js/vendor/jquery.gmap3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


    <style type="text/css">
        table td{

        }
    </style>

</body>
</html>