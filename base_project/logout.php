<?php 
// Lopettaa nykyisen session ja lähettää käyttäjän takaisin etusivulle
session_start();
session_destroy();
header('Location: index.html');
exit;
?>
