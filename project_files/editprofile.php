<html>
    <body  bgcolor = 'navyblue'>
<?php
require 'connect_inc.php';
include 'profileinfoeditfunction.php';
session_start();
$us_id = $_SESSION['us_id'];
$query = "SELECT * FROM `users` WHERE `us_id` = '$us_id' ";
$query_run =  mysql_query($query);
 $us_fn = mysql_result($query_run, 0, 'us_fn');
 $us_ln = mysql_result($query_run, 0, 'us_ln');
 $space = ' ';
 $us_name1 = $us_fn.$space.$us_ln;
 //$us_name = $us_name1;
 $us_un = mysql_result($query_run, 0, 'us_un');
 $us_cn = mysql_result($query_run, 0, 'us_cn');
 $us_ei = mysql_result($query_run, 0, 'us_ei');
 $us_s =  mysql_result($query_run, 0, 'us_s');
 $us_bd = mysql_result($query_run, 0, 'us_bd');
 $us_in = mysql_result($query_run, 0, 'us_in');
 $us_pl = mysql_result($query_run, 0, 'us_pl');
?>
<table align = "center" align  width = 1000 bgcolor = 'white'>
    <tr><td width = 300><?php include 'chechkandshowprofilepicwithoutsession.php'; chechkandshowprofilepic(); ?></td>
        <td width = 700>
            <table align = 'center' >
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2></td></tr>
                <tr><td>Name = <?php echo $us_name1 ; ?></td>
                    <td>
                        <?php 
                        if(!isset($_REQUEST['edit_nsb']))
                        {
                        ?>
                        <form action = 'editprofile.php' method ='POST'>
                            <input type = 'submit' value = 'Edit' name = 'edit_nsb'>
                        </form>
                        <?php
                        }?>
                        <?php 
                        if(isset($_REQUEST['edit_nsb']))
                        {
                            ?>
                        <form action = 'editprofile.php' method = 'GET'>
                            <input type = 'text' name = 'uss_name' >
                            <input type = 'submit' value = 'save' name ='edit_nsa'>
                        </form>
                        <?php
                        }
                        ?>
                               <?php
                              // echo 'hello birds';
                               if(isset($_REQUEST['uss_name'])&&isset($_REQUEST['edit_nsa']))
                               {
                                   if(!empty($_REQUEST['uss_name']))
                                   {
                                       $uss_name = $_REQUEST['uss_name'];
                                    //echo $us_name;
                                       // echo 'milo na';
                                   $len = strlen($uss_name);
                              $p =substr($uss_name,  strpos($uss_name, ' ')+1);
                                    $l = strlen($p);
                                    $final = $len - $l -1;
                           $s = substr($uss_name,0,$final);
                                profileinfoeditfunction('us_fn',$s);
                                 profileinfoeditfunction('us_ln',$p);
                                 header('Location: editprofile.php');
                                   }
                                   else 
                                   {
                                       echo 'must supply something';
                                   }
                               }
                        ?>
                                            </td>
                </tr>
                 <tr><td>Contact Number = <?php echo $us_cn ; ?></td>
                    <td>
                        <?php 
                        if(!isset($_REQUEST['edit_cnsb']))
                        {
                        ?>
                        <form action = 'editprofile.php' method ='POST'>
                            <input type = 'submit' value = 'Edit' name = 'edit_cnsb'>
                        </form>
                        <?php
                        }?>
                        <?php 
                        if(isset($_REQUEST['edit_cnsb']))
                        {
                            ?>
                        <form action = 'editprofile.php' method = 'GET'>
                            <input type = 'text' name = 'uss_cn' >
                            <input type = 'submit' value = 'save' name ='edit_cnsa'>
                        </form>
                        <?php
                        }
                        ?>
                               <?php
                              // echo 'hello birds';
                               if(isset($_REQUEST['uss_cn'])&&isset($_REQUEST['edit_cnsa']))
                               {
                                   if(!empty($_REQUEST['uss_cn']))
                                   {
                                       $uss_cn = $_REQUEST['uss_cn'];
                                profileinfoeditfunction('us_cn',$uss_cn);
                                 header('Location: editprofile.php');
                                   }
                                   else 
                                   {
                                       echo 'must supply something';
                                   }
                               }
                        ?>
                                            </td>
                </tr>
                <tr><td>Email-id = <?php echo $us_ei ; ?></td>
                    <td>
                        <?php 
                        if(!isset($_REQUEST['edit_eisb']))
                        {
                        ?>
                        <form action = 'editprofile.php' method ='POST'>
                            <input type = 'submit' value = 'Edit' name = 'edit_eisb'>
                        </form>
                        <?php
                        }?>
                        <?php 
                        if(isset($_REQUEST['edit_eisb']))
                        {
                            ?>
                        <form action = 'editprofile.php' method = 'GET'>
                            <input type = 'text' name = 'uss_ei' >
                            <input type = 'submit' value = 'save' name ='edit_eisa'>
                        </form>
                        <?php
                        }
                        ?>
                               <?php
                              // echo 'hello birds';
                               if(isset($_REQUEST['uss_ei'])&&isset($_REQUEST['edit_eisa']))
                               {
                                   if(!empty($_REQUEST['uss_ei']))
                                   {
                                       $uss_cn = $_REQUEST['uss_ei'];
                                profileinfoeditfunction('us_ei',$uss_cn);
                                 header('Location: editprofile.php');
                                   }
                                   else 
                                   {
                                       echo 'must supply something';
                                   }
                               }
                        ?>
                                            </td>
                </tr>
                <tr><td colspan =2>Sex = <?php echo $us_s; ?></td></tr>
                <tr><td>Birth-date = <?php echo $us_bd ; ?></td>
                    <td>
                        <?php 
                        if(!isset($_REQUEST['edit_bdsb']))
                        {
                        ?>
                        <form action = 'editprofile.php' method ='POST'>
                            <input type = 'submit' value = 'Edit' name = 'edit_bdsb'>
                        </form>
                        <?php
                        }?>
                        <?php 
                        if(isset($_REQUEST['edit_bdsb']))
                        {
                            ?>
                        <form action = 'editprofile.php' method = 'GET'>
                            <input type = 'date' name = 'uss_bd' >
                            <input type = 'submit' value = 'save' name ='edit_bdsa'>
                        </form>
                        <?php
                        }
                        ?>
                               <?php
                              // echo 'hello birds';
                               if(isset($_REQUEST['uss_bd'])&&isset($_REQUEST['edit_bdsa']))
                               {
                                   if(!empty($_REQUEST['uss_bd']))
                                   {
                                       $uss_bd = $_REQUEST['uss_bd'];
                                profileinfoeditfunction('us_bd',$uss_bd);
                                 header('Location: editprofile.php');
                                   }
                                   else 
                                   {
                                       echo 'must supply something';
                                   }
                               }
                        ?>
                                            </td>
                </tr>
                <tr><td>Intersted In = <?php echo $us_in ; ?></td>
                    <td>
                        <?php 
                        if(!isset($_REQUEST['edit_insb']))
                        {
                        ?>
                        <form action = 'editprofile.php' method ='POST'>
                            <input type = 'submit' value = 'Edit' name = 'edit_insb'>
                        </form>
                        <?php
                        }?>
                        <?php 
                        if(isset($_REQUEST['edit_insb']))
                        {
                            ?>
                        <form action = 'editprofile.php' method = 'GET'>
                            <input type = 'text' name = 'uss_in' >
                            <input type = 'submit' value = 'save' name ='edit_insa'>
                        </form>
                        <?php
                        }
                        ?>
                               <?php
                              // echo 'hello birds';
                               if(isset($_REQUEST['uss_in'])&&isset($_REQUEST['edit_insa']))
                               {
                                   if(!empty($_REQUEST['uss_in']))
                                   {
                                       $uss_cn = $_REQUEST['uss_in'];
                                profileinfoeditfunction('us_in',$uss_cn);
                                 header('Location: editprofile.php');
                                   }
                                   else 
                                   {
                                       echo 'must supply something';
                                   }
                               }
                        ?>
                                            </td>
                </tr>
                <tr><td align = 'right' ><a href = 'profiletable.php' > Home </a></td>
          <td colspan ='2' align ='right'><a href = 'logout.php'>Logout</a>
                </tr>
            </table>
        </td>
    </tr>
</table>
    </body>
</html>

