<?php
$server= 'localhost';
$username = 'root';
$password= '';

//connect to db
$connect = mysql_connect("$server","$username","$password");
mysql_select_db("railway",$connect);
$p=$_POST['pnrno'];
$adhaar=$_POST['adhaarno'];
$trainno=$_POST['trainno'];
$query1 ="SELECT AadhaarID from userdetail where AadhaarID=$adhaar";
  $retval= mysql_query( $query1, $connect);
if(!mysql_query( $query1, $connect))
{
echo "you are not booked";
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    $q=$row['AadhaarID'];
header('refresh:0;url=booking.html');
$s=mysql_query("DELETE FROM userdetail WHERE AadhaarID=$adhaar", $connect);
  mysql_query("update train set seat=seat+1 where trainno=$trainno",$connect);   
    
print '<script type="text/javascript">'; 
print 'alert("CANCELLED SUCCESSFULLY")'; 
print '</script>';
}
?>