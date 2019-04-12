<?php
session_start();
$logged_in = isset($_SESSION['username']) && isset($_SESSION['iduser']);
$user = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$iduser = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : "";

$mysqli = new mysqli("localhost", "root", "", "test");
if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
}

if (isset($_POST["text"]) && $logged_in) {
	$insert_comment = "INSERT INTO comment (txt, userID) VALUES ('" . $_POST["text"] . "', '$iduser')";
	$mysqli->query($insert_comment);
}	

$get_comments = "SELECT u.username, c.txt FROM comment c JOIN user u ON c.userID = u.iduser ORDER BY c.idcomment DESC";
$result = $mysqli->query($get_comments);

?>
<html>
<body>
<h1> Guestbook </h1>



<?php if ($logged_in) { ?>
<form method="POST">
<textarea name="text"></textarea>
<button type="submit">Add entry</button>
</form>
<?php }
?>


<div class="entries">
<hr>
<?php 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$user_name = $row["username"];
		$text = $row["txt"];
		?>
		<h4><?php echo $user_name; ?>: </h4>
		<p><?php echo $text; ?></p>
		<hr>
		<?php
    }
} else {
    echo "0 entries.";
}
?>
<div style="">


</div>


</div>

<footer>
<p> 
<?php 
echo $logged_in ? "Logged in as: $user | <a href='logout.php'>Logout</a>" : "<a href='login.php'>Login/Registrieren</a>";

?>
</p>
</footer>
</body>

</html>