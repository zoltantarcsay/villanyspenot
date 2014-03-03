<?php

    function processPage() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach($_POST as $postkey => $postvalue) {
                $_SESSION[$postkey] = $postvalue;
            }
            //header( "Location: index.php?p=" . $_SESSION["p"] . "&s=" . $_SESSION["s"]);
        }
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            foreach($_GET as $getkey => $getvalue) {
                $_SESSION[$getkey] = $getvalue;
            }
        }
    }

    function login() {
        if ($_SESSION["user"] == null) {
            $name = mysql_real_escape_string($_SESSION['username']);
            $pass = mysql_real_escape_string($_SESSION['password']);
            $mysql = mysql_query("SELECT * FROM felhasznalok WHERE felhasznalonev = '{$name}' AND jelszo = '{$pass}'");
            if (mysql_num_rows($mysql) < 1) {
                $msg="Sikertelen belélés!";
            }
            else {
                $_SESSION['loggedin'] = "YES";
                $_SESSION['user'] = $name;
                $msg="<script>msg('Sikeres belélés!');</script>";
                resetAttrs("username,password,submit");            
            }
        }
    }
    
    function logout() {
        session_unset();
        session_destroy();
        header( "Location: index.php");
    }
    
    function rendez($oszlop) {
        if (!strstr($_SESSION["r"], $oszlop)) {
            $rendezes = "asc";
        }
        else {
            $rendezes = strstr($_SESSION["r"], "asc") ? "desc": "asc";
        }
        return "'" . $oszlop . "','" . $rendezes . "'";
    }
    
    function fulClass($fulId) {
        $s = $_SESSION["s"];
        if ($s == $fulId) {
            return "class=\"ful_aktiv\"";
        }
        if ($s == null && $fulId == "fejezetek") {
            return "class=\"ful_aktiv\"";
        }
    }
    
    function resetAttrs($attributes) {
        if ($attributes) {
            foreach (explode(",", $attributes) as $key) {
                if ($key) $_SESSION[$key] = null;
            }
        }
    }

?>
