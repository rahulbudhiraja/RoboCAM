<?
$username = $_GET['user'];
$password = $_GET['pass'];
$id = 0;
//connect to database
if ($username && $password){
	mysql_pconnect("localhost","root","") or die ("didn't connect to mysql");
	mysql_select_db("user_db") or die ("no database");
//make query
$query = "SELECT * FROM user_table WHERE user = '$username' AND pass = '$password'";
$result = mysql_query( $query ) or die ("didn't query");

//see if there's an EXACT match
$num = mysql_num_rows( $result );
while($sql_row=mysql_fetch_array($result)) {
		$id=$sql_row["userno"];
	}	
	echo "adfa".$id;
if ($num == 1){
	$response = $id;
	} else {
	$response = "wrong";
}
}

echo "&returnVal=$response";
?>
