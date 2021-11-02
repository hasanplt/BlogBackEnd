<?php
    include "baglan.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GİRİS YAP</title>
</head>
<body>
    <form action="islem.php" method="POST">
        MAİL : <input type="text" name="user_mail" require> <br><br>
        ŞİFRE : <input type="password" name="user_password" require> <br><br>
        <button type="submit" name="admingiriskontrol">GİRİŞ YAP</button>
    </form>
    <br><br>
    <?php 
        if(@$_GET['durum'] == "no"){
            echo "BAŞARISIZ GİRİŞ YAPMA. TEKRAR DENE...";
        }
    ?>
    <br>
    <a href="../index.php">Panelden Çık</a><br><br>
</body>
</html>