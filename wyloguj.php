<?php
session_start();
session_destroy();
header("Location:index.php");
// wylogowanie następuje poprzez usunięcie sesji
?>