<?php
//Tarkastaa onko käyttäjä kirjautunut sisään.
session_start();
require_once "pdo.php";
if((isset($_SESSION['role']) && $_SESSION['role'] == "admin")){
    header('Location: adminweather.php');
}elseif((isset($_SESSION['role']) && $_SESSION['role'] == "user")){
}else{
    header("location: kirjautuminen.php");
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
<body class="normal">
    <header>
        <div class="row headflex">
            <div class="col">
                <a href="index.html"><img src="../assets/logo/Logo%20dark.svg" alt="Weather Oy logo" /></a>
            </div>
            <ul>
            <li><a href="logout.php" class="btn secondary">Kirjaudu ulos</a></li>
            <li class="hidden-mobile">
              <a class="icon hidden-mobile">
                <i class="fa fa-bars"></i>
              </a>
            </li>
          </ul>
        </div>
    </header>
    <main class="row around">
        <h1>Hyvin erilaiset ovat</h1>
        <table>
            <?php
                $json_data = file_get_contents("weatherdata.json");
                $saa = json_decode($json_data, true);

                if(count($saa) !=0){
                    foreach ($saa as $saa) {
                        ?>
                            <tr>
                                <th> <?php echo $saa['Pv']; echo "."; echo $saa['Kk']; echo "."; echo['Vuosi']; ?></th>
                            </tr>
                            <?php
                    }
                }
            ?>
        </table>
    </main>
    <footer class="row around">
      <div class="row around wide">
        <p><small> Raul Pihlasvaara | Hyria <br> © Taitaja 2023 </small></p>
      </div>
    </footer>
</body>
</html>