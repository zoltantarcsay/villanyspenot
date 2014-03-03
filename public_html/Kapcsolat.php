<?php
    function sendFeedback($name,$email,$msg) {
        $to = "tarcsay.zoltan@gmail.com";
        //$to = "villanyspenot.szerk@gmail.com";
        $subject = "Villanyspenót olvasói visszajelzés";
        $headers = "From: " . $name . " <" . $email . ">\r\n" .
        "Reply-To: " . $email . "\r\n" .
        "X-Mailer: PHP/" . phpversion();
        //if ($msg)
            mail($to, $subject, $msg, $headers);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //if ($_POST["nev"] && $_POST["email"] && $_POST["uzenet"]) 
            //sendFeedback($_POST["nev"], $_POST["email"], $_POST["uzenet"]);
            echo "<html><head><script>window.close()</script></head></html>";

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Villanyspenót (csökkentett mód)</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <form name="feedback" method="POST">
            <label for="nev">Név</label><br/><input name="nev" type="text" size="60"/><br/>
            <label for="email">Email</label><br/><input name="email" type="text" size="60"/><br/>
            <label for="uzenet">Üzenet</label><br/><textarea name="uzenet" rows="10" cols="60"></textarea><br/>
            <input type="button" value="Elküldés" onclick="elkuldes()">
        </form>
    </body>
</html>