f<?
$username = $_GET['user'];
$password = $_GET['pass'];

//connect to database
if ($username && $password){
	mysql_pconnect("localhost","root","") or die ("didn't connect to mysql");
	mysql_select_db("user_db") or die ("no database");
//make query
$query = "SELECT * FROM user_table WHERE user = '$username'";
$result = mysql_query( $query ) or die ("didn't query");
echo $username;
//see if there's an EXACT match
$num = mysql_num_rows( $result );
if ($num == 1){
	$response = "duplicate";
	} else {
	$query1 = "INSERT INTO user_table (user ,pass) VALUES ('$username','$password'); ";
	$result1=mysql_query($query1)  or die("Query failed:3 ".mysql_error());
	$response = "ok";
}



}

echo "&returnVal=$response";
?>
