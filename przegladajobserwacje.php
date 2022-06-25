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

	if ($conn->connect_error) {
	    die("Połączenie nie udało się: " . $conn->connect_error);
	} 

	if(!isset($_SESSION['id'])){
		header('Location: logowanie.php');
	}
	$sql = "USE projekt";
	$conn->query($sql);
	$uprawnienia = $_SESSION['uprawnienia'];
	$sql = "SELECT * FROM obserwacje WHERE uprawnienia <= '{$uprawnienia}'";
	// w zapytaniu powyżej pobierane są rekordy z tabeli obserwacje z uwzględnieniem uprawnień,
	// jakie posiada użytkowniks
	$wynik = $conn->query($sql);
?>	

<?php
if(isset($_SESSION['id'])){ 
// jeżeli użytkownik jest zalogowany, wyświetli się zawartość podstrony
?> 
<header>
	<blockquote>
		<a href="index.php"><img src="image/logo.png"></a>
		<form class="hf" action="wyloguj.php"><input class="hi" type="submit" name="submitButton" value="Wyloguj"></form>
		<form class="hf" action="przegladajobserwacje.php"><input class="hi" type="submit" name="submitButton" value="Przeglądaj dane"></form>
	</blockquote>
</header>

<blockquote>
	<div class="container" style="width: 70%">
	<center><h3>Przeglądaj obserwacje</h3></center>
	<table>
		<tr>
			<th><b>Kiedy</b></th>
			<th><b>Gdzie</b></th>
			<th><b>Opis zjawiska</b></th>
			<th><b>Akcja</b></th>
		</tr>
		<?php
			while($wiersz = $wynik->fetch_assoc()){
				echo '<tr>';
				echo '<td>'.$wiersz['data_czas'].'</td><td>'.$wiersz['miejsce'].'</td><td>'.$wiersz['opis'].'</td><td><input class="button" type="button" name="edytuj" value="Edytuj" onClick="window.location=\'index.php\';" /></td>';
				echo '</tr>';
			}
			// w powyższej pętli pobierane są rekordy i umieszczane w tabeli, jedno przejście
			// przez pętlę to jeden rekord
		?>
	</table>
	</div>
<blockquote>
<?php
}
?>
</body>
</html>