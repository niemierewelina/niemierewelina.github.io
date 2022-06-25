<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$nr_tel = $_POST['nr_tel'];
	$email = $_POST['email'];
	$wiadomosc = $_POST['wiadomosc'];
	$opis = $_POST['opis'];
	$rola = $_POST['rola'];
	$uprawnienia = $_POST['uprawnienia'];
	// powyżej pobierane są dane z formularza

	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = new mysqli($servername, $username, $password); 

	if ($conn->connect_error) {
		die("Nieudane połączenie: " . $conn->connect_error);
	} 

	$sql = "USE projekt";
	$conn->query($sql);

	$sql = "INSERT INTO wnioski_o_rejestrację(imię, nazwisko, nr_telefonu, adres_email, wiadomość, opis, rola, uprawnienia) 
			VALUES('".$imie."', '".$nazwisko."', '".$nr_tel."', '".$email."', '".$wiadomosc."', '".$opis."', '".$rola."', '".$uprawnienia."')
			";
	// powyższa SQL dodaje nowego użytkownika do tabeli wnioski_o_rejestrację

	$conn->query($sql);

	header("Location: zarejestrowano.php");
	// po wykonaniu SQL zostajemy przeniesieni na podstrone "Zarejestrowano"
}				
											
?>

<html>
	<link rel="stylesheet" href="style.css">
	<body>
			<header>
			<blockquote>
				<a href="index.php"><img src="image/logo.png"></a>
			</blockquote>
		</header>
		<blockquote>
			<div class="container">
				<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h1>Rejestracja</h1>
					Imię: <br><input type="text" name="imie" placeholder="Imię"><br><br>
					Nazwisko: <br><input type="text" name="nazwisko" placeholder="Nazwisko"><br><br>
					Nr telefonu: <br><input type="text" name="nr_tel" placeholder="123456789"><br><br>
					E-mail: <br><input type="text" name="email" placeholder="przyklad@email.com"><br><br>
					<label>Wiadomość do Administratora:</label><br>
					<textarea name="wiadomosc" cols="70" rows="5" placeholder="Wiadomość do Administratora"></textarea><br><br>
					<label>Opis:</label><br>
					<textarea name="opis" cols="70" rows="5" placeholder="Tytuły naukowe, nazwa reprezentowanej instytucji, specjalność, itp."></textarea><br><br>
					<label>Rola:</label><br>
					<input type="radio" name="rola" value="0">Administrator Systemu<br>
					<input type="radio" name="rola" value="1">Administrator Danych<br>
					<input type="radio" name="rola" value="2">Analityk<br>
					<input type="radio" name="rola" value="3">Czytelnik<br><br>
					<label>Uprawnienia:</label><br>
					<input type="radio" name="uprawnienia" value="0">Dane jawne<br>
					<input type="radio" name="uprawnienia" value="1">Dane poufne<br>
					<input type="radio" name="uprawnienia" value="2">Dane tajne<br>
					<input type="radio" name="uprawnienia" value="3">Dane ściśle tajne<br><br>
					<input class="button" type="submit" name="wyslij" value="Wyślij">
					<input class="button" type="button" name="wyjdz" value="Wyjdź" onClick="window.location='index.php';" />
				</form>
			</div>
		</blockquote>
	</body>
</html>