  <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="home-account">
                            <a href = "home.php">Home</a>
                            
                            <a href = "changepassword.php">Change Password</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-info">
                            <a href="logout.php">Welcome <?php echo $_SESSION['user_username']; ?>
                                 <?php
                            if ($_SESSION['user_role'] == 'CUS')
                                echo '[ Customer ]';
                            if ($_SESSION['user_role'] == 'ADM')
                                echo '[ Administrator ]';
                            ?>
                                <i class="fa fa-sign-out"></i>
                                logout</a>
                        </div>
                    </div>
                </div>
            </div>