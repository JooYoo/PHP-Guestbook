
<?php 
session_start();
$login_success=-1;
$mo = new mysqli("localhost", "root", "", "test");
$id="";
$pw="";

if(isset($_SESSION["username"]) && isset($_SESSION["iduser"])){
	$login_success=0;
	$id = " AND iduser=". $_SESSION["iduser"];
}
if(isset($_REQUEST["username"])){
	$_SESSION["username"] = $_REQUEST["username"];
	$pw = " AND pw='". $_REQUEST["password"]."'";	
}
	$queryresult=$mo->query("SELECT * FROM user WHERE username='".$_SESSION["username"]."'".$id.$pw);
	if($queryresult->num_rows > 0){
		$user = $queryresult->fetch_assoc();
		$_SESSION["iduser"] = $user["iduser"];
		$login_success=0;
	}
	
	if($login_success==0){
	 header("Location: index.php");
	}
?>