<?php
session_start();
$server= 'localhost';
$username = 'root';
$password= '';
$user = $_POST['name'];
$pass =($_POST['password']);
$flag=0;
$_SESSION['ui']=$_POST['name'];
if ($user&&$pass) 
{

//connect to db
$connect = mysql_connect("$server","$username","$password") or die("not connecting");
mysql_select_db("railway");
$query ='SELECT * FROM  users';
$retval = mysql_query( $query, $connect);
$numrows = mysql_num_rows($retval);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
if($user==$row['userid']&&$pass==$row['passid'])
{
$flag=1;
}
} 
if ($flag==1)
{
print '<script type="text/javascript">'; 
print 'alert("YOU ARE SUCCESSFULLY LOGIN")'; 
print '</script>';
header('refresh:0;url=booking.html');
//while loop
  while ($row = mysql_fetch_assoc($query))
  {
    $dbusername= $row['userid'];
    $dbpassword= $row['passid'];
  }
}
else
{
print '<script type="text/javascript">'; 
print 'alert("YOU ARE NOT ALREADY REGISTERED PLEASE USE SIGN UP")'; 
print '</script>';
  header('refresh:0;url=irctc.html');
}
} 
else
    die("please enter a username and password!");
?>