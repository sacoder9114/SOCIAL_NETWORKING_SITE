<html>
    <head>
        
    </head>
    <body bgcolor = "green">        
        <?php
        require 'connect_inc.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$us_id = $_SESSION['us_id'];
if(isset($_GET['username'])&&isset($_GET['userid']))
{
   //
   //unset($_GET['addfriend']);
$username = $_GET['username'];
$userid = $_GET['userid'];
/*header('Location:profileinfo.php?username=<?php echo $username;?>&userid=<?php echo $userid;?>');*/
}
//echo 'nothing to display now';
?>
<?php
//include 'profileinfoeditfunction.php'
//$username = 

 $query = "SELECT * FROM `users` WHERE `us_un` REGEXP '$username' ";
$query_run =  mysql_query($query);
 $us_fn = mysql_result($query_run, 0, 'us_fn');
 $us_ln = mysql_result($query_run, 0, 'us_ln');
 $space = ' ';
 $us_name1 = $us_fn.$space.$us_ln;
 //$us_name = $us_name1;
 $us_un = $username;
 $us_cn = mysql_result($query_run, 0, 'us_cn');
 $us_ei = mysql_result($query_run, 0, 'us_ei');
 $us_s =  mysql_result($query_run, 0, 'us_s');
 $us_bd = mysql_result($query_run, 0, 'us_bd');
 $us_in = mysql_result($query_run, 0, 'us_in');
 $us_pl = mysql_result($query_run, 0, 'us_pl');
 //$u=2;
 $qwery2 = "SELECT `fr_st` FROM `friendrequests` WHERE `fr_frm`= '$us_id' AND `fr_to` = '$userid' ";
 $qwery2_run = mysql_query($qwery2);
 $num_rows = mysql_num_rows($qwery2_run);
  $qwery21 = "SELECT `fr_st` FROM `friendrequests` WHERE  `fr_frm` = '$userid' AND `fr_to` = '$us_id' ";
 $qwery2_run1 = mysql_query($qwery21);
 $num_rows1 = mysql_num_rows($qwery2_run1);
// echo $num_rows;
 //echo $num_rows1;
 if($num_rows==0&&$num_rows1==0)
 {
     $p=0;
 }
 else
 {
     if($num_rows!=0){
     $fr_st = mysql_result($qwery2_run, 0, 'fr_st');
     }
     else 
     {
       $fr_st = mysql_result($qwery2_run1, 0, 'fr_st');  
     }
     if($fr_st==1)
     {
         $p=1;
     }
     else
     {
         $p=2;
     }
 }
?>
<table align = "center" align  width = 1000 bgcolor = 'white'>
    <tr><td width = 300><?php include 'chechkandshowprofilepic.php'; chechkandshowprofilepic1($username); ?>
        <?php echo '<br>';
            if($p == 0)
            { ?>
            <form action = "insertfrndrqst.php" method = "GET">
                             <input type = "submit" name = "addfriend" value = "addfriend">
                <input type = "hidden" name = "username" value = <?php echo $username;?> >
                <input type = "hidden" name = "userid" value = <?php echo $userid;?> >
            </form>
            <?php }
            else if($p==1)
            {
                echo '  frnd rqst pending ';
            }
            else echo 'You are friends with him';
            ?>
        </td>
        <td width = 700>
            <table align = 'center' >
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2></td></tr>
                <tr><td colspan = 2>Name = <?php echo $us_name1 ; ?></td></tr>
                <tr><td colspan = 2>Contact Number = <?php echo $us_cn ; ?></td></tr>
                <tr><td colspan = 2>Email-id = <?php echo $us_ei ; ?></td></tr>
                <tr><td colspan =2>Sex = <?php echo $us_s; ?></td></tr>
                <tr><td colspan = 2>Birth-date = <?php echo $us_bd ; ?></td></tr> 
                <tr><td colspan = 2>Intersted In = <?php echo $us_in ; ?></td></tr>
                <tr><td align = 'right' ><a href = 'profiletable.php' > Home </a></td>
          <td colspan ='2' align ='right'><a href = 'logout.php'>Logout</a>
                </tr>
            </table>
        </td>
    </tr>
</table>
    </body>
</html>