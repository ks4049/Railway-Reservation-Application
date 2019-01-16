<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'railway';

//opens a connection to mysql database
$conn = mysql_connect($dbhost, $dbuser, $dbpass,$dbname);

//checks whether a valid connection
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


//POST attributes are assigened to local variables
$from = $_POST['fromst'];
$to= $_POST['tost'];
$d=$_POST['day'];
$m=$_POST['month'];
$y=$_POST['year'];
$type=$_POST['tictyp'];
$flag=0;

mysql_select_db('railway');
$query ='SELECT * FROM  train';
$retval1 = mysql_query( $query, $conn);
$numrows = mysql_num_rows($retval1);
if(! $retval1)
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval1, MYSQL_ASSOC))
{
if(($from==$row['from'])&&($to==$row['to']))
{
  if($row['seat']!=0)
  {
    $flag=1;
  }
   else
{
print '<script type="text/javascript">'; 
print 'alert("No seats available")'; 
print '</script>';
  header('refresh:0;url=booking.html');
exit;
}
}
}
if ($flag==1)
{

print '<script type="text/javascript">'; 
print 'alert("you can book a ticket seats are available")'; 
print '</script>';
header('refresh:0;url=user.html');
$sql = "INSERT INTO booking VALUES('$from','$to','$d','$m','$y','$type')";
 mysql_select_db('railway');

//queries to the database
$retval = mysql_query( $sql, $conn );

//checks whether successfull insertion
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
} 
}
else
{
print '<script type="text/javascript">'; 
print 'alert("Please fill with  an validate from  and to station")'; 
print '</script>';
  header('refresh:0;url=booking.html');
}   
mysql_close($conn);
?>
