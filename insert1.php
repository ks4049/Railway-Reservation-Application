<?php
$server= 'localhost';
$username = 'root';
$password= '';
$con = mysql_connect("$server","$username","$password") or die("not connecting");
   if (!$con)
   {
    die('Could not connect: ' . mysql_error());
   }
mysql_select_db("railway", $con);

   for($i = 0; $i <count($_POST);$i++)
   {

   if(!empty($_POST['snno'][$i]))
{ 
$n=rand();
$query1 ='SELECT trainno from train where 
  $retval= mysql_query( $query1, $con);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    $p=$row['trainno'];

 mysql_query("INSERT INTO userdetail VALUES('".$_POST['snno'][$i]."','".$_POST['name'][$i]."','".$_POST['age'][$i]."','".$_POST['gender'][$i]."','".$_POST['berthper'][$i]."',$n,'".$_POST['adhaarno'][$i]."',$p);",$con);
}
  
$query2 ='SELECT distinct(trainno) from train,booking where booking.from=train.from';
  $retval2= mysql_query( $query2, $con);
if(! $retval2 )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval2, MYSQL_ASSOC))
{
    $p=$row['trainno'];
}
  mysql_query("update train set seat=seat-1 where trainno=$p",$con);        
               
}  
else
{
break;
}
}
echo "Booked successfully";
header('refresh:0;url=booking.html');
mysql_close($con)
?> 