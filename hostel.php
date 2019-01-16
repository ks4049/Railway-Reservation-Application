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
$name = $_POST['userid'];
$proof_id= $_POST['passid'];
$cpass_id=$POST['cpassid'];
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$d=$_POST['day'];
$m=$_POST['month'];
$y=$_POST['year'];
$add=$_POST['address'];
$z=$_POST['zip'];
$n=$_POST['nationality'];
$p=$_POST['phoneno'];
$e=$_POST['email'];
$flag1=$flag2=$flag3=$flag4=$flag5=$flag6=$flag7=$flag8=$flag9=$flag10=$flag11=$flag12=$flag=$flag13=0;
//builds a sql query statement
if((strlen($name))< 6||(strlen($name))>9)
{
echo '<script type="text/javascript">alert("User length must be between 6 to 9");</script>';
header('refresh:0 ;url=register.html');
$flag11=1;
exit(0);
}
if((strlen($proof_id))<7 || (strlen($proof_id)>=9))
{
echo '<script type="text/javascript">alert("Password must be between 6 to 9");</script>';
header('refresh:0;url=register.html');
$flag1=1;
exit(0);

}
if(!ctype_alpha($fname))
{
echo '<script type="text/javascript">alert("Fnamemust be between 6 to 9");</script>';
header('refresh:0;url=register.html');
$flag2=1;
exit(0);
}
if(!ctype_alpha($lname))
{
echo '<script type="text/javascript">alert("last name must be between 6 to 9");</script>';
header('refresh:0;url=register.html');
$flag3=1;
exit(0);
} 

 
if((!ctype_alpha($add))||(!ctype_alnum($add)))
{
echo '<script type="text/javascript">alert("Address should be filled properly");</script>';
header('refresh:0;url=register.html');
$flag8=1;
exit(0);
}
 if(!is_numeric($z))
{
echo '<script type="text/javascript">alert("pincode must be numeric");</script>';
header('refresh:0;url=register.html');
$flag9=1;
exit(0);
}
if(!ctype_alpha($n))
{
echo '<script type="text/javascript">alert("Nationality must be character");</script>';
header('refresh:0;url=register.html');
$flag10=1;
exit(0);
} 


 


if($flag==0&&$flag1==0&&$flag2==0&&$flag3==0&&$flag4==0&&$flag5==0&&$flag6==0&&$flag7==0&&$flag11==0&&$flag8==0&&$flag9==0&&$flag10==0&&$flag11==0&&$flag12==0&&flag13==0)
 $sql = "INSERT INTO users VALUES('$name','$proof_id','$fname','$lname','$d','$m','$y','$occ','$add','$z','$n','$p')";

 mysql_select_db('railway');

//queries to the database
$retval = mysql_query( $sql, $conn );

//checks whether successfull insertion
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "entered data suceesfully for further details go back and click clickhere";
mysql_close($conn);
?>
