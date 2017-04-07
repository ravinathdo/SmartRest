 <?php
                            if ($_SESSION['user_role'] == 'CUS')
                                include './menu-customer.php';
                            if ($_SESSION['user_role'] == 'ADM')
                                include './menu-admin.php';
                            if ($_SESSION['user_role'] == 'WTR')
                                include './menu-waiter.php';
                            ?>
