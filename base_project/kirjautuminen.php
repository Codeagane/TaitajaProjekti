<?php
session_start();
require_once "pdo.php";

// Seuraava koodi hoitaa kirjautumisen ja tarkastaa onko käyttäjällä oikeudet weather / admin sivuun.

if(ISSET($_POST['login'])){
	if($_POST['kayttaja'] != "" || $_POST['salasana'] != ""){
		$name = $_POST['kayttaja'];
		$password = $_POST['salasana'];
		$sql = "SELECT * FROM users WHERE name=:name AND password=:password";
		$query = $conn->prepare($sql);
		$query->bindvalue("name",$name, PDO::PARAM_STR);
		$query->bindvalue("password",$password, PDO::PARAM_STR);
		$query->execute();
		$rivi = $query->fetch();
        $_SESSION['role']= $rivi[2];
		$_SESSION['name']= $name;
        if((isset($_SESSION['role']) && $_SESSION['role'] == "admin")){
            header('Location: adminweather.php');
        }elseif((isset($_SESSION['role']) && $_SESSION['role'] == "user")){
            header('Location: weather.php');
        }else{
            header("location: kirjautuminen.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Sarabun:wght@400;600&display=swap" rel="stylesheet">
    <title>Kirjautuminen</title>
</head>
<body class="kirjautuminen">
    <header>
        <div class="row headflex">
            <div class="col">
                <a href="index.html"><img src="../assets/logo/Logo%20dark.svg" alt="Weather Oy logo" /></a>
            </div>
        </div>
    </header>
    <main class="row around">
        <div class="md-box">
            <h1 class="tcenter">Kirjautuminen</h1>
            <form method="POST">
                <div class="row between">
                    <p>Käyttäjänimi:</p> 
                    <input type="text" name="kayttaja" required>
                </div>
                <div class="row between">
                    <p>Salasana:</p> 
                    <input type="password" name="salasana" required>
                </div>
                <div class="row floatright">
                    <input class="btn secondary" type="submit" name="login" value="Kirjaudu">
                </div>
            </form>
        </div> 
    </main>
    <footer class="row around">
      <div class="row around wide">
        <p><small> Raul Pihlasvaara | Hyria <br> © Taitaja 2023 </small></p>
      </div>
    </footer>
</body>
</html>