<?php

session_start();

if(isset($_POST['login']) && isset($_POST['haslo'])){
    $login=$_POST['login'];
    $haslo = $_POST['haslo'];
// przekazujemy wpisany login i hasło

    include "connectDB.php";
     
     $sql="SELECT * FROM użytkownicy WHERE id=:login AND hasło = :haslo;";
     $stmt = $pdo->prepare($sql);
     $stmt->execute(array(
        ':login' => $login,
        ':haslo' => $haslo       
     ));
    // sprawdzamy, czy w bazie istnieje użytkownik o podanym loginie i haśle

    if($stmt->rowCount()>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            $_SESSION['id']=$row['id'];
            $_SESSION['imie'] = $row['imię'];
            $_SESSION['rola'] = $row['rola'];
            $_SESSION['uprawnienia'] = $row['uprawnienia'];
        }
        // jeżeli użytkownik istnieje, ustawiamy id sesji, które świadczy o tym, że
        // użytkownik jest zalogowany, ustawiamy również imię, rolę i uprawnienia, 
        // które wykorzystamy w kodzie aplikacji
        header("Location: index.php");
        
    } else{
        echo '<span style="color: red;">Logowanie nie powiodło się</span>';
        header("Location:logowanie.php?kod_bledu=1");
    }
     
}
?>