<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'railway';
$conn = mysql_connect($dbhost, $dbuser, $dbpass,$dbname);
$adharno=$_POST['adhaarno'];
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$adhaarno=$_POST['adhaarno'];
$flag=0;
mysql_select_db('railway');
$sql ='SELECT  * FROM userdetail';
$retval = mysql_query( $sql, $conn);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
if($adhaarno==$row['AadhaarID'])
{
    echo   "SNO: {$row['sno']} <br> ".
               "NAME:{$row['name']}  <br> ".
               "GENDER: {$row['gender']} <br> ".
               "BERTH:{$row['berth']}  <br> ".
               "PNR NO: {$row['pnr']} <br> ".
               "ADHAAR_NO:{$row['AadhaarID']}  <br> ".
"TRAIN NO:{$row['trainno']}  <br> ".
               "--------------------------------<br>";
$flag=1;
} 
}
//queries to the database;
if($flag==0)
{
echo "you are not booked";
}
mysql_close($conn);
?>
