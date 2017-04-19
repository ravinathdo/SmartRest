
            
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="41%"><a href = "home.php">Home</a> | 
                            
                            <a href = "changepassword.php">Change Password</a></td>
    <td width="24%"><span class="logo"><a href="#"><img src="images/logo.png" title="Grill Template" alt="Grill Website Template" ></a></span></td>
    <td width="35%"><table width="50%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td>   <a href="logout.php">Welcome <?php echo $_SESSION['user_username']; ?>
                                 <?php
                            if ($_SESSION['user_role'] == 'CUS')
                                echo '[ Customer ]';
                            if ($_SESSION['user_role'] == 'ADM')
                                echo '[ Administrator ]';
                            ?>
                               <br> <i class="fa fa-sign-out"></i>
                                logout</a> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>