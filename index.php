<html>
<meta http-equiv="Content-Type"'.' content="text/html; charset=utf8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<body>
<?php
	session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = new mysqli($servername, $username, $password);
// połączenie z bazą danych

	if ($conn->connect_error) {
	    die("Połączenie nie powiodło się: " . $conn->connect_error);
	} 
	// sprawdzenie, czy połączenie się udało

	if(!isset($_SESSION['id'])){
		header('Location: logowanie.php');
	}
?>	

<?php
if(isset($_SESSION['id'])){ 
?> 

<header>
	<blockquote>
		<a href="index.php"><img src="image/logo.png"></a>
		<form class="hf" action="wyloguj.php"><input class="hi" type="submit" name="submitButton" value="Wyloguj"></form>
		<form class="hf" action="przegladajobserwacje.php"><input class="hi" type="submit" name="submitButton" value="Przeglądaj obserwacje"></form>
		<form class="hf" action="dodajobserwacje.php"><input class="hi" type="submit" name="submitButton" value="Dodaj obserwację"></form>
	</blockquote>
</header>

<blockquote>
	<div class="container">
	<center><h3>Witaj <?php echo $_SESSION['imie'] ?>!</h3>
	<p>Udało Ci się zalogować do systemu.</p> 
	<p>Możesz korzystać z wszystkich opcji dozwolonych dla Twojej roli i uprawnień.</p>
	</center>
	</div>
<blockquote>

<?php
}
?>
</body>
</html>