<?php 
include "Log.php";
$title = "Geheim1";
session_start();
$testUser = $_SESSION["gebruikersinfo"];
if (empty($_SESSION["gebruikersnaam"]) || empty($_SESSION["wachtwoord"])){
    header("Location: index.php");
}else{
    if ($_SESSION["gebruikersnaam"] != "Testgebruiker" ||     $_SESSION["wachtwoord"] != "Testwachtwoord"){
        header("Location: index.php");
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/script.js"></script>
    <link rel="stylesheet" href="css/site.css">
    <title><?php echo $title?></title>
</head>

<body>
    <div class="container">
        <h1 class="alert alert-info"><?php echo $title?></h1>
        <?php
            if (isset($_SESSION["log"])){
                echo '<p style="color:red;"><i>Laatste Login:  '. $_SESSION["log"] .'</i></p>';
            }
            if ($testUser != null){
                echo $testUser->print();
            }
        ?>
        <div class="alert alert-success">
            Je bent ingelogd!
        </div>
        <form action="logout.php">
            <button type="submit" formaction="geheim2.php" class="btn btn-primary">Naar geheim2</button>
            <button type="submit" value="submit" class="btn btn-primary">Uitloggen</button>
            <button type="submit" formaction="toonlog.php" class="btn btn-primary">Naar logs</button>
        </form>
    </div>
</body>

</html>