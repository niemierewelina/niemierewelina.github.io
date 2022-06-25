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
<center><h1>Logowanie</h1></center>
<form action="sprawdzlogowanie.php" method="post">
    Nazwa użytkownika: <br><input type="text" name="login"/>
    <br><br>
    Hasło: <br><input type="password" name="haslo" />
    <br><br>
    <input class="button" type="submit" value="Zaloguj"/>
    <input class="button" type="button" name="rejestracja" value="Nie masz konta? Zarejestruj!" onClick="window.location='rejestracja.php';" />
</form>
</div>
<blockquote>
<?php
if (isset($_GET['kod_bledu'])){
    if ($_GET['kod_bledu']==1){
        echo '<span style="color: red;">Nieprawidłowa nazwa użytkownika lub hasło.</span>';
    } elseif($_GET['kod_bledu']==2){
        echo '<span style="color: red;">Zaloguj się.</span>';
    }
}

?>
</body>
</html>