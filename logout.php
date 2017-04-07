<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_destroy();
//header('Location:index.php');
echo '<script type="text/javascript">';
echo 'window.location.href="index.php";';
echo '</script>';

?>

