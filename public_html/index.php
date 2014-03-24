<?php 
//    ini_set('display_errors',1); 
//    error_reporting(E_ALL);
    date_default_timezone_set('Europe/Budapest');    
    session_start();
    include_once "mysqlConnection.php";
    include_once "Functions.php";
    if ($_GET["reset"] == "1") resetAttrs("p,s,kulcsszavak");
    if ($_POST["logout"] == "1") logout();
    processPage();
	login();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Villanyspenót (csökkentett mód)</title>
        <link rel="stylesheet" href="styles.css"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="main.js"></script>
    </head>
    <body>
        <div id="wrap">
            <div id="main">
                <?php include "Rendez.php"; ?>
                <a href="?p=tartalom&reset=1"><img src="vslogo.png" /></a>
                <span><a href="?p=csm" class="kicsi">csökkentett mód</a></span>
                <ul class="menu">
                    <li><a href="?p=tartalom">Tartalom</a></li>
                    <li><a href="?p=csm">Az Olvasóhoz</a></li>
                    <li><a href="?p=impresszum">Impresszum</a></li> 
					
					
                    <?php 
                        if ($_SESSION["user"] != null) {
                            echo "<li>Belépve: </li>" . "<li id='user'>" .  $_SESSION["user"] . "</li>";
                            echo "<li><a href='#' onclick='logout();'>Kilépés</a></li>";
                        }
                        else {
                            echo "<li><a href=\"?p=belepes\">Belépés</a></li>";
                        }
                    ?>
                </ul>
                <?php
                    include "Keres.php";
                    include "Fulek.php";
                    $p = $_GET["p"];
                    if ($p == null | $p == "tartalom" ) {
                        include "Tartalom.php";
                    }
                    if ($p == "szoveg" ) {
                        include "Szoveg.php";
                    }
                    if ($p == "puska" ) {
                        include "Puska.php";
                    }
                    if ($p == "csm" ) {
                        include "CsokkentettMod.php";
                    }
                    if ($p == "impresszum" ) {
                        include "Impresszum.php";
                    }
                    if ($p == "belepes" ) {
                        include "Belepes.php";
                    }
                ?>
            </div>
        </div>
        <div id="footer" class="doboz c kicsi">
            <?php echo $footer ?>
            &copy; 2009–2012 a villanyspenot.hu szerzői, szerkesztői és üzemeltetői.
            | Frissítve:
            <?php
                $handle = opendir('.'); 
                while (false !== ($file = readdir($handle))){ 
                    $filemap[] = date ("Y.m.d H:i:s", filemtime($file));
                }
                echo max($filemap);
            ?>
            | Hosting: <a href="http://www.000webhost.com/">www.000webhost.com</a>
        </div>
        <form name="session" method="POST">
            <input type="hidden" name="logout" value=""/>
        </form>
    </body>
</html>
