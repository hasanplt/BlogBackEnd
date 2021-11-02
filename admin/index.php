<?php 
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İNDEX</title>
</head>
<body>
    <?php 
    $blogsor=$db->prepare("SELECT * FROM blog");
    $blogsor->execute();
    ?>
    <a href="logout.php">Çıkış Yap</a><br><br>
    <a href="../index.php">Panelden Çık</a><br><br>
    <a href="yazi-ekle.php"><button>Yazı Ekle</button></a><br><br><br>
    YAZILARIN: <br> 
    <hr>
    <?php 
    while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)){
        $zaman = $blogcek['blog_zaman'];
        $zaman = strtotime($zaman);
        $zaman = utf8_encode(strftime("%d %B %Y %H:%M", $zaman));

        $yazarsor=$db->prepare("SELECT * FROM user where user_id=:id");
        $yazarsor->execute(array(
            'id' => $blogcek['blog_yazarid']
        ));
        $yazarcek=$yazarsor->fetch(PDO::FETCH_ASSOC);

    ?>
    <a href="islem.php?sil=ok&id=<?php echo $blogcek['blog_id']; ?>&tablo=blog&link=index"><button>YAZIYI SİL</button></a><br><br>
    <input type="text" value="<?php echo $blogcek['blog_baslik']; ?>" READONLY><br><br>
    <input type="text" value="<?php echo $blogcek['blog_etiketler']; ?>" READONLY><br><br>
    <textarea cols="70" rows="20" READONLY>
        <?php echo $blogcek['blog_text']; ?>
    </textarea><br><br>
    <input type="text" value="<?php echo $yazarcek['user_name']; ?>" READONLY><br><br>
    <p><?php echo "YAZILMA ZAMANI: ".$zaman; ?></p><br>
    <a href="yazi-duzenle.php?id=<?php echo $blogcek['blog_id']; ?>"><button>YAZIYI DÜZENLE</button></a>
    <hr>
    <?php } ?>

</body>
</html>