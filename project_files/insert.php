<?php
include 'connect_inc.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$us_id = $_SESSION['us_id'];
//$query = "SELECT `us_un`";
  $uname = $_REQUEST['uname'];
 $msg = $_REQUEST['msg'];
 $query = "SELECT * FROM `users` WHERE `us_un` = '$uname' ";
$query_run = mysql_query($query);
 mysql_num_rows($query_run);
  $query_result = mysql_result($query_run, 0, 'us_id');
 $query2 = "INSERT INTO `chatbox`  VALUES ('','$us_id','$query_result','$msg')";
$query2_run = mysql_query($query2);
echo '<br>';
$query3= "SELECT * FROM `chatbox` WHERE (`chat_frm` ='$us_id' AND `chat_to` ='$query_result') OR (`chat_frm` ='$query_result' AND `chat_to` ='$us_id')  ORDER by `chat_id` DESC ";
$query3_run =mysql_query($query3);
if(mysql_num_rows($query3_run)==0)
    echo 'no chat history';
else
{
while($extract = mysql_fetch_assoc($query3_run)){
    //echo 'hello23';
    $u_frm = $extract['chat_frm'];
    $query1= "SELECT `us_un` FROM `users` WHERE `us_id` = '$u_frm'";
    $query1_run =  mysql_query($query1);
    $query1_result = mysql_result($query1_run,0,'us_un');
		echo "<span class='uname'>" . $query1_result . "</span>: <span class='msg'>" . $extract['chat_msg'] . "</span><br>";
	}
}



?>